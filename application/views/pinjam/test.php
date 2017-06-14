<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
                                        <input type="text" class="form-control" name="pinjam" id="pinjam"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Buku </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="buku" id="buku"/>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme">Tambah</button>
                           <?php echo form_close();?>  
                        </div>
                        </div><!-- col-lg-12-->      	
                    </div><!-- /row -->
                </section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $(document).ready(function(){ 
    $( "#pinjam" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "search_peminjam",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 2,
    } );
  } );
  </script>