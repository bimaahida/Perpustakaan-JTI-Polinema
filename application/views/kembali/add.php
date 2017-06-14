<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Transaksi</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Pinjam</h4>
                            <?php echo validation_errors(); ?>
                                <?php echo form_open_multipart('peminjam/create/','class="form-horizontal style-form"'); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Peminjam</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="peminjam">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Buku </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="buku" name="buku">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme">Tambah</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->