<?php 
include('../functions.php');
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM `penjualan` WHERE `penjualan`.`id_penjualan` = $id");
    return mysqli_affected_rows($conn);
}
$id = $_GET["id"];
if (hapus($id) > 0){
    echo  "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = '../index.php';
        </script>";
} else {
    echo  "<script>
            alert('Data Tidak Berhasil Dihapus !!!');
            document.location.href = '../index.php';
        </script>";
}

?>