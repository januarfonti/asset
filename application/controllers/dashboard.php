<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$data['user']          = $this->ion_auth->user()->row();
		$data['judul_halaman'] = 'Dashboard';
		$data['content']       = $this->load->view('dashboard',$data,TRUE);	
		$this->load->view('content_wrapper',$data);
	
}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */