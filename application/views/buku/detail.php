<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Buku</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Detail Buku</h4>
                                <?php echo form_open_multipart('user/update/'.$this->uri->segment(3),'class="form-horizontal style-form"'); ?>
                                <?php echo validation_errors(); ?>
                                
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4">
                                    <img src="<?php echo base_url('') ?>/assets/upload/<?php echo $buku[0]->foto ?>" class="img-responsive" alt="Image">
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $buku[0]->judul; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="" class="form-control" readonly><?php echo $buku[0]->pengarang; ?></textarea>
                                        
                                        <span class="help-block">Nip untuk Pegawai, Nim untuk Mahasiswa.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" maxlength="15"  name="nip" value="<?php echo $buku[0]->penerbit; ?>"readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tlp" maxlength="12" value="<?php echo $buku[0]->tahun_terbit; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $buku[0]->kategori; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $buku[0]->id_buku; ?>" readonly>
                                    </div>
                                </div>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->