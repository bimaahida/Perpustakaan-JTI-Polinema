<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> buku</h3>
            <div class="row mt">
                        <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Form Add</h4>
                            <?php echo validation_errors(); ?>
                                <?php echo form_open_multipart('buku/update/'.$this->uri->segment(3),'class="form-horizontal style-form"'); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul" value="<?php echo $dataBuku[0]->judul; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <textarea name="pengarang" id="" class="form-control"><?php echo $dataBuku[0]->pengarang; ?></textarea>
                                        <span class="help-block">Nip untuk Pegawai, Nim untuk Mahasiswa.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="penerbit">
                                            <?php foreach($dataPenerbit as $data) {?>
                                                <option value='<?php echo $data->id; ?>' <?php if($dataBuku[0]->id_penerbit == $data->id){echo 'selected';} ?>><?php echo $data->nama; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="tahun_terbit">
                                            <?php for($i=1990;$i<2020;$i++) {?>
                                                <option value='<?php echo $i;?>' <?php if($dataBuku[0]->tahun_terbit == $i){echo 'selected';} ?>><?php echo $i; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control"  name="kategori">
                                            <?php foreach($dataKategori as $data) {?>
                                                <option value='<?php echo $data->id; ?>' <?php if($dataBuku[0]->id_kategori == $data->id){echo 'selected';} ?>><?php echo $data->nama; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jumlah </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $dataBuku[0]->jumlah; ?>">
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