<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
  <!-- tampilkan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> TAMBAH
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i></a></li>
      <li><a href="?module=user">PENGGUNA</a></li>
      <li class="active">TAMBAH</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/user/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">USERNAME</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="username" placeholder="USERNAME" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">PASSWORD</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="password" placeholder="PASSWORD" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NAMA</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_user" placeholder="NAMA" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">FOTO</label>
                <div class="col-sm-5">
                  <input type="file" name="foto">
                  <br/>
                <?php  
                if ($data['foto']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/<?php echo $data['foto']; ?>" width="128">
                <?php
                }
                ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">HAK AKSES</label>
                <div class="col-sm-5">
                  <select class="form-control" name="hak_akses" required>
                    <option value=""></option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Manajer">Manajer</option>
                    <option value="Gudang">Gudang</option>
                  </select>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="SIMPAN">
                  <a href="?module=user" class="btn btn-default btn-reset">BATAL</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel user
      $query = mysqli_query($mysqli, "SELECT * FROM is_users WHERE id_user='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil data user : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
  	}	
?>
	<!-- tampilkan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> GANTI
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i></a></li>
      <li><a href="?module=user">PENGGUNA</a></li>
      <li class="active">GANTI</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/user/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">USERNAME</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="username" placeholder="USERNAME" autocomplete="off" value="<?php echo $data['username']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">PASSWORD</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="password" autocomplete="off" placeholder="BIARKAN KOSONG JIKA TIDAK DIGANTI">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NAMA</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_user" placeholder="NAMA" autocomplete="off" value="<?php echo $data['nama_user']; ?>" required>
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">FOTO</label>
                <div class="col-sm-5">
                  <input type="file" name="foto">
                  <br/>
                <?php  
                if ($data['foto']=="") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                <?php
                }
                else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/<?php echo $data['foto']; ?>" width="128">
                <?php
                }
                ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">HAK AKSES</label>
                <div class="col-sm-5">
                  <select class="form-control" name="hak_akses" required>
                    <option value="<?php echo $data['hak_akses']; ?>"><?php echo $data['hak_akses']; ?></option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Manajer">Manajer</option>
                    <option value="Gudang">Gudang</option>
                  </select>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="SIMPAN">
                  <a href="?module=user" class="btn btn-default btn-reset">BATAL</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>