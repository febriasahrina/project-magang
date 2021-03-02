<?php foreach($requestTask as $key):?>
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
                        <?php echo $this->session->flashdata('notif'); ?>
                        <form class="" action="<?php echo base_url('panel/task/confirmRequestTask/do_update/'.my_simple_crypt($key->id_tasklist,'e'));?>" method="post">
                            <div class="form-group">
                            <label class="col-md-2 control-label" for="jenis_pekerjaan">Jenis Pekerjaan</label>
                            
                            <div class="col-md-10">
                              <select class="form-control border-primary" name="jenis_pekerjaan" required>
                                <option value="">Pilih Jenis Pekerjaan</option>
                                <option value="Penting & Mendesak">Penting & Mendesak</option>
                                <option value="Penting">Penting</option>
                                <option value="Biasa">Biasa</option>
                              </select>
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
<?php endforeach;?>