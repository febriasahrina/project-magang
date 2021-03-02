<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- fitness target -->
      <!-- Column selectors table -->
      <section id="column-selectors">
      	<div class="row">
      		<div class="col-12">
      			<div class="card">
      				<div class="card-header">
                <?php  
                  foreach ($nama_pekerjaan as $key){
                      $nama_pekerjaan = $key->nama_pekerjaan;
                    }
                ?>
      					<h4 class="card-title"><?php echo $subtitle." '".$nama_pekerjaan."'"?></h4>
      					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
      					<div class="heading-elements">
      						<ul class="list-inline mb-0">
                    			<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
      							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
      							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
      							<li><a data-action="close"><i class="ft-x"></i></a></li>
      						</ul>
      					</div>
      				</div>
      				<div class="card-content collapse show">
      					<div class="card-body card-dashboard">
                        <?php echo $this->session->flashdata('notif');?>
                        <?php 
                          $idTask = my_simple_crypt($id,'d');
                          $taskList = $this->db->query("SELECT status_rencana_kerja, created_by FROM tb_tasklist WHERE id_tasklist = '$idTask'")->row();
                          if($taskList->status_rencana_kerja != 'Complete' && $taskList->created_by == $this->session->userdata('id_pengguna'))
                          {
                        ?>
                        <a href="<?php echo base_url('panel/task/createTask/');?><?php echo $id?>" class="btn btn-info btn-md pull-right"><i class="fa fa-plus"></i> Tambah Berkas Pekerjaan</a>
                        <?php } ?>
      						<div class="table-responsive">
                  <table class="table table-striped table-bordered mt-2">
      							<thead>
      								<tr>
                        <th>No</th>
      									<th>Nama Pekerjaan</th>
                        <th>Keterangan Pekerjaan</th>
      									<th>File</th>
                        <th>Date</th>
                        <?php  
                          if($taskList->created_by == $this->session->userdata('id_pengguna')||$bool_hak==$bool_hak_vp)
                          {
                        ?>
                        <th>Action</th>
                        <?php } ?>
      								</tr>
      							</thead>
      							<tbody>
                          <?php 
                            $no = 1;
                            foreach ($task as $key): 
                          ?>
      								<tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $key->nama_detail_task;?></td>
                          <td><?php echo $key->keterangan_detail_task;?></td>
                          <td><a href="<?php echo base_url($key->file_detail_task);?>" target="blank">Lihat File</a>
                          </td>
                          <td><?php echo $key->created_time;?></td>
                          <?php  
                            $bool_hak_vp = $this->GeneralModel->like_match($key->hak_akses,"VP%");
                            $bool_hak = $this->GeneralModel->like_match($this->session->userdata('hak_akses'),"Staff%");
                            if($taskList->created_by == $this->session->userdata('id_pengguna')||$bool_hak==$bool_hak_vp||$this->session->userdata('hak_akses')=="SVP Corporate University")
                            {
                          ?>
                          <td>
                              <a href="<?php echo base_url('panel/task/comment_detailTask/'.my_simple_crypt($key->id_detail_task,'e')."/".my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-warning"><i class="fa fa-comment"></i> Lihat Komentar</a>
                              <?php if($taskList->created_by == $this->session->userdata('id_pengguna')){ ?>
                              <a onclick="return confirm('Apakah Anda Yakin akan Menghapus Laporan Riwayat Pekerjaan?')" href="<?php echo base_url('panel/task/delete_detailTask/'.my_simple_crypt($key->id_detail_task,'e')."/".my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i> Hapus</a>
                              <?php } ?>
                          </td>
                          <?php }?>
      								</tr>
                         <?php endforeach; ?>
      							</tbody>
      						</table>
                            </div>
                            <center>
                            <a href="<?php echo base_url('panel/task/historyTask/');?>" class="btn btn-warning mr-1">
                                    <i class="ft-arrow-left"></i> Kembali
                            </a>
                            <?php 
                            $idTask = my_simple_crypt($id,'d');
                            $taskList = $this->db->query("SELECT status_rencana_kerja, created_by FROM tb_tasklist WHERE id_tasklist = '$idTask'")->row();
                            if($taskList->status_rencana_kerja != 'Complete' && $taskList->created_by == $this->session->userdata('id_pengguna')){?>
                            <a href="<?php echo base_url('panel/task/finishTask/');?><?php echo $id?>" class="btn btn-success mr-1">
                                    <i class="fa fa-check-square-o"></i> Selesai
                            </a>
                            <?php } ?>
                            </center>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </section>
      <!--/ Column selectors table -->
    </div>
  </div>
</div>
<!-- END: Content-->