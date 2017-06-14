<section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Penerbit</h3>
			<a class="btn btn-info" href="<?php echo site_url('penerbit/create')?>" role="button">Tambah Penerbit</a>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel" style="padding: 10px;">
                      <h4><i class="fa fa-angle-right"></i> Data Penerbit</h4>
                          <?php if ($this->session->flashdata('pesan')): ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo  $this->session->flashdata('pesan') ?>
							</div>	
						<?php endif ?>  
						<div class="table-responsive">
							<table class="table table-hover" id='example'>
								<thead>
									<tr>
										<th>No</th>
										<th>Kategori</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
                                <?php $i = 1; ?>
								<?php foreach ($data as $key) { ?>
                                
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $key->nama ?></td>
										<td>
											<a href="<?php echo site_url('penerbit/update/').$key->id ?>" type="button" class="btn btn-warning">Edit</a>
											<a href="<?php echo site_url('penerbit/validation_delete/').$key->id.'/pen' ?>" type="button" class="btn btn-danger" onClick="return confirm('Data <?php echo $key->nama ?> akan dihapus ?');">Delete</a>
										</td>
									</tr>
                                    <?php $i++; ?>
								<?php } ?>
								</tbody>
							</table>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
        </section>
</section>
<script>
	$(document).ready(function(){
		$('.table').DataTable();
	});
</script>
