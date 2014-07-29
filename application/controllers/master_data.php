<?php defined('BASEPATH') OR exit('No direct script access allowed');

class master_data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
        
        // Set the theme to use
        $this->theme = $this->config->item('view_theme', 'ion_auth');
	}

	public function index(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		$data['judul_halaman'] ='Data Master';
		$data['user']          =$this->ion_auth->user()->row();
		$data['content']       =$this->load->view('master_data',$data,TRUE);
		$this->load->view('content_wrapper',$data);	

	}
	
	/** 
	FUNGSI KANTOR
	**/
	public function data_kantor($id=NULL){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman']      ='Data Kantor';
			$data['user']               =$this->ion_auth->user()->row();
			//pengaturan pagination
			$jml                        = $this->db->get('tbl_kantor');
			$config['base_url']         = base_url().'master_data/data_kantor';
			$config['total_rows']       = $jml->num_rows();
			$config['per_page']         = '5';
			$config['next_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['prev_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['full_tag_open']    = "<ul class='pagination'>";
			$config['full_tag_close']   ="</ul>";
			$config['num_tag_open']     = '<li>';
			$config['num_tag_close']    = '</li>';
			$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";
			//inisialisasi config
			$this->pagination->initialize($config);
			//buat pagination
			$data['halaman']     = $this->pagination->create_links();
			$data['data_kantor'] =$this->model_master->ambil_kantor($config['per_page'], $id);
			$data['content']     =$this->load->view('data_kantor',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function detail_kantor($id){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Detail Kantor';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_kantor']   =$this->model_master->detail_kantor($id)->row();
			$data['content']       =$this->load->view('detail_kantor',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function ubah_kantor($id){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Update Kantor';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_kantor']   =$this->model_master->detail_kantor($id)->row();
			$data['content']       =$this->load->view('ubah_kantor',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function proses_tambah_kantor(){
		$data = array('kode_kantor' => $this->input->post('kode_kantor'),
						'nama_kantor' => $this->input->post('nama_kantor'),
						'alamat_kantor' => $this->input->post('alamat_kantor'),
						'email' => $this->input->post('email'));
		$kode_kantor = $this->input->post('kode_kantor');
		$nama_kantor = $this->input->post('nama_kantor');
		$hasil_cek   = $this->model_master->cek_kantor($kode_kantor,$nama_kantor);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Kantor / Nama Kantor sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_kantor');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->tambah_kantor($data);	
			redirect('master_data/data_kantor','refresh');
		}
	}

	public function proses_ubah_kantor(){
		$id['id'] = $this->input->post('id');
		$data = array('kode_kantor' => $this->input->post('kode_kantor'),
						'nama_kantor' => $this->input->post('nama_kantor'),
						'alamat_kantor' => $this->input->post('alamat_kantor'),
						'email' => $this->input->post('email'));
		$this->model_master->ubah_kantor($data,$id);	
		$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data kantor berhasil diubah.
										</div>');
		redirect('master_data/data_kantor','refresh');
		/*			
		$kode_kantor = $this->input->post('kode_kantor');
		$nama_kantor = $this->input->post('nama_kantor');
		$hasil_cek = $this->model_master->cek_kantor($kode_kantor,$nama_kantor);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Kantor / Nama Kantor sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_kantor');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->ubah_kantor($data,$id);	
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data kantor berhasil diubah.
										</div>');
			redirect('master_data/data_kantor','refresh');
		}
		*/
	}

	public function hapus_kantor($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
        $this->model_master->hapus_kantor($id);
        redirect('master_data/data_kantor','refresh');
    }
    //AKHIR FUNGSI KANTOR

    /** 
	FUNGSI RUANGAN
	**/

    public function data_ruangan($id=NULL){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman']      ='Data Ruangan';
			$data['user']               =$this->ion_auth->user()->row();
			//pengaturan pagination
			$jml                        = $this->db->get('tbl_ruangan');
			$config['base_url']         = base_url().'master_data/data_ruangan';
			$config['total_rows']       = $jml->num_rows();
			$config['per_page']         = '5';
			$config['next_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['prev_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['full_tag_open']    = "<ul class='pagination'>";
			$config['full_tag_close']   ="</ul>";
			$config['num_tag_open']     = '<li>';
			$config['num_tag_close']    = '</li>';
			$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";
			//inisialisasi config
			$this->pagination->initialize($config);
			//buat pagination
			$data['halaman']      = $this->pagination->create_links();
			$data['data_kantor']  = $this->model_master->ambil_data_kantor();
			$data['data_ruangan'] = $this->model_master->ambil_ruangan($config['per_page'], $id);
			$data['content']      = $this->load->view('data_ruangan',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function detail_ruangan($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Detail Ruangan';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_ruangan']  =$this->model_master->detail_ruangan($id)->row();
			$data['content']       =$this->load->view('detail_ruangan',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function ubah_ruangan($id){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Ubah Ruangan';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_kantor']   =$this->model_master->ambil_data_kantor();
			$data['data_ruangan']  =$this->model_master->detail_ruangan($id)->row();
			$data['content']       =$this->load->view('ubah_ruangan',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function proses_tambah_ruangan(){
		$data = array('kode_ruangan' => $this->input->post('kode_ruangan'),
						
						'nama_ruangan' => $this->input->post('nama_ruangan'));
						
		$kode_ruangan = $this->input->post('kode_ruangan');
		$nama_ruangan = $this->input->post('nama_ruangan');
		$hasil_cek    = $this->model_master->cek_ruangan($kode_ruangan,$nama_ruangan);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Ruangan / Nama Ruangan sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_ruangan');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->tambah_ruangan($data);	
			redirect('master_data/data_ruangan','refresh');
		}
	}

	public function proses_ubah_ruangan(){
		$id['id'] = $this->input->post('id_ruangan');
		$data = array('kode_ruangan' => $this->input->post('kode_ruangan'),
						
						'nama_ruangan' => $this->input->post('nama_ruangan'));

		$this->model_master->ubah_ruangan($data,$id);	
		$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data ruangan berhasil diubah.
										</div>');
		redirect('master_data/data_ruangan','refresh');
		/*	
		$kode_ruangan = $this->input->post('kode_ruangan');
		$nama_ruangan = $this->input->post('nama_ruangan');
		$hasil_cek = $this->model_master->cek_ruangan($kode_ruangan,$nama_ruangan);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Ruangan / Nama Ruangan sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_ruangan');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->ubah_ruangan($data,$id);	
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data ruangan berhasil diubah.
										</div>');
			redirect('master_data/data_ruangan','refresh');
		}
		*/
	}

	public function hapus_ruangan($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		$this->model_master->hapus_ruangan($id);
        redirect('master_data/data_ruangan','refresh');
    }
    //AKHIR FUNGSI KANTOR

    /** 
	FUNGSI KATEGORI
	**/
	
    public function data_kategori($id=NULL){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman']      ='Data Kategori';
			$data['user']               =$this->ion_auth->user()->row();
			
			
			//pengaturan pagination
			$jml                        = $this->db->get('tbl_kategori');
			$config['base_url']         = base_url().'master_data/data_kategori';
			$config['total_rows']       = $jml->num_rows();
			$config['per_page']         = '5';
			$config['next_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['prev_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['full_tag_open']    = "<ul class='pagination'>";
			$config['full_tag_close']   ="</ul>";
			$config['num_tag_open']     = '<li>';
			$config['num_tag_close']    = '</li>';
			$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";
			//inisialisasi config
			$this->pagination->initialize($config);
			//buat pagination
			$data['halaman']       = $this->pagination->create_links();
			$data['data_kategori'] =$this->model_master->ambil_kategori($config['per_page'], $id);
			$data['content']       =$this->load->view('data_kategori',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
		}
	

	public function proses_tambah_kategori(){
		$data = array('kode_kategori' => $this->input->post('kode_kategori'),
						'nama_kategori' => $this->input->post('nama_kategori'));
						
		$kode_kategori = $this->input->post('kode_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$hasil_cek = $this->model_master->cek_kategori($kode_kategori,$nama_kategori);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Kategori / Nama Kategori sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_kategori');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->tambah_kategori($data);	
			redirect('master_data/data_kategori','refresh');
		}
	}

	public function ubah_kategori($id){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Ubah Kategori';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_kategori'] =$this->model_master->detail_kategori($id)->row();
			$data['content']       =$this->load->view('ubah_kategori',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function proses_ubah_kategori(){
		$id['id'] = $this->input->post('id');
		$data = array('kode_kategori' => $this->input->post('kode_kategori'),
						'nama_kategori' => $this->input->post('nama_kategori'));
						
		$this->model_master->ubah_kategori($data,$id);	
		$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data kategori berhasil diubah.
										</div>');
		redirect('master_data/data_kategori','refresh');
		/*			
		$kode_kantor = $this->input->post('kode_kantor');
		$nama_kantor = $this->input->post('nama_kantor');
		$hasil_cek = $this->model_master->cek_kantor($kode_kantor,$nama_kantor);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Kantor / Nama Kantor sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_kantor');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->ubah_kantor($data,$id);	
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data kantor berhasil diubah.
										</div>');
			redirect('master_data/data_kantor','refresh');
		}
		*/
	}

	public function hapus_kategori($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
        $this->model_master->hapus_kategori($id);
        redirect('master_data/data_kategori','refresh');
    
	}


     /** 
	FUNGSI JABATAN
	**/
	
    public function data_jabatan($id=NULL){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman']      ='Data Jabatan';
			$data['user']               =$this->ion_auth->user()->row();
			//pengaturan pagination
			$jml                        = $this->db->get('tbl_jabatan');
			$config['base_url']         = base_url().'master_data/data_jabatan';
			$config['total_rows']       = $jml->num_rows();
			$config['per_page']         = '5';
			$config['next_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['prev_page']        = '<li><a href="#">&laquo;</a></li>';
			$config['full_tag_open']    = "<ul class='pagination'>";
			$config['full_tag_close']   ="</ul>";
			$config['num_tag_open']     = '<li>';
			$config['num_tag_close']    = '</li>';
			$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";
			//inisialisasi config
			$this->pagination->initialize($config);
			//buat pagination
			$data['halaman']            = $this->pagination->create_links();
			
			$data['data_jabatan']       =$this->model_master->ambil_jabatan($config['per_page'], $id);
			$data['content']            =$this->load->view('data_jabatan',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function proses_tambah_jabatan(){
		$data = array('kode_jabatan' => $this->input->post('kode_jabatan'),
						'nama_jabatan' => $this->input->post('nama_jabatan'));
						
		$kode_jabatan = $this->input->post('kode_jabatan');
		$nama_jabatan = $this->input->post('nama_jabatan');
		$hasil_cek = $this->model_master->cek_jabatan($kode_jabatan,$nama_jabatan);

		
		if ($hasil_cek->num_rows()>=1){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Kode Jabatan / Nama Jabatan sudah ada, silahkan cek data anda kembali !
										</div>');
			redirect('master_data/data_jabatan');
		}
		elseif ($hasil_cek->num_rows()==0) {
			$query = $this->model_master->tambah_jabatan($data);	
			redirect('master_data/data_jabatan','refresh');
		}
	}

	public function ubah_jabatan($id){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Ubah Jabatan';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_jabatan']  =$this->model_master->detail_jabatan($id)->row();
			$data['content']       =$this->load->view('ubah_jabatan',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function proses_ubah_jabatan(){
		$id['id'] = $this->input->post('id');
		$data = array('kode_jabatan' => $this->input->post('kode_jabatan'),
						'nama_jabatan' => $this->input->post('nama_jabatan'));
						
		$this->model_master->ubah_jabatan($data,$id);	
		$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data jabatan berhasil diubah.
										</div>');
		redirect('master_data/data_jabatan','refresh');
	}

	public function hapus_jabatan($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
        $this->model_master->hapus_jabatan($id);
        redirect('master_data/data_jabatan','refresh');
    }

    /** 
	FUNGSI PEGAWAI
	**/

	


    public function data_pegawai($id=NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables','ion_auth');
		
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
		$this->form_validation->set_rules('alamat', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . '' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'alamat'        => $this->input->post('alamat'),
				'phone'         => $this->input->post('phone'),
				'nik'           => $this->input->post('nik'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_jabatan'    => $this->input->post('id_jabatan'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("master_data/data_pegawai", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			//$this->load->view('auth/create_user',$this->data);
			$this->data['judul_halaman'] ='Data Pegawai';
			$this->data['data_jabatan']  = $this->model_master->ambil_data_jabatan();
			
			
			//pengaturan pagination
			$jml                         = $this->db->get('users');
			$config['base_url']          = base_url().'master_data/data_pegawai';
			$config['total_rows']        = $jml->num_rows();
			$config['per_page']          = '5';
			$config['next_page']         = '<li><a href="#">&laquo;</a></li>';
			$config['prev_page']         = '<li><a href="#">&laquo;</a></li>';
			$config['full_tag_open']     = "<ul class='pagination'>";
			$config['full_tag_close']    ="</ul>";
			$config['num_tag_open']      = '<li>';
			$config['num_tag_close']     = '</li>';
			$config['cur_tag_open']      = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']     = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open']     = "<li>";
			$config['next_tagl_close']   = "</li>";
			$config['prev_tag_open']     = "<li>";
			$config['prev_tagl_close']   = "</li>";
			$config['first_tag_open']    = "<li>";
			$config['first_tagl_close']  = "</li>";
			$config['last_tag_open']     = "<li>";
			$config['last_tagl_close']   = "</li>";
			//inisialisasi config
			$this->pagination->initialize($config);
			//buat pagination
			$this->data['halaman']      = $this->pagination->create_links();
			$this->data['data_pegawai'] =$this->model_master->ambil_pegawai($config['per_page'], $id);
			$this->data['content']      =$this->load->view('data_pegawai',$this->data,TRUE);
			$this->data['user']         =$this->ion_auth->user()->row();
			$this->load->view('content_wrapper',$this->data);
			//$this->_render_page($this->theme.'/create_user', $this->data);
		}
	}

	public function hapus_pegawai($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
        $this->model_master->hapus_pegawai($id);
        redirect('master_data/data_pegawai','refresh');
    }

    public function detail_pegawai($id){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Detail Pegawai';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_pegawai']  =$this->model_master->detail_pegawai($id)->row();
			$data['content']       =$this->load->view('detail_pegawai',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	
	function ubah_pegawai($id){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
		elseif ($this->ion_auth->is_admin()) {

		$user          = $this->ion_auth->user($id)->row();
		$groups        =$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('nik', $this->lang->line('edit_user_validation_nik_label'), 'required|xss_clean');
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
		$this->form_validation->set_rules('alamat', $this->lang->line('edit_user_validation_company_label'), 'required|xss_clean');
		$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
				'nik'           => $this->input->post('nik'),
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'alamat'        => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_jabatan'    => $this->input->post('id_jabatan'),
				'email'         => $this->input->post('email'),
				'phone'         => $this->input->post('phone')
			);

			// Only allow updating groups if user is admin
			if ($this->ion_auth->is_admin())
			{
				//Update the groups user belongs to
				$groupData = $this->input->post('groups');

				if (isset($groupData) && !empty($groupData)) {

					$this->ion_auth->remove_from_group('', $id);

					foreach ($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}

				}
			}

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$this->ion_auth->update($user->id, $data);

				//check to see if we are creating the user
				//redirect them back to the admin page
				
				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Data Pegawai Berhasil Diubah
										</div>');
				if ($this->ion_auth->is_admin() || $this->ion_auth->in_group('master_data'))
				{
					redirect('master_data/data_pegawai', 'refresh');
				}
				else
				{
					redirect('/', 'refresh');
				}
			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['nik'] = array(
			'class' => 'form-control',
			'name'  => 'nik',
			'id'    => 'nik',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('nik', $user->nik),
		);

		$this->data['first_name'] = array(
			'class' => 'form-control',
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'class' => 'form-control',
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['alamat'] = array(
			'class' => 'form-control',
			'name'  => 'alamat',
			'id'    => 'alamat',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->alamat),
		);
		$this->data['email'] = array(
			'class' => 'form-control',
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('email', $user->email),
		);
		$this->data['phone'] = array(
			'class' => 'form-control',
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'class' => 'form-control',
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'class' => 'form-control',
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		//$this->_render_page($this->theme.'/edit_user', $this->data);
		$this->data['judul_halaman']='Ubah Data Pegawai';
		$this->data['data_jabatan']= $this->model_master->ambil_data_jabatan();
		//$this->load->view('auth/edit_user',$this->data);
		$this->data['content']=$this->load->view('ubah_pegawai',$this->data,TRUE);
		$this->data['user']=$this->ion_auth->user()->row();
		$this->load->view('content_wrapper',$this->data);
	}
}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}