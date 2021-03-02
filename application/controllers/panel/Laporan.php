<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	public $parent_modul = 1;

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index()
	{
		$this->requestLaporan();
	}

	public function requestLaporan($param1='')
	{
		if($param1=='do_search')
		{
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			$dataDate = array($start_date,$end_date);

			$data['title'] = 'Download Laporan';
			$data['subtitle'] = 'Download Laporan';
			$data['date'] = $dataDate;
			$data['laporan'] = $this->GeneralModel->exportLaporan($start_date,$end_date);
			$data['content'] = 'panel/laporan/index';
			$this->load->view('panel/content',$data);	
		}
		elseif ($param1=='do_export') 
		{
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			$dataDate = array($start_date,$end_date);

			$data['date'] = $dataDate;
			$data['laporan'] = $this->GeneralModel->exportLaporan($start_date,$end_date);
			$data['content'] = 'panel/laporan/exportWord';
			$this->load->view('panel/contentExport',$data);
		}
		else
		{
			$data['title'] = 'Download Laporan';
			$data['subtitle'] = 'Download Laporan';
			$data['content'] = 'panel/laporan/index';
			$this->load->view('panel/content',$data);
		}
		
	}
}
