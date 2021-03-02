<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- fitness target -->
    <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Dashboard Progress</h4>
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
      <div class="card-content">
        <div class="card-body">
          <div>
            <div style="border-bottom: 1px solid #8c8b8b;">
              <h5 class="card-title">PROGRESS DIVISI</h5>
            </div>
              <?php
                foreach ($progress_corpu as $key):
                  $jlh_task_corpu += 1;
                  if($key->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_corpu += 1;
                  }
                endforeach;
                $nilai_progress_corpu = ($hitung_corpu/$jlh_task_corpu)*100;
              ?>
            <table class="mt-2">
              <tr>
                <td>
                  <a href="#progress_bidang">
                  <div class="card" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                    <img src="<?php echo base_url();?>assets/img/foto.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text" style="font-weight: 600; color: black">Divisi Corporate University</p>
                      <div class="progress" style="height: 20px">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_corpu; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_corpu; ?>%">
                        <?php echo (int)$nilai_progress_corpu ?>% Complete
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </td>
              </tr>
            </table>
          </div>
          <div>
            <div style="border-bottom: 1px solid #8c8b8b;" id="progress_bidang">
              <h5 class="card-title">PROGRESS BIDANG</h5>
            </div>
              <?php 
                foreach ($progress_teknikal as $key_teknikal):
                  $jlh_task_teknikal+=1;
                  if($key_teknikal->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_teknikal += 1;
                  }
                endforeach;
                $nilai_progress_teknikal = ($hitung_teknikal/$jlh_task_teknikal)*100;

                foreach ($progress_manajerial as $key_manajerial){ 
                  $jlh_task_manajerial+=1;
                  if($key_manajerial->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_manajerial += 1;
                  }
                }
                $nilai_progress_manajerial = ($hitung_manajerial/$jlh_task_manajerial)*100;

                foreach ($progress_administrasi as $key){ 
                  $jlh_task_administrasi+=1;
                  if($key->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_administrasi += 1;
                  }
                }
                $nilai_progress_administrasi = ($hitung_administrasi/$jlh_task_administrasi)*100;
              ?>
              <table class="mt-2">
                <tr>
                  <td>
                    <a href="#progress_teknikal">
                    <div class="card" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto1.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">Departemen Teknikal</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_teknikal; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_teknikal; ?>%">
                          <?php echo (int)$nilai_progress_teknikal ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </td>
                  <td>
                    <a href="#progress_manajerial">
                    <div class="card ml-2" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto2.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">Departemen Manajerial dan Kepemimpinan</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_manajerial; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_manajerial; ?>%;">
                          <?php echo (int)$nilai_progress_manajerial; ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="#progress_administrasi">
                    <div class="card" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img style="height: 300px" src="<?php echo base_url();?>assets/img/foto3.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">Departemen Administrasi dan Operasional</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_administrasi; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_administrasi; ?>%;" >
                          <?php echo (int)$nilai_progress_administrasi; ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </td>
                </tr>
              </table>
            </div>
            <div>
              <div style="border-bottom: 1px solid #8c8b8b;" id="progress_teknikal">
                <h5 class="card-title">PROGRESS BIDANG TEKNIKAL</h5>
              </div>
              <?php 
                $progress_vp_teknikal = $this->GeneralModel->getSubProgress('VP Teknikal');
                foreach ($progress_vp_teknikal as $key_vp_teknikal){ 
                  $jlh_task_vp_teknikal+=1;
                  if($key_vp_teknikal->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_vp_teknikal += 1;
                  }
                }
                $nilai_progress_vp_teknikal = ($hitung_vp_teknikal/$jlh_task_vp_teknikal)*100;
                
                $progress_staff_teknikal = $this->GeneralModel->getSubProgress('Staff Teknikal');
                foreach ($progress_staff_teknikal as $key_staff_teknikal){ 
                  $jlh_task_staff_teknikal+=1;
                  if($key_staff_teknikal->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_staff_teknikal += 1;
                  }
                }
                $nilai_progress_staff_teknikal = ($hitung_staff_teknikal/$jlh_task_staff_teknikal)*100;
              ?>
              <table class="mt-2">
                <tr>
                  <td>
                    <div class="card" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto1.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">VP Teknikal</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_vp_teknikal; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_vp_teknikal; ?>%">
                          <?php echo (int)$nilai_progress_vp_teknikal ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="card ml-2" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto1.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">Staff Teknikal</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_staff_teknikal; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_staff_teknikal; ?>%">
                          <?php echo (int)$nilai_progress_staff_teknikal ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div>
              <div style="border-bottom: 1px solid #8c8b8b;" id="progress_manajerial">
                <h5 class="card-title">PROGRESS BIDANG MANAJERIAL DAN KEPEMIMPINAN</h5>
              </div>
              <?php 
                $progress_vp_manajerial = $this->GeneralModel->getSubProgress('VP Manajerial');
                foreach ($progress_vp_manajerial as $key){ 
                  $jlh_task_vp_manajerial+=1;
                  if($key->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_vp_manajerial += 1;
                  }
                }
                $nilai_progress_vp_manajerial = ($hitung_vp_manajerial/$jlh_task_vp_manajerial)*100;
                
                $progress_staff_manajerial = $this->GeneralModel->getSubProgress('Staff Manajerial');
                foreach ($progress_staff_manajerial as $key){ 
                  $jlh_task_staff_manajerial+=1;
                  if($key->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_staff_manajerial += 1;
                  }
                }
                $nilai_progress_staff_manajerial = ($hitung_staff_manajerial/$jlh_task_staff_manajerial)*100;
              ?>
              <table class="mt-2">
                <tr>
                  <td>
                    <div class="card" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto2.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">VP Manajerial dan Kepemimpinan</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_vp_manajerial; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_vp_manajerial; ?>%">
                          <?php echo (int)$nilai_progress_vp_manajerial ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="card ml-2" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto2.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">Staff Manajerial dan Kepemimpinan</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_staff_manajerial; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_staff_manajerial; ?>%">
                          <?php echo (int)$nilai_progress_staff_manajerial ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div>
              <div style="border-bottom: 1px solid #8c8b8b;" id="progress_administrasi">
                <h5 class="card-title">PROGRESS BIDANG ADMINISTRASI DAN OPERASIONAL</h5>
              </div>
              <?php 
                $progress_vp_administrasi = $this->GeneralModel->getSubProgress('VP Administrasi');
                foreach ($progress_vp_administrasi as $key){ 
                  $jlh_task_vp_administrasi+=1;
                  if($key->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_vp_administrasi += 1;
                  }
                }
                $nilai_progress_vp_administrasi = ($hitung_vp_administrasi/$jlh_task_vp_administrasi)*100;
                
                $progress_staff_administrasi = $this->GeneralModel->getSubProgress('Staff Administrasi');
                foreach ($progress_staff_administrasi as $key){ 
                  $jlh_task_staff_administrasi += 1;
                  if($key->status_detail_pekerjaan=='Complete')
                  {
                    $hitung_staff_administrasi += 1;
                  }
                }
                $nilai_progress_staff_administrasi = ($hitung_staff_administrasi/$jlh_task_staff_administrasi)*100;
              ?>
              <table class="mt-2">
                <tr>
                  <td>
                    <div class="card" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto3.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">VP Administrasi dan Operasional</p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_vp_administrasi; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_vp_administrasi; ?>%">
                          <?php echo (int)$nilai_progress_vp_administrasi ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="card ml-2" style="width: 34rem;border: 1px solid rgba(0,0,0,.125);">
                      <img src="<?php echo base_url();?>assets/img/foto3.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text" style="font-weight: 600; color: black">Staff Administrasi dan Operasional <?php echo $count2 ?></p>
                        <div class="progress" style="height: 20px">
                          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo (int)$nilai_progress_staff_administrasi; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo (int)$nilai_progress_staff_administrasi; ?>%">
                          <?php echo (int)$nilai_progress_staff_administrasi ?>% Complete
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/ fitness target -->


    </div>
  </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    $('.dataex-html5-selectors').DataTable({
      paging: false,
      searching: false,
      info: false,
    } );
} );
</script>
