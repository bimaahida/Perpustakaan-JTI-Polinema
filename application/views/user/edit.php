<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> User</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit</h4>
                            <?php echo form_open_multipart('user/update/'.$this->uri->segment(3),'class="form-horizontal style-form"'); ?>
                                <?php echo validation_errors(); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $user[0]->nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nip / Nim</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" maxlength="15"  name="nip" value="<?php echo $user[0]->nip; ?>">
                                        <span class="help-block">Nip untuk Pegawai, Nim untuk Mahasiswa.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="" class="form-control"><?php echo $user[0]->alamat; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tlp" maxlength="12" value="<?php echo $user[0]->tlp; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $user[0]->tgl_lahir; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="foto_lama" name="foto_lama" value="<?php echo $user[0]->foto; ?>">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="status">
                                            <option value='1' <?php if($user[0]->status=='1'){echo 'selected';} ?>>Admin</option>
                                            <option value='2' <?php if($user[0]->status=='2'){echo 'selected';} ?>>User</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-theme">Edit</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->