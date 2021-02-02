<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> LAPORAN STOK BARANG

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-stok/cetak.php" target="_blank">
      <i class="fa fa-print"></i> CETAK
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
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
                                            ON a.id_jenis=b.id_jenis AND a.id_satuan=c.id_satuan ORDER BY id_barang DESC")
                                            or die('Ada kesalahan pada query tampil Data Barang: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_barang]</td>
                      <td width='200' class='center'>$data[nama_barang]</td>
                      <td width='170' class='center'>$data[nama_jenis]</td>";
                    if ($data['stok']<=4) { ?>
                      <td width="80" align="center"><span class="label label-warning"><?php echo $data['stok']; ?></span></td>
                    <?php
                    } else { ?>
                      <td width="80" align="center"><?php echo $data['stok']; ?></td>
                    <?php
                    }
              echo "   <td width='100' class='center'>$data[nama_satuan]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
          <div>
            <strong>KETERANGAN</strong> <br>
            <span style="color:#f0ad4e" class="label label-warning">≤ 5</span> = STOK HAMPIR HABIS
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content