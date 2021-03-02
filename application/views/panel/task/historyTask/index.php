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
      					<h4 class="card-title"><?php echo $subtitle.' '.$sub_subtitle?></h4>
      					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
      					<div class="heading-elements">
      						<ul class="list-inline mb-0">
                    <li>
                      <a href="<?php echo base_url('panel/task/historyTask/OnProgress');?>" class="btn btn-sm btn-warning">On Progress</a>
                      <a href="<?php echo base_url('panel/task/historyTask/Completed');?>" class="btn btn-sm btn-success">Completed</a>
                      <a href="<?php echo base_url('panel/task/historyTask/Failed');?>" class="btn btn-sm btn-danger">Failed</a>
                    </li>
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
                <div class="table-responsive">
                  <!-- <table class="table table-striped table-bordered dataex-html5-selectors"> -->
                    <table class="table table-striped table-bordered">
      							<thead style="text-align: center;">
      								<tr>
                        <th>No</th>
      									<th>Kategori Kerja</th>
      									<th>Nama Pekerjaan</th>
                        <th>Bidang Pekerjaan</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Staff</th>
      									<th>Action</th>
      								</tr>
      							</thead>
      							<tbody style="text-align: center;">
                      <?php 
                        $no = 1;
                        foreach ($task as $key): 
                          
                            $end_date = $key->end_date;
                            $expire = strtotime($end_date);
                            $today = strtotime("today midnight");

                            if($today > $expire){
                              if($key->status_rencana_kerja == 'On Progress')
                              {
                                // echo "expired";
                                $dataTask = array(
                                  'status_rencana_kerja' => 'Failed',
                                  'waktu_rencana_kerja' => date("Y-m-d"),
                                  'status_detail_pekerjaan' => 'Failed',
                                  'waktu_detail_pekerjaan' => date("Y-m-d"),
                                );
                                $this->GeneralModel->update_general('tb_tasklist','id_tasklist',$key->id_tasklist,$dataTask);
                                header("Refresh:0");
                              }
                            }
                      ?>
      								<tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $key->kategori_kerja;?></td>
                        <td style="text-align: left;"><?php echo $key->nama_pekerjaan;?></td>
                        <td><?php echo $key->bidang_kerja;?></td>
                        <td><?php echo $key->start_date;?></td>
                        <td><?php echo $key->end_date;?></td>
                        <td><?php echo $key->jenis_pekerjaan;?></td>
                        <td><?php echo $key->nama_lengkap;?></td>
                        <td>

                        <a href="<?php echo base_url('panel/task/detailHistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-info"><i class="fa fa-info"></i> Detail</a>
                        <a href="<?php echo base_url('panel/task/detailTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success" style="margin-top: 0.1cm">
                          <i class="fa fa-info"></i> 
                          Lihat Laporan Pekerjaan
                        </a>

                        <?php
                          $bool_hak = $this->GeneralModel->like_match($this->session->userdata('hak_akses'),"Staff%");
                          if($bool_hak != 1 && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'On Progress' && $key->status_detail_pekerjaan == 'On Progress')
                          {
                            if($this->session->userdata('hak_akses') == 'SVP Corporate University')
                            {
                              foreach ($req_hak_akses as $key2): 
                              if($key2->hak_akses == $key->hak_akses)
                              {
                        ?>

                        <a href="<?php echo base_url('panel/task/extendTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm d-flex btn-danger" style="margin-top: 0.1cm;">
                          <i class="fa fa-info"></i> 
                          Perpanjang Waktu
                        </a>
                        <?php 
                              } 
                              endforeach;
                            }
                            else{
                              if($this->session->userdata('id_pengguna') != $key->id_pengguna)
                              {
                        ?>
                        <a href="<?php echo base_url('panel/task/extendTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm d-flex btn-danger" style="margin-top: 0.1cm;">
                          <i class="fa fa-info"></i> 
                          Perpanjang Waktu
                        </a>
                        <?php 
                              }
                            }
                          } 
                        ?>

                        <?php
                          $bool_hak = $this->GeneralModel->like_match($this->session->userdata('hak_akses'),"Staff%");
                          if($bool_hak != 1 && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'Complete' && $key->status_detail_pekerjaan == 'On Progress')
                          {
                            if($this->session->userdata('hak_akses') == 'SVP Corporate University')
                            {
                              if($req_hak_akses)
                              {
                        ?>
                            <a onclick="return confirm('Apakah Anda Yakin akan Menyatakan Selesai Terhadap Detail Pekerjaan Ini?')" href="<?php echo base_url('panel/task/finishhistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-warning" style="margin-top: 0.1cm">
                              <i class="fa fa-check"></i> 
                              Selesai
                            </a>

                            <a onclick="return confirm('Apakah Anda Yakin akan Menyatakan Tidak Selesai Terhadap Detail Pekerjaan Ini?')" href="<?php echo base_url('panel/task/declineHistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-danger" style="margin-top: 0.1cm">
                              <i class="fa fa-warning"></i>Tidak Selesai
                            </a>
                        <?php 
                              } 
                            }
                            else{
                              if($this->session->userdata('id_pengguna') != $key->id_pengguna)
                              {
                        ?>
                        <a onclick="return confirm('Apakah Anda Yakin akan Menyatakan Selesai Terhadap Detail Pekerjaan Ini?')" href="<?php echo base_url('panel/task/finishhistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-warning" style="margin-top: 0.1cm;">
                          <i class="fa fa-check"></i> 
                          Selesai
                        </a>

                        <a onclick="return confirm('Apakah Anda Yakin akan Menyatakan Tidak Selesai Terhadap Detail Pekerjaan Ini?')" href="<?php echo base_url('panel/task/declineHistoryTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-danger" style="margin-top: 0.1cm;">
                          <i class="fa fa-warning"></i> 
                          Tidak Selesai
                        </a>

                        <?php 
                              }
                            }
                          } 
                        ?>

                        <!-- <?php if($this->session->userdata('hak_akses') != 'Staff' && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'Failed' && $key->status_detail_pekerjaan == 'Failed'){?>
                            <a href="<?php echo base_url('panel/task/rateTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success"><i class="fa fa-info"></i> Nilai Pekerjaan</a>
                        <?php }elseif($this->session->userdata('hak_akses') != 'Staff' && $key->status_persetujuan == 'Approve' && $key->status_rencana_kerja == 'Complete' && $key->status_detail_pekerjaan == 'Complete'){ ?>
                            <a href="<?php echo base_url('panel/task/rateTask/'.my_simple_crypt($key->id_tasklist,'e'));?>" class="btn btn-sm btn-success"><i class="fa fa-info"></i> Nilai Pekerjaan</a>
                        <?php } ?> -->
                        </td>
      								</tr>
                                     <?php endforeach; ?>
      							</tbody>
      						</table>
                            </div>
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
<script type="text/javascript">
$(document).ready(function() {
    $('.dataex-html5-selectors').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          {
              extend: 'excelHtml5',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
              extend: 'csvHtml5',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
                extend: 'pdfHtml5',
                download:'open',
                exportOptions: {
                    columns: ':visible'
                }
          },
          'colvis',
        ]
    } );
    $('.pagination').addClass('pull-right')
} );
</script>
