<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-out icon-title"></i> TRANSAKSI BARANG KELUAR

    <a class="btn btn-primary btn-social pull-right" href="?module=form_barang_keluar&form=add">
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
    // tampilkan pesan Sukses "Data Barang Keluar berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Barang Keluar Berhasil Disimpan
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data Barang Keluar telah disetujui"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Barang Keluar Telah Disetujui
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data Barang Keluar telah ditolak"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> SUKSES</h4>
              Barang Keluat Telah Ditolak
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
                <th class="center">TRANSAKSI</th>
                <th class="center">TANGGAL</th>
                <th class="center">ID</th>
                <th class="center">BARANG</th>
                <th class="center">JUMLAH</th>
                <th class="center">STATUS</th>
                <th class="center">AKSI</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel barang
            $query = mysqli_query($mysqli, "SELECT a.id_barang_keluar,a.tanggal_keluar,a.id_barang,a.jumlah_keluar,a.status,b.id_barang,b.nama_barang,b.id_satuan,b.stok,c.id_satuan,c.nama_satuan
                                            FROM is_barang_keluar as a INNER JOIN is_barang as b INNER JOIN is_satuan as c
                                            ON a.id_barang=b.id_barang AND b.id_satuan=c.id_satuan ORDER BY id_barang_keluar DESC")
                                            or die('Ada kesalahan pada query tampil Data Barang Keluar: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $tanggal        = $data['tanggal_keluar'];
              $exp            = explode('-',$tanggal);
              $tanggal_keluar = $exp[2]."-".$exp[1]."-".$exp[0];

              if ($_SESSION['hak_akses']=='Super Admin') {
                // menampilkan isi tabel dari database ke tabel di aplikasi
                echo "<tr>
                        <td width='30' class='center'>$no</td>
                        <td width='100' class='center'>$data[id_barang_keluar]</td>
                        <td width='90' class='center'>$tanggal_keluar</td>
                        <td width='80' class='center'>$data[id_barang]</td>
                        <td width='150' class='center'>$data[nama_barang]</td>
                        <td width='100' class='center'>$data[jumlah_keluar] $data[nama_satuan]</td>
                        <td width='70' class='center'>$data[status]</td>";

                if ($data['status']=='Proses') {
                  echo "<td class='center' width='110'>
                          <a data-toggle='tooltip' data-placement='top' title='SETUJUI' style='margin-right:5px' class='btn btn-success btn-sm' href='modules/barang-keluar/proses.php?act=approve&id=$data[id_barang_keluar]&jml=$data[jumlah_keluar]&idb=$data[id_barang]&stok=$data[stok]'>
                              <i style='color:#fff' class='glyphicon glyphicon-ok'></i>
                          </a>

                          <a data-toggle='tooltip' data-placement='top' title='TOLAK' style='margin-right:5px' class='btn btn-danger btn-sm' href='modules/barang-keluar/proses.php?act=reject&id=$data[id_barang_keluar]'>
                              <i style='color:#fff' class='glyphicon glyphicon-remove'></i>
                          </a>

                          <a data-toggle='tooltip' data-placement='top' title='TAMBAH' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_barang_keluar&form=add&id=$data[id_barang]'>
                              <i style='color:#fff' class='glyphicon glyphicon-plus'></i>
                          </a>
                        </td>";
                  } else {
                    echo "<td class='center' width='40'>
                          <a data-toggle='tooltip' data-placement='top' title='TAMBAH' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_barang_keluar&form=add&id=$data[id_barang]'>
                              <i style='color:#fff' class='glyphicon glyphicon-plus'></i>
                          </a>
                        </td>";
                  }
                        
                  echo "</tr>";
              } else {
                // menampilkan isi tabel dari database ke tabel di aplikasi
                echo "<tr>
                        <td width='30' class='center'>$no</td>
                        <td width='100' class='center'>$data[id_barang_keluar]</td>
                        <td width='90' class='center'>$tanggal_keluar</td>
                        <td width='80' class='center'>$data[id_barang]</td>
                        <td width='200' class='center'>$data[nama_barang]</td>
                        <td width='120' class='center'>$data[jumlah_keluar] $data[nama_satuan]</td>
                        <td width='100' class='center'>$data[status]</td>
                        <td class='center' width='40'>
                          <a data-toggle='tooltip' data-placement='top' title='TAMBAH' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_barang_keluar&form=add&id=$data[id_barang]'>
                              <i style='color:#fff' class='glyphicon glyphicon-plus'></i>
                          </a>
                        </td>
                      </tr>";
              }
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