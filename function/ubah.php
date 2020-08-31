<?php 
include '../functions.php';
//Ubah
function ubah($data){
    global $conn;
    $id = $data["id"];

    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_jual'];
    $jumlah = $_POST['jumlah'];
    $sisa = $_POST['sisa'];

    $query = "UPDATE barang SET
            nama_barang = '$nama',
            harga_jual = '$harga',
            jumlah = '$jumlah',
            sisa = '$sisa'
            WHERE id = $id
            ";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}
if ( isset($_POST["submit"])){

    if( ubah ($_POST) > 0 ){
      echo  "<script>
            alert('Data Berhasil Diubah');
            document.location.href = '../index.php';
        </script>";
    }else {
      echo  "<script>
        alert('Data Tidak Berhasil Diubah !!!');
        document.location.href = '../index.php';
    </script>";
    }
  
  }

?>
