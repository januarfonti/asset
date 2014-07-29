<?php
	class report extends CI_Controller
	{
		public function __construct() 
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('pdf');
		}

		public function index()
		{

			
			$tanggal_awal = $this->input->post('tanggal_awal');
			$tanggal_akhir = $this->input->post('tanggal_akhir');
			
			$data['laporan'] = $this->model_asset->laporan_asset($tanggal_awal,$tanggal_akhir);
			//$this->load->view("report_view",$data);
			$html = $this->load->view("laporan/cetak_laporan",$data,TRUE);
			$this->pdf->pdf_create($html,"Main Mining report",$this->input->post('paper'),$this->input->post('orientation'));
			//$this->load->view('report_view');
		}
	}