<?php
// Koneksi ke database //index
$conn = mysqli_connect("localhost", "root", "" , "toko");

function query($query){

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
}

// Registrasi
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email  = stripslashes($data["email"]);
    $password =  mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // cek username sudah ada atau belum
$result = mysqli_query($conn, "SELECT username FROM login WHERE 
        username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username sudah terdaftar !')
        </script>";
        return false;
    }
    //konfirmasi Password
    if ($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak valid !!!');
              </script> ";
            return false;
    }
    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // Tambah userbaru ke database
    mysqli_query($conn, "INSERT INTO login VALUES(NULL , '$username','$password','$email')");
    return mysqli_affected_rows($conn);
}

// Function Cari
function cari ($keyword){
    $query = "SELECT * FROM barang
                WHERE
                nama_barang LIKE '%$keyword%' OR
                harga_jual LIKE '%$keyword%' OR
                jumlah LIKE '%$keyword%' OR
                sisa LIKE '%$keyword%' ";
                
            return query($query);
            }
// End Function Cari
$barang = query("SELECT * FROM barang");
