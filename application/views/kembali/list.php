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
										<th>Denda</th>
									</tr>
								</thead>
								<tbody>
                                <?php $i = 1; ?>
								<?php foreach ($data as $key) { ?>
                                
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $key->tgl_pinjam ?></td>
										<td><?php echo $key->tgl_dikembalikan ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->judul ?></td>
										<td><?php echo $key->denda ?></td>
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
