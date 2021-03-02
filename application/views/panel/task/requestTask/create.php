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
      				<div class="card-content collapse show">
      					<div class="card-body card-dashboard">
                        <?php echo $this->session->flashdata('notif');?>
                        <form class="" action="<?php echo base_url('panel/task/createRequestTask/do_create/');?>" method="post">
                            <div class="form-group">
                            <label class="ml-1 control-label" for="nama_pekerjaan">Nama Pekerjaan</label><span style="color: red">*</span>
                                <div class="col-md-10">
                                    <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control border-primary" placeholder="Masukkan Nama Pekerjaan" required>
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="ml-1 control-label" for="nama_pekerjaan">Kategori Kerja</label><span style="color: red">*</span>
                            <div class="col-md-10">
                              <select class="form-control border-primary" name="kategori_kerja" required>
                                <option value="">Pilih Kategori</option>
                                <option value="KPI">KPI</option>
                                <option value="PKM">PKM</option>
                                <option value="Unschedule">Unschedule</option>
                              </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="ml-1 control-label" for="bidang_kerja">Departemen Kerja</label><span style="color: red">*</span>
                            <div class="col-md-10">
                              <select class="form-control border-primary" name="bidang_kerja" required>
                                <option value="">Pilih Departemen Kerja</option>
                                <option value="SVP CORPU">SVP Corporate University</option>
                                <option value="Teknikal">Departemen Teknikal</option>
                                <option value="Manajerial dan Kepemimpinan">Departemen Manajerial dan Kepemimpinan</option>
                                <option value="Administrasi">Departemen Administrasi</option>
                              </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="ml-1 control-label" for="detail_pekerjaan">Detail Pekerjaan</label><span style="color: red">*</span>
                                <div class="col-md-10">
                                    <textarea name="detail_pekerjaan" class="form-control border-primary" placeholder="Masukkan Detail Pekerjaan" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="ml-1 control-label" for="start_date">Waktu Mulai</label><span style="color: red">*</span>
                                <div class="col-md-10">
                                    <input type="date" id="start_date" name="start_date" class="form-control border-primary" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="ml-1 control-label" for="end_date">Waktu Selesai</label><span style="color: red">*</span>
                                <div class="col-md-10">
                                    <input type="date" id="end_date" name="end_date" class="form-control border-primary" required>
                                </div>
                                
                            </div>

                            <div class="form-group">
                            <label class="col-md-4 control-label" for="keterangan_pekerjaan">Keterangan Pekerjaan</label>
                                <div class="col-md-10">
                                    <textarea name="keterangan_pekerjaan" class="form-control border-primary" placeholder="Masukkan Keterangan Pekerjaan"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-actions right">
                                <a href="<?php echo base_url('panel/task/requestTask');?>" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                        </div>
                        </form>
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
<script type="text/javascript">
  function cek(id){
    if ($('#checkbox'+id).is(':checked')) {
      $('#ParentModul'+id).removeClass('hidden')
    }else {
      $('#ParentModul'+id).addClass('hidden')
    }
  }
</script>
