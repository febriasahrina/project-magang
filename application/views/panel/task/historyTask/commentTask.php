<!-- BEGIN: Content-->
<?php  
  foreach ($task as $key){
    $id_tasklist = $key->id_tasklist;
    $id_detail_task = $key->id_detail_task;
    $hak_akses = $key->hak_akses;
  }
  $sudah_baca = $this->GeneralModel->sudah_baca($id_detail_task,$this->session->userdata('nama_lengkap'));
?>
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
              <?php  
                // $this->GeneralModel->sudah_baca($id_detail_task,$this->session->userdata('nama_lengkap'));
                $nama_penerima = $this->GeneralModel->get_nama_penerima($id_tasklist);
                foreach ($nama_penerima as $key){
                    $nama_penerima = $key->nama_lengkap;
                }
              ?>
                <div class="card-body card-dashboard">
                  <?php echo $this->session->flashdata('notif');?>
                  <form method="POST" id="form_komen" action="<?php echo base_url('panel/task/comment_detailTask/do_create/'.my_simple_crypt($id_tasklist,'e').'/'.my_simple_crypt($id_detail_task,'e'))?>">
                      <div class="form-group">
                        <label>Dari :</label>
                        <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Masukkan Nama" value="<?php echo $this->session->userdata('nama_lengkap'); ?>" readonly/>
                      </div>
                      <?php 
                        $hak_akses = $this->session->userdata('hak_akses');
                        $bool_hak_vp = $this->GeneralModel->like_match($hak_akses,"VP%");
                        $bool_hak = $this->GeneralModel->like_match($hak_akses,"Staff%");
                        $query_pengguna = $this->GeneralModel->get_pengguna($id_detail_task);
                        foreach ($query_pengguna as $key){
                          $pengguna = $key->hak_akses;
                        } 

                        $jabatan = $this->GeneralModel->get_jabatan($pengguna);

                        if($jabatan == "Staff")
                        {
                          if($bool_hak)
                          {
                            $atasan = $this->GeneralModel->get_atasan($hak_akses);
                          }
                          elseif($bool_hak_vp)
                          {
                            $atasan = $this->GeneralModel->get_bawahan($hak_akses);
                          }
                          elseif($this->session->userdata('hak_akses')=="SVP Corporate University") {
                            $atasan = $this->GeneralModel->get_svp($pengguna);
                          }
                        }

                        elseif($jabatan == "VP")
                        {
                          if($this->session->userdata('hak_akses')=="SVP Corporate University") {
                            $atasan = $this->GeneralModel->get_svp2($pengguna);
                          }
                        }

                      ?>
                      <div class="form-group">
                        <label>Kepada :</label>
                          <select class="form-control border-primary" name="nama_penerima" required>
                            <?php  
                              foreach ($atasan as $key){
                                $nama = $key->nama_lengkap;
                            ?>
                            <option value="<?php echo $nama; ?>"><?php echo $nama; }?></option>
                            <?php if($this->session->userdata('hak_akses')!="SVP Corporate University"){ ?>
                            <option value="Kasih Dwi Yanti">Kasih Dwi Yanti</option>
                            <?php } ?>
                          </select>
                      </div>
                    <div class="form-group">
                      <label>Isi :</label>
                      <input type="hidden" name="last_id" id="last_id" class="form-control" value="<?php echo $last_id; ?>" />
                      <textarea name="komentar" id="komentar" class="form-control" placeholder="Tulis Komentar" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
                      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                      <a href="<?php echo base_url('panel/task/detailTask/'.my_simple_crypt($id_tasklist,'e'));?>" class="btn btn-warning mr-1">
                        <i class="ft-arrow-left"></i> Kembali
                      </a>
                    </div>
                  </form>
                  <?php  
                      if($komentar)
                      {
                  ?>
                  <hr>
                  <h4 class="mb-2">Komentar :</h4>
                  <?php foreach($komentar as $key2): ?>
                  <span id="message"></span>
                  <?php echo '<div class="p-1 mb-2">';  ?>
                 <!--  <?php if ($this->session->userdata('fotopengguna')==''):?>
                     <img src="<?php echo base_url();?>assets/backend/app-assets/images/user/avatar.jpg" alt="foto-user" class="mr-2 rounded-circle" style="width:60px;">
                  <?php else: ?>
                    <img src="<?php echo base_url().$this->session->userdata('fotopengguna');?>" alt="foto-user" class="mr-2 rounded-circle" style="width:60px;">
                  <?php endif; ?> -->
                  <?php 
                        $alamat = base_url("panel/task/comment_detailTask/do_delete/".my_simple_crypt($key2->id_komentar,'e').'/'.my_simple_crypt($id_detail_task,'e'));
                        echo '
                          <div class="media-body">
                          <div class="row">
                            <div class="col-sm-15">
                              <h4><b>'.$key2->nama_pengguna.'</b> <small> Posted on <i>'.$key2->date.'</i></small></h4>
                              <p>'.$key2->isi_komentar.'</p>
                            </div>';
                            if($this->session->userdata('nama_lengkap') == $key2->nama_pengguna){
                            echo '<a class="ml-1" href="'.$alamat.'">Hapus</a>';
                            }
                          ';
                          </div>
                          </div>
                        </div>
                      ';
                      endforeach;
                    } 
                    ?>
                   
                  <!-- <div id="display_comment"></div> -->
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
