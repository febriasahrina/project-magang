<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	
	public $parent_modul = 2;
	public $title = 'List Task';

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('LoggedIN') == FALSE || cekParentModul($this->parent_modul) == FALSE) redirect('auth/logout');
	}

	public function index(){
		$this->requestTask();
	}

	public function requestTask($param1='',$param2='')
	{
		$hak = $this->session->userdata('hak_akses');
		$bool_hak_staff = $this->GeneralModel->like_match($hak,"Staff%");
		$bool_hak_vp = $this->GeneralModel->like_match($hak,"VP%");
		if(cekModul(10) == FALSE) redirect('auth/access_denied');

		//jika hak akses = staff
		if($bool_hak_staff == 1){
			if ($param1=='Decline') {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Decline';
				$data['requestTask'] = $this->GeneralModel->requestTaskId('Decline',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}else {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Waiting';
				$data['requestTask'] = $this->GeneralModel->requestTaskId('Waiting',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}

		//jika hak akses selain staff
		}
		elseif($bool_hak_vp == 1)
		{
			if ($param1=='Decline') {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Decline';
				$data['requestTask'] = $this->GeneralModel->requestTask_hak('Decline',$hak);
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}
			else {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Waiting';
				$data['requestTask'] = $this->GeneralModel->requestTask_hak('Waiting',$hak);
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}
		}
		else
		{
			if ($param1=='Decline') {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Decline';
				$data['requestTask'] = $this->GeneralModel->requestTask('Decline');
				// $data['req_hak_akses'] = $this->GeneralModel->requestHakAkses();
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}
			else {
				$data['title'] = $this->title;
				$data['subtitle'] = 'Rencana Kerja';
				$data['status'] = 'Waiting';
				$data['requestTask'] = $this->GeneralModel->requestTask('Waiting');
				$data['content'] = 'panel/task/requestTask/index';
				$this->load->view('panel/content',$data);
			}
		}
        
	}

	public function detailRequestTask($param1='')
	{
		$data['title'] = $this->title;
		$data['subtitle'] = 'Rencana Kerja';
		$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
		$data['keterangan'] = $this->GeneralModel->get_by_id_general('tb_catatan','id_tasklist',my_simple_crypt($param1,'d'));
		$data['content'] = 'panel/task/requestTask/detail';
		$this->load->view('panel/content',$data);
	}

	public function confirmRequestTask($param1='',$param2='')
	{
		if(cekModul(12) == FALSE) redirect('auth/access_denied');
		$dateNow = date("Y-m-d");
		if ($param1=='do_update') {

			$dataTask = array(
				'status_persetujuan' => 'Approve',
				'waktu_persetujuan' => $dateNow,
				'status_rencana_kerja' => 'On Progress',
				'waktu_rencana_kerja' => $dateNow,
				'status_detail_pekerjaan' => 'On Progress',
				'waktu_detail_pekerjaan' => $dateNow,
				'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param2,'d'),$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}
		else 
		{
			$data['title'] = $this->title;
			$data['subtitle'] = 'Terima Rencana Kerja';
			$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/requestTask/confirm';
			$this->load->view('panel/content',$data);
		}
	}

	public function declineRequestTask($param1='',$param2='')
	{
		if(cekModul(14) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_decline') {
			$dataTask = array(
				'status_persetujuan' => 'Decline',
				'waktu_persetujuan' => date("Y-m-d"),
				'status_rencana_kerja' => 'Failed',
				'waktu_rencana_kerja' => date("Y-m-d"),
				'status_detail_pekerjaan' => 'Failed',
				'waktu_detail_pekerjaan' => date("Y-m-d"),
			);

			$dataKet = array(
				'kode_catatan' => "DecReqTask",
				'id_tasklist' => my_simple_crypt($param2,'d'),
				'isi_catatan' => $this->input->post('keterangan'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param2,'d'),$dataTask) == TRUE) {
				$this->GeneralModel->create_general('tb_catatan',$dataKet);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditolak</div>');
				redirect('panel/task/requestTask');
			}
		}
		else 
		{
			$data['title'] = $this->title;
			$data['subtitle'] = 'Menolak Rencana Kerja';
			$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/requestTask/decline';
			$this->load->view('panel/content',$data);
		}
	} 

	public function createRequestTask($param1='',$param2='')
	{
		if(cekModul(11) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_create') {

			$dataTask = array(
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'kategori_kerja' => $this->input->post('kategori_kerja'),
				'bidang_kerja' => $this->input->post('bidang_kerja'),
				'detail_pekerjaan' => $this->input->post('detail_pekerjaan'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'keterangan_pekerjaan' => $this->input->post('keterangan_pekerjaan'),
				'created_by' => $this->session->userdata('id_pengguna'),
				'created_time' => date("Y-m-d"),
			);

			if ($this->GeneralModel->create_general('tb_tasklist',$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Rencana Kerja';
			$data['content'] = 'panel/task/requestTask/create';
			$this->load->view('panel/content',$data);
		}
	}

	public function updateRequestTask($param1='',$param2='')
	{
		if(cekModul(12) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_update') {

			$dataTask = array(
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'kategori_kerja' => $this->input->post('kategori_kerja'),
				'bidang_kerja' => $this->input->post('bidang_kerja'),
				'detail_pekerjaan' => $this->input->post('detail_pekerjaan'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'keterangan_pekerjaan' => $this->input->post('keterangan_pekerjaan'),
				'created_by' => $this->session->userdata('id_pengguna'),
				'created_time' => date("Y-m-d"),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param2,'d'),$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Rencana Kerja';
			$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/requestTask/update';
			$this->load->view('panel/content',$data);
		}
	}

	public function historyTask($param1='',$param2='')
	{
		$hak = $this->session->userdata('hak_akses');
		$bool_hak_staff = $this->GeneralModel->like_match($hak,"Staff%");
		$bool_hak_vp = $this->GeneralModel->like_match($hak,"VP%");
		if(cekModul(15) == FALSE) redirect('auth/access_denied');
		if($bool_hak_staff == 1)
		{
			if($param1=='Completed')
			{
	       		$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'Completed';
	            $data['task'] = $this->GeneralModel->requestHistoryTaskId('Approve','Complete',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
			elseif($param1=='Failed')
			{
	       		$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'Failed';
	            $data['task'] = $this->GeneralModel->requestHistoryTaskId('Approve','Failed',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
			else
			{
	       		$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'On Progress';
	            $data['task'] = $this->GeneralModel->requestHistoryTaskId('Approve','On Progress',$this->session->userdata('id_pengguna'));
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
		}
		elseif($bool_hak_vp == 1)
		{
			if($param1=='Completed')
			{
				$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'Completed';
	            $data['task'] = $this->GeneralModel->requestHistoryTask_hak('Approve','Complete',$hak);
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
			elseif($param1=='Failed')
			{
				$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'Failed';
	            $data['task'] = $this->GeneralModel->requestHistoryTask_hak('Approve','Failed',$hak);
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
			else
			{
				$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'On Progress';
	            $data['task'] = $this->GeneralModel->requestHistoryTask_hak('Approve','On Progress',$hak);
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
		}
		else
		{
			if($param1=='Completed')
			{
				$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'Completed';
	            $data['task'] = $this->GeneralModel->requestHistoryTask('Approve','Complete');
	            $data['req_hak_akses'] = $this->GeneralModel->requestHakAkses();
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);
			}
			elseif($param1=='Failed')
			{
				$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'Failed';
	            $data['task'] = $this->GeneralModel->requestHistoryTask('Approve','Failed');
	            $data['req_hak_akses'] = $this->GeneralModel->requestHakAkses();
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);	
			}
			else
			{
				$data['title'] = $this->title;
	            $data['subtitle'] = 'Riwayat Pekerjaan';
	            $data['sub_subtitle'] = 'On Progress';
	            $data['task'] = $this->GeneralModel->requestHistoryTask('Approve','On Progress');
	            $data['req_hak_akses'] = $this->GeneralModel->requestHakAkses();
				$data['content'] = 'panel/task/historyTask/index';
				$this->load->view('panel/content',$data);	
			}
		}
	}

	public function declineHistoryTask($param1='',$param2='')
	{
		if(cekModul(14) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_decline') {

			$dataTask = array(
			'status_detail_pekerjaan' => 'Failed',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
			);

			$dataKet = array(
				'kode_catatan' => "DecHisTask",
				'id_tasklist' => my_simple_crypt($param2,'d'),
				'isi_catatan' => $this->input->post('keterangan'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param2,'d'),$dataTask) == TRUE) {
				$this->GeneralModel->create_general('tb_catatan',$dataKet);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Pekerjaan Berhasil dinyatakan Tidak Selesai</div>');
				redirect('panel/task/historyTask');
			}
		}
		else 
		{
			$data['title'] = $this->title;
			$data['subtitle'] = 'Pekerjaan Tidak Selesai';
			$data['task'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/historyTask/decline';
			$this->load->view('panel/content',$data);
		}
	} 

	public function detailHistoryTask($param1='')
	{
		$data['title'] = $this->title;
		$data['subtitle'] = 'Riwayat Pekerjaan';
		$data['task'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
		$data['keterangan'] = $this->GeneralModel->get_by_id_general('tb_catatan','id_tasklist',my_simple_crypt($param1,'d'));
		$data['content'] = 'panel/task/historyTask/detail';
		$this->load->view('panel/content',$data);
	} 

	public function detailTask($param1='')
	{
		if(cekModul(16) == FALSE) redirect('auth/access_denied');
		$data['title'] = $this->title;
		$data['id'] = $param1;
		$data['subtitle'] = 'Riwayat Pekerjaan';
		$data['nama_pekerjaan'] = $this->GeneralModel->requestJudulTask(my_simple_crypt($param1,'d'));
		$data['task'] = $this->GeneralModel->get_by_id_general('tb_detail_task','id_tasklist',my_simple_crypt($param1,'d'));
		$data['content'] = 'panel/task/historyTask/detailTask';
		$this->load->view('panel/content',$data);	
	}

	public function createTask($param1='',$param2='')
	{
		if(cekModul(17) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_create') {
			$date = date('Y-m-d H:i:s');
			$dataTask = array(
				'nama_detail_task' => $this->input->post('nama_detail_task'),
				'keterangan_detail_task' => $this->input->post('keterangan_detail_task'),
				'id_tasklist' => my_simple_crypt($param2,'d'),
				'created_by' => $this->session->userdata('id_pengguna'),
				'created_time' => $date,
			);

			$config['upload_path']          = 'assets/backend/berkas/';
			$config['allowed_types']        = '*';
			$config['max_size']				= 3000;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file_detail_task'))
			{
				$this->session->set_flashdata('notif','<div class="alert alert-success">Maaf file terlalu besar, Max 3 Mb.</div>');
				redirect('panel/task/createTask/'.$param2.'');
			}
			else {
				$dataTask += array('file_detail_task' => $config['upload_path'].$this->upload->data('file_name'));
				if($this->GeneralModel->create_general('tb_detail_task',$dataTask) == TRUE)
				{
					$this->session->set_flashdata('notif','<div class="alert alert-success">Berkas Pekerjaan berhasil ditambahkan</div>');
					redirect('panel/task/detailTask/'.$param2.'');
				}
			}

			

		}else {
			$data['title'] = $this->title;
			$data['id'] = $param1;
			$data['nama_pekerjaan'] = $this->GeneralModel->requestJudulTask(my_simple_crypt($param1,'d'));
			$data['subtitle'] = 'Laporan Pekerjaan';
			$data['content'] = 'panel/task/historyTask/createTask';
			$this->load->view('panel/content',$data);
		}
	}

	public function extendTask($param1='',$param2='')
	{
		if(cekModul(12) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_update') {

			$dataTask = array(
				'end_date' => $this->input->post('end_date'),
				'keterangan_perpanjang' => $this->input->post('keterangan_perpanjang'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param2,'d'),$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja Berhasil diperpanjang</div>');
				redirect('panel/task/historyTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Perpanjang Rencana Kerja';
			$data['requestTask'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/historyTask/extend';
			$this->load->view('panel/content',$data);
		}
	}

	public function finishTask($param1='')
	{
		if(cekModul(18) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_rencana_kerja' => 'Complete',
			'waktu_rencana_kerja' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil diterima</div>');
			redirect('panel/task/historyTask');
		}
	}
	
	public function finishhistoryTask($param1='')
	{
		if(cekModul(19) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_detail_pekerjaan' => 'Complete',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Detail Pekerjaan berhasil diterima</div>');
			redirect('panel/task/historyTask');
		}
	}

	public function failedhistoryTask($param1='')
	{
		if(cekModul(20) == FALSE) redirect('auth/access_denied');
		$dataTask = array(
			'status_detail_pekerjaan' => 'Failed',
			'waktu_detail_pekerjaan' => date("Y-m-d"),
		);

		if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Detail Pekerjaan Berhasil dinyatakan Tidak Selesai</div>');
			redirect('panel/task/historyTask');
		}
	}

	public function rateTask($param1='',$param2='')
	{
		if(cekModul(21) == FALSE) redirect('auth/access_denied');
		if ($param1=='do_score') {

			$dataTask = array(
				'rating_pekerjaan' => $this->input->post('rating_pekerjaan'),
			);

			if ($this->GeneralModel->update_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'),$dataTask) == TRUE) {
				$this->session->set_flashdata('notif','<div class="alert alert-success">Rencana Kerja berhasil ditambahkan</div>');
				redirect('panel/task/requestTask');
			}

		}else {
			$data['title'] = $this->title;
			$data['subtitle'] = 'Riwayat Pekerjaan';
			$data['rate'] = $this->GeneralModel->get_by_id_general('tb_tasklist','id_tasklist',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/historyTask/rate';
			$this->load->view('panel/content',$data);
		}
	}

	public function delete_detailTask($id,$id_tasklist){
		$id2 = my_simple_crypt($id,'d');
		$this->GeneralModel->delete_general('tb_detail_task','id_detail_task',$id2);
		$this->session->set_flashdata('notif','<div class="alert alert-success">Laporan Riwayat Pekerjaan Berhasil dihapus</div>');
		redirect('panel/task/detailTask/'.$id_tasklist);
	}

	public function comment_detailTask($param1='',$param2='',$param3='')
	{
		if ($param1=='do_create') 
		{
			$dataTask = array(
				'id_detail_task' => my_simple_crypt($param3,'d'),
				'isi_komentar' => $this->input->post('komentar'),
				'nama_pengguna' => $this->input->post('nama_pengguna'),
				'date' => date('Y-m-d H:i:s'),
			);

			if($last_id = $this->GeneralModel->create_general2('tb_komentar',$dataTask))
			{
				$dataTask2 = array(
					'id_detail_task' => my_simple_crypt($param3,'d'),
					'id_komentar' => $last_id,
					'nama_pengirim' => $this->input->post('nama_pengguna'),
					'nama_penerima' => $this->input->post('nama_penerima'),
					'baca' => 'N',
				);

				$this->GeneralModel->create_general('tb_notifikasi',$dataTask2);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Komentar berhasil dikirim</div>');
				redirect('panel/task/comment_detailTask/'.$param3.'');
			}
		}
		elseif($param1=='do_delete')
		{
			$this->GeneralModel->delete_general('tb_komentar','id_komentar',my_simple_crypt($param2,'d'));
			$this->GeneralModel->delete_general('tb_notifikasi','id_komentar',my_simple_crypt($param2,'d'));
			// $this->GeneralModel->delete_general('tb_notifikasi','id_komentar',my_simple_crypt($param2,'d'));
			$this->session->set_flashdata('notif','<div class="alert alert-success">Komentar berhasil dihapus</div>');
			redirect('panel/task/comment_detailTask/'.$param3.'');
		}
		else
		{
			$data['id_detail_task'] = my_simple_crypt($param1,'d');
			$data['id_tasklist'] = my_simple_crypt($param2,'d');
			$data['title'] = $this->title;
			$data['subtitle'] = 'Komentar Laporan Pekerjaan';
			// $this->GeneralModel->sudah_baca(my_simple_crypt($param1,'d'),$this->session->userdata('nama_lengkap'));
			$data['komentar'] = $this->GeneralModel->get_by_id_general('tb_komentar','id_detail_task',my_simple_crypt($param1,'d'));
			$data['task'] = $this->GeneralModel->get_by_id_general('tb_detail_task','id_detail_task',my_simple_crypt($param1,'d'));
			$data['content'] = 'panel/task/historyTask/commentTask';
			$this->load->view('panel/content',$data);
		}	
	}

	public function tambah_komentar(){
		$data=$this->product_model->product_list();
        echo json_encode(['success' => 'Sukses']);


		// POST data
	    $postData = $this->input->post();

	    // get data
	    if($this->GeneralModel->create_general('tbl_komentar',$postData) == TRUE)
		{
			$this->session->set_flashdata('notif','<div class="alert alert-success">Berkas Pekerjaan berhasil ditambahkan</div>');
		}

	    echo json_encode(['success' => 'Sukses']);
	}

}
