<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> User</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Add</h4>
                            <?php echo validation_errors(); ?>
                                <?php echo form_open_multipart('user/create/','class="form-horizontal style-form"'); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nip / Nim</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" maxlength="15"  name="nip">
                                        <span class="help-block">Nip untuk Pegawai, Nim untuk Mahasiswa.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tlp" maxlength="12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="status">
                                            <option value='0'>Admin</option>
                                            <option value='1'>User</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-theme">Sign in</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->