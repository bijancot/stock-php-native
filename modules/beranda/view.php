<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> BERANDA
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i></a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i>SELAMAT DATANG <strong><?php echo $_SESSION['nama_user']; ?></strong>
          </p>        
        </div>
      </div>
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <?php  
    if ($_SESSION['hak_akses']=='Super Admin') { ?>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang) as jumlah FROM is_barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>STOK BARANG</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <a href="?module=form_barang&form=add" class="small-box-footer" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang_masuk) as jumlah FROM is_barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>BARANG MASUK</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
          <a href="?module=form_barang_masuk&form=add" class="small-box-footer"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel barang Keluar
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang_keluar) as jumlah FROM is_barang_keluar")
                                            or die('Ada kesalahan pada query tampil Data Barang Keluar: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>BARANG KELUAR</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-out"></i>
          </div>
          <a href="?module=form_barang_keluar&form=add" class="small-box-footer"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel user
            $query = mysqli_query($mysqli, "SELECT COUNT(id_user) as jumlah FROM is_users")
                                            or die('Ada kesalahan pada query tampil Data User: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>PENGGUNA</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="?module=form_user&form=add" class="small-box-footer"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->
    <?php
    } elseif ($_SESSION['hak_akses']=='Gudang') { ?>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang) as jumlah FROM is_barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>STOK BARANG</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <a href="?module=form_barang&form=add" class="small-box-footer"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang_masuk) as jumlah FROM is_barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>BARANG MASUK</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
          <a href="?module=form_barang_masuk&form=add" class="small-box-footer"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel barang Keluar
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang_keluar) as jumlah FROM is_barang_keluar")
                                            or die('Ada kesalahan pada query tampil Data Barang Keluar: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>BARANG KELUAR</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-out"></i>
          </div>
          <a href="?module=form_barang_keluar&form=add" class="small-box-footer"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->
    <?php
    } elseif ($_SESSION['hak_akses']=='Manajer') { ?>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang) as jumlah FROM is_barang")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>STOK BARANG</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel barang masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang_masuk) as jumlah FROM is_barang_masuk")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>BARANG MASUK</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel barang Keluar
            $query = mysqli_query($mysqli, "SELECT COUNT(id_barang_keluar) as jumlah FROM is_barang_keluar")
                                            or die('Ada kesalahan pada query tampil Data Barang Keluar: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>BARANG KELUAR</p>
          </div>
          <div class="icon">
            <i class="fa fa-sign-out"></i>
          </div>
        </div>
      </div><!-- ./col -->
    <?php
    }
    ?>
      
    </div><!-- /.row -->
    
    <br>

    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-info-circle icon-title"></i> PEMBERITAHUAN STOK HAMPIR HABIS ( ≤ 5 )</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <button class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <!-- tampilan tabel barang -->
              <table class="table no-margin">
                <!-- tampilan tabel header -->
                <thead>
                  <tr>
                    <th class="center">NO</th>
                    <th class="center">ID</th>
                    <th class="center">BARANG</th>
                    <th class="center">JENIS</th>
                    <th class="center">STOK</th>
                    <th class="center">SATUAN</th>
                  </tr>
                </thead>
                <!-- tampilan tabel body -->
                <tbody>
                <?php  
                $no = 1;
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT a.id_barang,a.nama_barang,a.id_jenis,a.id_satuan,a.stok,b.id_jenis,b.nama_jenis,c.id_satuan,c.nama_satuan 
                                                FROM is_barang as a INNER JOIN is_jenis_barang as b INNER JOIN is_satuan as c
                                                ON a.id_jenis=b.id_jenis AND a.id_satuan=c.id_satuan 
                                                WHERE a.stok<='4' ORDER BY id_barang DESC")
                                                or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) { 
                  // menampilkan isi tabel dari database ke tabel di aplikasi
                  echo "<tr>
                          <td width='20' class='center'>$no</td>
                          <td width='80' class='center'>$data[id_barang]</td>
                          <td width='150' class='center'>$data[nama_barang]</td>
                          <td width='100' class='center'>$data[nama_jenis]</td>
                          <td width='80' class='center'>$data[stok]</td>
                          <td width='100' class='center'>$data[nama_satuan]</td>
                        </tr>";
                  $no++;
                }
                ?>
                </tbody>
              </table>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->