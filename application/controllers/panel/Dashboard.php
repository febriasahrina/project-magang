<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public $parent_modul = 1;

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['progress_corpu'] = $this->GeneralModel->getProgressAll();
		$data['progress_teknikal'] = $this->GeneralModel->getProgress('Teknikal');
		$data['progress_manajerial'] = $this->GeneralModel->getProgress('Manajerial dan Kepemimpinan');
		$data['progress_administrasi'] = $this->GeneralModel->getProgress('Administrasi');
		// $data['progress_all'] = $this->GeneralModel->getSubProgress();
		$data['content'] = 'panel/dashboard/index';
		$this->load->view('panel/content',$data);
	}
}
