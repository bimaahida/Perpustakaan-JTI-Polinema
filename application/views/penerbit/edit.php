<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Penerbit</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit</h4>
                            <?php echo validation_errors(); ?>
                                <?php echo form_open('penerbit/update/'.$this->uri->segment(3)); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $data[0]->nama; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme">Edit</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->