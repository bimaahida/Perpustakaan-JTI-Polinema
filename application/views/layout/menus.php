<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                    <?php 
                        //var_dump($this->session->all_userdata()); 
                        $data = $this->session->userdata('logged_in');
                    ?>
              	  <p class="centered"><a href="profile.html"><img src="<?php echo base_url('') ?>assets/upload/<?php echo $data['foto'] ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $data['nama'] ?></h5>
              	  	
                  <li class="mt">
                      <a href="<?php echo site_url('buku') ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Buku</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url('buku') ?>">Data Buku</a></li>
                          <?php if($data['status'] == 1){  ?>
                          <li><a  href="<?php echo site_url('buku/create') ?>">Tambah Buku</a></li>
                          <li><a  href="<?php echo site_url('kategori') ?>">Kategori</a></li>
                          <li><a  href="<?php echo site_url('penerbit') ?>">Penerbit</a></li>
                          <?php } ?>
                      </ul>
                  </li>
                  <?php if($data['status'] == 1){  ?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>User</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo site_url('user/create') ?>">Tambah User</a></li>
                          <li><a  href="<?php echo site_url('user') ?>">Data User</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Transaksi</span>
                      </a>
                      <ul class="sub">
                      <li>
                      <?php if($data['status'] == 2){  ?>
                      <a  href="<?php echo site_url('user/get_history/'.$data['id']) ?>">Data Pinjam</a></li>
                      <?php } ?>
                        <?php if($data['status'] == 1){  ?>
                          <li><a  href="<?php echo site_url('peminjam/create') ?>">Pinjam</a></li>
                          <li><a  href="<?php echo site_url('peminjam') ?>">Data Pinjam</a></li>
                          <li><a  href="<?php echo site_url('kembali') ?>">Data Kembali</a></li>
                        <?php } ?>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->