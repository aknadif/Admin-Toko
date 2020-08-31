<?php
session_start();
include '../functions.php';
//cek cookie
if (isset($_COOKIE["id"])&& isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
    //ambil username berdasarkan id

$result =  mysqli_query($conn, "SELECT username FROM user WHERE 
                id = $id");
$row = mysqli_fetch_assoc($result);

//cek cookie id dan ussername
if ($key === hash("sha265", $row["username"])){
  $_SESSION ["login"] = true;
}


}
if(isset($_SESSION["login"])){
  header("Location: ../index.php");
  exit;
}

  if (isset($_POST["login"])){
    $username = $_POST["login"];
    $password = $_POST["password"];

    $result =  mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1 ){

      //cek password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])){
        //set session
        $_SESSION["login"] = true;
        //cek remember me
        if(isset($_POST["remember"])){
          //buat cookie
          setcookie("id", $row['id'], time()+120);
          setcookie("key", hash("sha256",$row['username'], time()+120));
        }

         header("Location: ../index.php");
         exit;
      }
    }
    $error = true;    
  }
?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
      
    <!-- Icon -->
    <div class="fadeIn first">
      <h1>Login Admin Page</h1>
      <?php if(isset($_POST["login"])) : ?>
        <p style="color : red;font-style:italic;">Username / Password tidak sesuai !!!</p>
      <?php endif; ?>
      </div>

    <!-- Login Form -->
    <form action="" method="post">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      
      
      <input type="submit" class="fadeIn fourth" value="Log In">
    

    <!-- Remind Passowrd -->
    <div id="formFooter">
    <input type="checkbox" name="remember" id="remember">
    <label for="remember" class="remember">Remember me</label>
    </form>
      <a class="underlineHover" href="register.php">No Register yet ? </a>
    </div>

  </div>
</div>
</body>
</html>