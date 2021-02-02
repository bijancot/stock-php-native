<?php  
if (isset($_POST['id_user'])) {
  // fungsi query untuk menampilkan data dari tabel user
  $query = mysqli_query($mysqli, "SELECT * FROM is_users WHERE id_user='$_POST[id_user]'") 
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
      <li><a href="?module=profil">PROFIL</a></li>
      <li class="active">GANTI</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/profil/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">USERNAME</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="username" placeholder="USERNAME" autocomplete="off" value="<?php echo $data['username']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NAMA</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_user" placeholder="NAMA" autocomplete="off" value="<?php echo $data['nama_user']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">EMAIL</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" placeholder="EMAIL" autocomplete="off" value="<?php echo $data['email']; ?>">
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-2 control-label">TELEPON</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telepon" placeholder="TELEPON" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telepon']; ?>">
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
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="SIMPAN">
                  <a href="?module=profil" class="btn btn-default btn-reset">BATAL</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->