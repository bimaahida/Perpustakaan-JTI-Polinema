<section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> User</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel" style="padding: 10px;">
                      <h4><i class="fa fa-angle-right"></i> Data User</h4>
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
										<th>Nip</th>
										<th>Nama</th>
										<th>Alamat</th>
                                        <th>Telephone</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($data as $key) { ?>
									<tr>
										<td><?php echo $key->nip ?></td>
										<td><?php echo $key->nama ?></td>
                                        <td><?php echo $key->alamat ?></td>
                                        <td><?php echo $key->tlp ?></td>
                                        <td><?php echo $key->tgl_lahir ?></td>
										<td>
											<a href="<?php echo site_url('user/detail/').$key->id ?>" type="button" class="btn btn-info">Detail</a>
											<a href="<?php echo site_url('user/update/').$key->id ?>" type="button" class="btn btn-warning">Edit</a>
											<a href="<?php echo site_url('user/delete/').$key->id ?>" type="button" class="btn btn-danger" onClick="return confirm('Data <?php echo $key->nama ?> akan dihapus ?');">Delete</a>
										</td>
									</tr>
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
