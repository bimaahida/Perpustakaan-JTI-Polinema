<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> User</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Detail User</h4>
                                <?php echo form_open_multipart('user/update/'.$this->uri->segment(3),'class="form-horizontal style-form"'); ?>
                                <?php echo validation_errors(); ?>
                                
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                    <img src="<?php echo base_url('') ?>/assets/upload/<?php echo $user[0]->foto ?>" class="img-responsive" alt="Image">
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                >
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $user[0]->nama; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nip / Nim</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" maxlength="15"  name="nip" value="<?php echo $user[0]->nip; ?>"readonly>
                                        <span class="help-block">Nip untuk Pegawai, Nim untuk Mahasiswa.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="" class="form-control" readonly><?php echo $user[0]->alamat; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tlp" maxlength="12" value="<?php echo $user[0]->tlp; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $user[0]->tgl_lahir; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $user[0]->status; ?>" readonly>
                                    </div>
                                </div>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->