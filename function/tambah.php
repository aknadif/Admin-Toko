<?php 
require '../functions.php';
//Function Tambah Barang
// Tambah Data

function tambah($data){
    date_default_timezone_set('Asia/Jakarta');
    global $conn;

    $nama   = htmlspecialchars($data ["nama"]);
    $harga  = htmlspecialchars($data ["harga"]);
    $jumlah = htmlspecialchars($data ["jumlah"]);
    $tanggal = date("Y-m-d H:i:s");

    $query = "INSERT INTO barang
            VALUES
            ( NULL ,'$nama', '$harga', '$jumlah', '$jumlah','$tanggal')
            ";
mysqli_query($conn, $query);


 return mysqli_affected_rows($conn);   
}
// End Tambah Barang

if ( isset($_POST["submit"])){

    if ( tambah($_POST) > 0 ){
      echo  "<script>
            alert('Data Berhasil Dimasukkan');
            document.location.href = '../index.php';
        </script>";
    }else {
      echo  "<script>
        alert('Data Tidak Berhasil Dimasukkan !!!');
        document.location.href = '../index.php';
    </script>";
    }
  
  }
  // End Tambah Data

