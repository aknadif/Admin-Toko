<?php 
require '../functions.php';
//Function Tambah Barang
// Tambah Data
$sql= mysqli_query($conn, "SELECT * FROM penjualan, barang WHERE penjualan.id=barang.id ORDER BY id_penjualan desc");
$data = $sql->fetch_assoc();
function entry($data){
    date_default_timezone_set('Asia/Jakarta');
    global $conn;

    $id   = $_POST['id'];

    $harga_jual = mysqli_query($conn, "SELECT harga_jual FROM barang WHERE id='$id'");
    $row = mysqli_fetch_array($harga_jual);
    $harga= $row["harga_jual"];

    $jumlah = htmlspecialchars($data ["jumlah_terjual"]);
    $total_harga = $jumlah * $harga;
    $tanggal_terjual = date("Y-m-d H:i:s");

    $total = mysqli_query($conn, "SELECT sisa FROM barang WHERE id='$id'");
    $row1 = mysqli_fetch_array($total);
    $sisa= $row1["sisa"];
    $sisak = $sisa - $jumlah;


    $query = "INSERT INTO penjualan
            VALUES
            ( NULL ,'$id', '$jumlah', '$total_harga', '$tanggal_terjual');
            ";            
    $query .= "UPDATE barang SET sisa = $sisak WHERE id = '$id' ";
    


mysqli_multi_query($conn, $query);

 return mysqli_affected_rows($conn);   
}
// End Tambah Barang

if ( isset($_POST["submit"])){

    if ( entry($_POST) > 0 ){
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

