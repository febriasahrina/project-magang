<?php foreach($task as $key):?>
<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- fitness target -->
      <!-- Column selectors table -->
      <section id="column-selectors">
      	<div class="row">
      		<div class="col-7">
      			<div class="card">
      				<div class="card-header">
      					<h4 class="card-title"><?php echo $subtitle;?></h4>
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
      					<div class="card-body card-dashboard">
                 <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td style="width: 35%">Nama Pekerjaan</td>
                          <td><?php echo $key->nama_pekerjaan?></td>
                        </tr>
                        <tr>
                          <td>Kategori Kerja</td>
                          <td><?php echo $key->kategori_kerja?></td>
                        </tr>
                        <tr>
                          <td>Bidang Pekerjaan</td>
                          <td><?php echo $key->bidang_kerja?></td>
                        </tr>
                        <tr>
                          <td>Detail Pekerjaan</td>
                          <td><?php echo $key->detail_pekerjaan?></td>
                        </tr>
                        <tr>
                          <td>Start Date</td>
                          <td><?php echo $key->start_date?></td>
                        </tr>
                        <tr>
                          <td>End Date</td>
                          <td><?php echo $key->end_date?></td>
                        </tr>
                        <tr>
                          <td>Jenis Pekerjaan</td>
                          <td><?php echo $key->jenis_pekerjaan?></td>
                        </tr>
                        <tr>
                          <td>Keterangan Pekerjaan</td>
                          <td>
                            <?php 
                              if($key->keterangan_pekerjaan != "")
                              echo $key->keterangan_pekerjaan;
                              else
                              echo "-";
                            ?>    
                          </td>
                        </tr>
                        <?php if($key->keterangan_perpanjangan != "") { ?>
                        <tr>
                          <td>Keterangan Perpanjangan</td>
                          <td><?php echo $key->keterangan_perpanjangan?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                          <td>Status Riwayat Pekerjaan</td>
                          <td>
                            <?php 
                              if($key->status_detail_pekerjaan == "Failed")
                              echo "<a class='btn btn-sm btn-danger' style='color:white'>Tidak Selesai</a>";
                              elseif($key->status_persetujuan == "On Progress")
                              echo "<a class='btn btn-sm btn-warning' style='color:white'>Dalam Proses</a>";
                            ?>  
                          </td>
                        </tr>
                        <?php if($key->status_detail_pekerjaan == "Failed"){ foreach($keterangan as $key2):?>
                        <tr>
                          <td>Keterangan Tidak Selesai</td>
                          <td><?php echo $key2->isi_catatan; endforeach; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="right">
                      <a href="<?php echo base_url('panel/task/historyTask/Failed');?>" class="btn btn-warning mr-1">
                        <i class="ft-arrow-left"></i> Kembali
                      </a>
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
<?php endforeach;?>