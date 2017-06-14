<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Penerbit</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit</h4>
                            <?php echo validation_errors(); ?>
                                <?php echo form_open('kembali/update/'.$this->uri->segment(3),'class="form-horizontal style-form"'); ?>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pinjam" value="<?php echo $dataPinjam[0]->tgl_pinjam; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kemabli" value="<?php echo $dataPinjam[0]->tgl_kembali; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul" value="<?php echo $dataPinjam[0]->judul; ?>" readonly>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Denda</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="denda" value="<?php echo $denda; ?>" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme">Kembalikan</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->