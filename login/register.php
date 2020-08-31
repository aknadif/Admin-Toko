<?php 
require '../functions.php';
 if (isset($_POST['register'])){
   if(registrasi($_POST) > 0){
     echo "<script>
            alert('User baru berhasil ditambahkan');
     </script>";
     header("Location: login.php");
   } else {
     echo mysqli_error($conn);
   }

 }
?>

<html>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
     input[type=text] {
        width: 85%;
        height: 35px;       
        padding: 10px;
        box-shadow: 5px 10px 18px #888888;
    }
    input[type=password] {
        width: 85%;
        height: 35px;
        padding: 10px;
        box-shadow: 5px 10px 18px #888888;
    }
    
    .container {
        -webkit-border-radius: 10px 10px 10px 10px;
        border-radius: 10px 10px 10px 10px;
        background: #fff;
        padding: 30px;
        width: 90%;
        max-width: 600px;
        position: relative;
        padding: 0px;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
        box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
        text-align: center;
        margin-top: 150px;
        font-family:  "Poppins", sans-serif;
    }
    .reg{
        text-align: center;
        font-size: 35px;
        color: black;
        padding: 20px;
       
    }
    .control-label{
        font-size: 16px;
        margin-left: 30px;
    }
    button {
        background-color: #56baed;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    font-size: 13px;
    -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
    box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    margin: 10px 1000px 5px 20px;

    }
</style>
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
  

<form class="form-horizontal" action='' method="POST">
  <fieldset>
     
  <div class="container"> 
    <div id="legend">
      <legend class="reg">Register Admin Page</legend>
    </div>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge" required>
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge" required>
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password2">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password2" name="password2" placeholder="" class="input-xlarge" required>
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="submit" name="register">Register</button>
      </div>
    </div>
    </div>
    
  </fieldset>
</form>
</body>
</html>
