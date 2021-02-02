<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> DATA STOK BARANG

    <a class="btn btn-primary btn-social pull-right" href="?module=form_barang&form=add">
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
    // tampilkan pesan Sukses "Data barang baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Stok Barang Berhasil Disimpan
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data barang berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Stok Barang Berhasil Diganti
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data barang berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Stok Barang Berhasil Dihapus
            </div>";
    }

    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Cek lagi foto barang yang anda unggah ;D
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel barang -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">NO</th>
                <th class="center">ID</th>
                <th class="center">BARANG</th>
                <th class="center">FOTO BARANG</th>
                <th class="center">JENIS</th>
                <th class="center">STOK</th>
                <th class="center">SATUAN</th>
                <th class="center">AKSI</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT a.id_barang,a.nama_barang,a.id_jenis,a.id_satuan,a.stok,b.id_jenis,b.nama_jenis,c.id_satuan,c.nama_satuan,a.foto_barang
                                            FROM is_barang as a INNER JOIN is_jenis_barang as b INNER JOIN is_satuan as c
                                            ON a.id_jenis=b.id_jenis AND a.id_satuan=c.id_satuan ORDER BY id_barang DESC")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_barang]</td>
                      <td width='180' class='center'><img height='150'src='images/barang/$data[foto_barang]'/></td>
                      <td width='180' class='center'>$data[nama_barang]</td>
                      <td width='150' class='center'>$data[nama_jenis]</td>
                      <td width='80' class='center'>$data[stok]</td>
                      <td width='100' class='center'>$data[nama_satuan]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='GANTI' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_barang&form=edit&id=$data[id_barang]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="HAPUS" class="btn btn-danger btn-sm" href="modules/barang/proses.php?act=delete&id=<?php echo $data['id_barang'];?>" onclick="return confirm('Konfirmasi Penghapusan <?php echo $data['nama_barang']; ?>');">
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