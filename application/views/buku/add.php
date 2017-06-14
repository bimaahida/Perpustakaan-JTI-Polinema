<section id="main-content">
          <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> Buku</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Add</h4>
                            <?php echo validation_errors(); ?>
                                <?php echo form_open_multipart('buku/create/','class="form-horizontal style-form"'); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <textarea name="pengarang" id="" class="form-control"></textarea>
                                        <span class="help-block">Nip untuk Pegawai, Nim untuk Mahasiswa.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="penerbit">
                                            <?php foreach($dataPenerbit as $data) {?>
                                                <option value='<?php echo $data->id; ?>'><?php echo $data->nama; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="tahun_terbit">
                                            <?php for($i=1990;$i<2020;$i++) {?>
                                                <option value='<?php echo $i;?>'><?php echo $i; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="kategori">
                                            <?php foreach($dataKategori as $data) {?>
                                                <option value='<?php echo $data->id; ?>'><?php echo $data->nama; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-theme">Tambah</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->