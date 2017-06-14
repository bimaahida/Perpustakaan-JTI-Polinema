<section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Pinjam</h3>
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
										<th>Tanggal Pinjam</th>
										<th>Tanggal Kembali</th>
										<th>Peminjam</th>
										<th>Judul</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
                                <?php $i = 1; ?>
								<?php foreach ($data as $key) { 
								$tanggal_pinjam= date_create($key->tgl_pinjam);
								$tanggal_kembali= date_create($key->tgl_kembali);
								?>
                                
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo date_format($tanggal_pinjam,"d/m/Y") ?></td>
										<td><?php echo date_format($tanggal_kembali,"d/m/Y") ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->judul ?></td>
										<td>
											<?php  if($this->uri->segment(2) === 'validation_delete'){?>
												<?php  if($this->uri->segment(4) === 'user'){?>
													<a href="<?php echo site_url('peminjam/delete/').$key->id.'/'.$this->uri->segment(3).'/user' ?>" type="button" class="btn btn-danger">Delete</a>
												<?php }else{?>
													<a href="<?php echo site_url('peminjam/delete/').$key->id.'/'.$this->uri->segment(3).'/buku' ?>" type="button" class="btn btn-danger">Delete</a>
												<?php }?>
											<?php }?>
											<?php  if($this->uri->segment(1) === 'peminjam'){?><a href="<?php echo site_url('kembali/update/').$key->id ?>" type="button" class="btn btn-warning">Kembalikan</a><?php }?>
											
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
