<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> DATA SATUAN BARANG

    <a class="btn btn-primary btn-social pull-right" href="?module=form_satuan&form=add">
      <i class="fa fa-plus"></i> TAMBAH
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Satuan barang baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Satuan Barang Berhasil Disimpan
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Satuan barang berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Satuan Barang Berhasil Diganti
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Satuan barang berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Satuan Barang Berhasil Dihapus
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel satuan -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">NO</th>
                <th class="center">SATUAN</th>
                <th class="center">AKSI</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel satuan
            $query = mysqli_query($mysqli, "SELECT * FROM is_satuan ORDER BY id_satuan DESC")
                                            or die('Ada kesalahan pada query tampil Data Satuan Barang: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='40' class='center'>$no</td>
                      <td width='350' class='center'>$data[nama_satuan]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='GANTI' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_satuan&form=edit&id=$data[id_satuan]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="HAPUS" class="btn btn-danger btn-sm" href="modules/satuan/proses.php?act=delete&id=<?php echo $data['id_satuan'];?>" onclick="return confirm('Konfirmasi Penghapusan <?php echo $data['nama_satuan']; ?>');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content