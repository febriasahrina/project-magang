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
      					<h4 class="card-title"><?php echo $subtitle?></h4>
      				</div>
      				<div class="card-content collapse show">
      					<div class="card-body card-dashboard">
                  <body>  
                   <!-- CSS -->
                   <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>

                   <!-- Script -->
                   <script src='jquery-3.3.1.js' type='text/javascript'></script>
                   <script src='jquery-ui.min.js' type='text/javascript'></script>
                   <script type='text/javascript'>
                   $(document).ready(function(){
                     $('.dateFilter').datepicker({
                        dateFormat: "yy-mm-dd"
                     });
                   });
                   </script>
                    <!-- Search filter -->
                     <form class="" action="<?php echo base_url('panel/laporan/requestLaporan/do_search/');?>" method="post">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td>
                             <label class="control-label" for="start_date">Start Date</label>
                              <div class="col-md-20">
                                <input type="date" id="start_date" name="start_date" class="form-control border-primary" required>
                              </div>
                            </td>
                            <td>
                              <label class="control-label" for="end_date">End Date</label>
                              <div class="col-md-20">
                                <input type="date" id="end_date" name="end_date" class="form-control border-primary" required>
                              </div>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-primary ml-2" style="margin-top: 23px">
                                  <i class="fa fa-check-square-o"></i> Search
                              </button>
                            </td>
                          </tr>
                        </table>          
                      </div>
                     </form>

                  <div class="table-responsive">

                  <?php  
                  if($laporan)
                  {
                  ?>
                  <table class="table table-striped table-bordered dataex-html5-selectors">
                    <thead style="text-align: center;">
                      <tr>
                        <th>No</th>
                        <th>Kategori Kerja</th>
                        <th>Nama Pekerjaan</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Jenis Pekerjaan</th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    <?php 
                      $no = 1;
                      foreach ($laporan as $key): 
                          $start_date = $key->start_date;
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
                        <td style="text-align: left;"><?php echo $key->detail_pekerjaan;?></td>
                        <td><?php echo $key->start_date;?></td>
                        <td><?php echo $key->end_date;?></td>
                        <td><?php echo $key->jenis_pekerjaan;?></td>
                      </tr>
                     <?php endforeach; ?>
                    </tbody>
                  </table>
                  </div>
                    <?php 
                        $start_date_filter = $date[0];
                        $end_date_filter = $date[1];
                    ?>
                   
                    <form action="<?php echo base_url('panel/laporan/requestLaporan/do_export/');?>" method="post">
                      <input type="hidden" id="start_date" name="start_date" class="form-control border-primary" value="<?php echo $start_date_filter ?>">
                      <input type="hidden" id="start_date" name="end_date" class="form-control border-primary" value="<?php echo $end_date_filter ?>">
                      <input type="submit" class="btn btn-success" name="submit_doc" value="Export as Word">
                    </form>
                  <?php } ?>
                  </body>
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
