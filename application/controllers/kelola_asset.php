<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kelola_asset extends CI_Controller {

	public function __construct() 
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('pdf');
		}

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
		$data['user']=$this->ion_auth->user()->row();
		$data['judul_halaman']='Kelola Asset';
		$data['content']=$this->load->view('asset',$data,TRUE);	
		$this->load->view('content_wrapper',$data);
	}
 
 public function tambah_asset($id=NULL)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Tambah Asset';
			$data['data_kategori']      = $this->model_master->ambil_data_kategori();
			$data['data_kantor']        = $this->model_master->ambil_data_kantor();
			$data['data_ruangan']       = $this->model_master->ambil_data_ruangan();
			//pengaturan pagination
			$jml                        = $this->db->get('tbl_asset');
			$config['base_url']         = base_url().'kelola_asset/tambah_asset';
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
			$data['data_asset']         =$this->model_asset->ambil_asset($config['per_page'], $id);
			$data['content']            =$this->load->view('tambah_asset',$data,TRUE);	
			$this->load->view('content_wrapper',$data);
	}

	public function detail_asset($id){

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Detail Asset';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_asset']    =$this->model_asset->detail_asset($id)->row();
			$data['content']       =$this->load->view('detail_asset',$data,TRUE);

			$this->load->view('content_wrapper',$data);	
	}

	public function ubah_asset($id){

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['judul_halaman'] ='Ubah Asset';
			$data['user']          =$this->ion_auth->user()->row();
			$data['data_kategori'] = $this->model_master->ambil_data_kategori();
			$data['data_kantor']   = $this->model_master->ambil_data_kantor();
			$data['data_ruangan']  = $this->model_master->ambil_data_ruangan();
			$data['data_asset']    =$this->model_asset->detail_asset($id)->row();
			$data['content']       =$this->load->view('ubah_asset',$data,TRUE);
			$this->load->view('content_wrapper',$data);	
	}

	public function mutasi($id=NULL)
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Mutasi Asset';
			$data['data_kantor']        = $this->model_master->ambil_data_kantor();
			$data['data_ruangan']       = $this->model_master->ambil_data_ruangan();
			//pengaturan pagination
			$jml                        = $this->db->query("select * from tbl_asset where status_mutasi='mutasi'");
			$config['base_url']         = base_url().'kelola_asset/mutasi';
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
			$data['data_asset']         =$this->model_asset->ambil_mutasi($config['per_page'], $id);
			$data['data_ambil_asset']   =$this->model_asset->ambil_data_asset();
			$data['content']            =$this->load->view('mutasi',$data,TRUE);	
			$this->load->view('content_wrapper',$data);
	}

	public function proses_mutasi_asset(){
		$id['id'] = $this->input->post('id_asset');
		$user =$this->ion_auth->user()->row();
		$data = array(
						'jenis_mutasi'   => $this->input->post('jenis_mutasi'),
						'tanggal_mutasi' => $this->input->post('tanggal_mutasi'),
						'id_kantor'      => $this->input->post('id_kantor'), 
						'id_ruangan'     => $this->input->post('id_ruangan'),
						'kondisi'        => $this->input->post('kondisi'),
						'status_mutasi'  => 'mutasi',
						'user_mutasiasset'	=> $user->first_name.' '.$user->last_name
						);
		$this->model_asset->tambah_mutasi($data,$id);
		redirect('kelola_asset/mutasi','refresh');

	}

	public function pemusnahan_asset($id=NULL){
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Pemusnahan Asset';
			$data['data_kantor']        = $this->model_master->ambil_data_kantor();
			$data['data_ruangan']       = $this->model_master->ambil_data_ruangan();
			//pengaturan pagination
			$jml                        = $this->db->query("select * from tbl_asset where status_pemusnahan='musnah'");
			$config['base_url']         = base_url().'kelola_asset/mutasi';
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
			$data['data_asset']         =$this->model_asset->ambil_data_pemusnahan($config['per_page'], $id);
			$data['data_ambil_asset']   =$this->model_asset->ambil_data_asset();
			$data['content']            =$this->load->view('pemusnahan_asset',$data,TRUE);	
			$this->load->view('content_wrapper',$data);
	}

	public function proses_pemusnahan_asset(){
		$id['id'] = $this->input->post('id_asset');
		$user =$this->ion_auth->user()->row();
		$data = array(
						'pemusnahan'        => $this->input->post('pemusnahan'),
						'tanggal_keluar'    => $this->input->post('tanggal_keluar'),
						'status_mutasi'     => '',
						'status_pemusnahan' => 'musnah',
						'user_pemusnahan'	=> $user->first_name.' '.$user->last_name
						);
		$this->model_asset->tambah_mutasi($data,$id);
		redirect('kelola_asset/pemusnahan_asset','refresh');
	}

	

	public function proses_tambah_asset(){
		//Initialise the upload file class
    	$config['upload_path'] = './assets/upload/';
    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
    	$config['max_size'] = '6048';
    	$this->load->library('upload', $config);
		$userfile = "userfile";
            //check if a file is being uploaded
        		if ( !$this->upload->do_upload($userfile))//Check if upload is unsuccessful
                {
                    $upload_errors = $this->upload->display_errors('', '');
                    
                    $this->session->set_flashdata('errors', '<div class="alert alert-danger alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Error : '.$upload_errors.'
										</div>');
                    redirect('kelola_asset/tambah_asset/'.$food->course_id);  
                }
                else
                {
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    $config2['new_image'] = './assets/upload/';
                    $config2['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config2['width'] = 800;
                    $config2['height'] = 600;
                    $this->load->library('image_lib',$config2); 
                    $upload_data = $this->upload->data();
                    if ( !$this->image_lib->resize()){
                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
					}
					$user =$this->ion_auth->user()->row();
					$data        = array(
							'kode_asset'        => $this->input->post('kode_asset') ,
							'nama_asset'        => $this->input->post('nama_asset') ,
							'id_kategori'       => $this->input->post('id_kategori') ,
							'tanggal_masuk'     => $this->input->post('tanggal_masuk') ,
							'tanggal_usia'      => $this->input->post('tanggal_usia') ,
							'id_kantor'         => $this->input->post('id_kantor') ,
							'id_ruangan'        => $this->input->post('id_ruangan') ,
							'status_milik'      => $this->input->post('status_milik') ,
							'kondisi'           => $this->input->post('kondisi') ,
							'status_pemusnahan' => 'ada',
							'gambar'            => $upload_data['file_name'],
							'user_tambahasset'	=> $user->first_name.' '.$user->last_name
							);
					$this->model_asset->tambah_asset($data);
					redirect('kelola_asset/tambah_asset');
            	}      
    }



	/**
	public function proses_tambah_asset()
	{
		$config['upload_path']   = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '6048';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data();
			$file_name   =  $upload_data['file_name'];
			$data        = array(
							'kode_asset'    => $this->input->post('kode_asset') ,
							'nama_asset'    => $this->input->post('nama_asset') ,
							'id_kategori'   => $this->input->post('id_kategori') ,
							'tanggal_masuk' => $this->input->post('tanggal_masuk') ,
							'tanggal_usia'  => $this->input->post('tanggal_usia') ,
							'id_kantor'     => $this->input->post('id_kantor') ,
							'id_ruangan'    => $this->input->post('id_ruangan') ,
							'status_milik'  => $this->input->post('status_milik') ,
							'kondisi'       => $this->input->post('kondisi') ,
							'gambar'        => $file_name);
			$this->model_asset->tambah_asset($data);
			redirect('kelola_asset/tambah_asset');
		}
	}
	**/

	public function proses_ubah_asset(){
		$id['id'] =$this->input->post('id');
		$data     = array(
							'kode_asset'    => $this->input->post('kode_asset') ,
							'nama_asset'    => $this->input->post('nama_asset') ,
							'id_kategori'   => $this->input->post('id_kategori') ,
							'tanggal_masuk' => $this->input->post('tanggal_masuk') ,
							'tanggal_usia'  => $this->input->post('tanggal_usia') ,
							'id_kantor'     => $this->input->post('id_kantor') ,
							'id_ruangan'    => $this->input->post('id_ruangan') ,
							'status_milik'  => $this->input->post('status_milik') ,
							'kondisi'       => $this->input->post('kondisi')
							);
			$checked = $this->input->post('cek');
			if($checked == 1)
			{	
				$config['upload_path'] = './assets/upload/';
    			$config['allowed_types'] = 'jpg|jpeg|gif|png';
    			$config['max_size'] = '6048';
    			$this->load->library('upload', $config);
				$userfile = "userfile";
            	//check if a file is being uploaded
        		if ( !$this->upload->do_upload($userfile))//Check if upload is unsuccessful
                {
                    $upload_errors = $this->upload->display_errors('', '');
                    $this->session->set_flashdata('errors', '<div class="alert alert-danger alert-dismissable">
    									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    									Error : '.$upload_errors.'
										</div>');
                    redirect('kelola_asset/tambah_asset/'.$food->course_id);  
                }
                else
                {
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    $config2['new_image'] = './assets/upload/';
                    $config2['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config2['width'] = 800;
                    $config2['height'] = 600;
                    $this->load->library('image_lib',$config2); 
                    $upload_data = $this->upload->data();
                    if ( !$this->image_lib->resize()){
                		$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
					}
					$data['id']=$this->input->post('id');
					$data        = array(
							'kode_asset'    => $this->input->post('kode_asset') ,
							'nama_asset'    => $this->input->post('nama_asset') ,
							'id_kategori'   => $this->input->post('id_kategori') ,
							'tanggal_masuk' => $this->input->post('tanggal_masuk') ,
							'tanggal_usia'  => $this->input->post('tanggal_usia') ,
							'id_kantor'     => $this->input->post('id_kantor') ,
							'id_ruangan'    => $this->input->post('id_ruangan') ,
							'status_milik'  => $this->input->post('status_milik') ,
							'kondisi'       => $this->input->post('kondisi') ,
							'gambar'        => $upload_data['file_name']);
					$this->model_asset->ubah_asset($data,$id);
					redirect('kelola_asset/tambah_asset');
            	}      
			}
		
			else{
				$this->model_asset->ubah_asset($data,$id);
				redirect('kelola_asset/tambah_asset');
			}
	}

	public function hapus_asset($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
		elseif ($this->ion_auth->is_admin()) {
        $this->model_asset->hapus_asset($id);
        redirect('kelola_asset/tambah_asset','refresh');
    	}
	}

	public function laporan_asset()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Asset';
			$data['content']            =$this->load->view('laporan_asset',$data,TRUE);	
			$this->load->view('content_wrapper',$data);
	}

	public function cetak_laporan()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$paper = 'a4';
			$orientation = 'landscape';
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Asset';
			//$data['content']            =$this->load->view('laporan_asset',$data,TRUE);	
			$tanggal_awal = $this->input->post('tanggal_awal');
			$tanggal_akhir = $this->input->post('tanggal_akhir');
			//$data['laporan'] = $this->db->query('select * from tbl_asset WHERE tanggal_masuk BETWEEN "$tanggal_awal" AND "$tanggal_akhir"')->result();
			$data['laporan'] = $this->model_asset->laporan_asset($tanggal_awal,$tanggal_akhir);
			$data['tanggal1'] = $tanggal_awal;
			$data['tanggal2'] = $tanggal_akhir;
			//$this->load->view('laporan/cetak_laporan',$data);
			$html = $this->load->view('laporan/cetak_laporan',$data,TRUE);
			$this->pdf->pdf_create($html,"Laporan Asset",$paper,$orientation);
	}

	public function cetak_laporan_semua()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$paper = 'a4';
			$orientation = 'landscape';
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Asset';
			//$data['content']            =$this->load->view('laporan_asset',$data,TRUE);	
	
			//$data['laporan'] = $this->db->query('select * from tbl_asset WHERE tanggal_masuk BETWEEN "$tanggal_awal" AND "$tanggal_akhir"')->result();
			$data['laporan'] = $this->model_asset->laporan_asset_semua();
			$html = $this->load->view('laporan/cetak_laporan_semua',$data,TRUE);
			$this->pdf->pdf_create($html,"Laporan Asset",$paper,$orientation);
	}

	public function laporan_mutasi()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Mutasi';
			$data['content']            =$this->load->view('laporan_mutasi',$data,TRUE);	
			$this->load->view('content_wrapper',$data);
	}

	public function cetak_laporan_mutasi()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$paper = 'a4';
			$orientation = 'landscape';
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Mutasi';
			//$data['content']            =$this->load->view('laporan_asset',$data,TRUE);	
			$tanggal_awal = $this->input->post('tanggal_awal');
			$tanggal_akhir = $this->input->post('tanggal_akhir');
			//$data['laporan'] = $this->db->query('select * from tbl_asset WHERE tanggal_masuk BETWEEN "$tanggal_awal" AND "$tanggal_akhir"')->result();
			$data['laporan'] = $this->model_asset->laporan_mutasi($tanggal_awal,$tanggal_akhir);
			$data['tanggal1'] = $tanggal_awal;
			$data['tanggal2'] = $tanggal_akhir;
			//$this->load->view('laporan/cetak_laporan',$data);
			$html = $this->load->view('laporan/cetak_laporan_mutasi',$data,TRUE);
			$this->pdf->pdf_create($html,"Laporan Mutasi",$paper,$orientation);
	}

	public function cetak_laporan_mutasi_semua()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$paper = 'a4';
			$orientation = 'landscape';
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Mutasi';
			
			$data['laporan'] = $this->model_asset->laporan_mutasi_semua();
			
			//$this->load->view('laporan/cetak_laporan',$data);
			$html = $this->load->view('laporan/cetak_laporan_mutasi_semua',$data,TRUE);
			$this->pdf->pdf_create($html,"Laporan Mutasi",$paper,$orientation);
	}

	public function laporan_pemusnahan()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Pemusnahan Asset';
			$data['content']            =$this->load->view('laporan_pemusnahan',$data,TRUE);	
			$this->load->view('content_wrapper',$data);
	}

	public function cetak_laporan_pemusnahan()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$paper = 'a4';
			$orientation = 'landscape';
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Pemusnahan Asset';
			//$data['content']            =$this->load->view('laporan_asset',$data,TRUE);	
			$tanggal_awal = $this->input->post('tanggal_awal');
			$tanggal_akhir = $this->input->post('tanggal_akhir');
			//$data['laporan'] = $this->db->query('select * from tbl_asset WHERE tanggal_masuk BETWEEN "$tanggal_awal" AND "$tanggal_akhir"')->result();
			$data['laporan'] = $this->model_asset->laporan_pemusnahan($tanggal_awal,$tanggal_akhir);
			$data['tanggal1'] = $tanggal_awal;
			$data['tanggal2'] = $tanggal_akhir;
			//$this->load->view('laporan/cetak_laporan',$data);
			$html = $this->load->view('laporan/cetak_laporan_pemusnahan',$data,TRUE);
			$this->pdf->pdf_create($html,"Laporan Pemusnahan Mutasi",$paper,$orientation);
	}

	public function cetak_laporan_pemusnahan_semua()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
			$paper = 'a4';
			$orientation = 'landscape';
			$data['user']               =$this->ion_auth->user()->row();
			$data['judul_halaman']      ='Laporan Pemusnahan Asset';
			$data['laporan'] = $this->model_asset->laporan_pemusnahan_semua();
			$html = $this->load->view('laporan/cetak_laporan_pemusnahan_semua',$data,TRUE);
			$this->pdf->pdf_create($html,"Laporan Pemusnahan Mutasi",$paper,$orientation);
	}



}

