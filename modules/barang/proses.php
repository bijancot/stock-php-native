<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_barang    = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
            $nama_barang  = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
            $id_jenis     = mysqli_real_escape_string($mysqli, trim($_POST['jenis']));
            $id_satuan    = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

            //data gambar
            $rand = rand();
            $ekstensi =  array('png','jpg','jpeg','gif');
            $filename = $_FILES['foto_barang']['name'];
            $ukuran = $_FILES['foto_barang']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            //cek ekstensi gambar, jika tidak sesuai dengan $ekstensi, akan gagal
            if(!in_array($ext,$ekstensi) ) {
                header("location: ../../main.php?module=barang&alert=4");
            }else{
                //cek ukuran gambar, jika tidak sesuai dengan batas, akan gagal
                if($ukuran < 1044070){		
                    $xx = $rand.'_'.$filename;
                    move_uploaded_file($_FILES['foto_barang']['tmp_name'], '../../images/barang/'.$rand.'_'.$filename);
                    
                    $created_user = $_SESSION['id_user'];

                    // perintah query untuk menyimpan data ke tabel barang
                    $query = mysqli_query($mysqli, "INSERT INTO is_barang(id_barang,nama_barang,id_jenis,id_satuan,created_user,updated_user,foto_barang) 
                                                    VALUES('$id_barang','$nama_barang','$id_jenis','$id_satuan','$created_user','$created_user','$xx')")
                                                    or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
        
                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil simpan data
                        header("location: ../../main.php?module=barang&alert=1");
                    }   

                }else{
                    header("location: ../../main.php?module=barang&alert=gagak_ukuran");
                }
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_barang'])) {
                // ambil data hasil submit dari form
                $id_barang    = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
                $nama_barang  = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
                $id_jenis     = mysqli_real_escape_string($mysqli, trim($_POST['jenis']));
                $id_satuan    = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

                 //data gambar
                $rand = rand();
                $ekstensi =  array('png','jpg','jpeg','gif');
                $filename = $_FILES['foto_barang']['name'];
                $ukuran = $_FILES['foto_barang']['size'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                if(!in_array($ext,$ekstensi) ) {
                    header("location: ../../main.php?module=barang&alert=4");
                }else{
                    //cek ukuran gambar, jika tidak sesuai dengan batas, akan gagal
                    if($ukuran < 1044070){		
                        $xx = $rand.'_'.$filename;
                        move_uploaded_file($_FILES['foto_barang']['tmp_name'], '../../images/barang/'.$rand.'_'.$filename);
                        
                        $updated_user = $_SESSION['id_user'];

                        // perintah query untuk mengubah data pada tabel barang
                        $query = mysqli_query($mysqli, "UPDATE is_barang SET nama_barang    = '$nama_barang',
                                                                             id_jenis       = '$id_jenis',
                                                                             id_satuan      = '$id_satuan',
                                                                             updated_user   = '$updated_user',
                                                                             foto_barang    = '$xx'
                                                                       WHERE id_barang      = '$id_barang'")
                                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
        
                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil update data
                            header("location: ../../main.php?module=barang&alert=2");
                        }         
    
                    }else{
                        header("location: ../../main.php?module=barang&alert==gagak_ukuran");
                    }
                }
                
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_barang = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel barang
            $query = mysqli_query($mysqli, "DELETE FROM is_barang WHERE id_barang='$id_barang'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=barang&alert=3");
            }
        }
    }       
}       
?>