<?php
session_start();
require "db-connection.php";
if (isset($_COOKIE["uid"]) && isset($_COOKIE["unm"])){
  // select username from db
  $id = $_COOKIE["uid"];
  $result = $conn->query("SELECT * FROM user WHERE id_user='$id'");
  $row = $result->fetch_assoc();
  $username = $row["username"];
  if ($_COOKIE["unm"] === hash('md5', $username)){
    $_SESSION["login"] = true;
    $_SESSION["data"] = $row;
  }
}
if(isset($_SESSION["login"])){
  header('Location:index.php');
}
// login validation
if (isset($_POST["login"])){
  // cek apakah username kosong
  if ($_POST["email"]==''){
    $error_email = true;
  }else{
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    // cek username dari database
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    if (isset($data)){
      if ($passwd==$data["password"]){
        $_SESSION["login"] = true;
        $_SESSION["data"] = $data;

        if (isset($_POST['remember'])) {
          setcookie('uid', $data['id_user'], time()+60);
          setcookie('unm', hash('md5', $data['username']), time()+60);
        }
        header('Location:index.php');
        exit;
      }else{
        $error_passwd = true;
      }
    }else{
      $wrg_email=true;
    }
  }
}
// function to show alert error
function showAlert($message){
  echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body class="p-5" style="background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1915&q=80');height: 100vh;">
    <div class="container-md text-center">
      <img src="icon/logo.png" style="width:100px;" alt="logo app">
      <div class="d-flex justify-content-center flex-row bd-highlight mb-2 mt-2 text-dark">
        <div class="w-25 bg-light p-3 shadow rounded-2">
          <img src="icon/profile.png" style="width:80px;" alt="user icon">
          <h3>User Login</h3>
          <form class="text-start" action="" method="post">
            <?php
            if (isset($_POST["login"])){
              if (isset($error_email)){
                showAlert('Email Harus Diisi!');
              }elseif(isset($wrg_email)){
                showAlert('Email yang anda masukkan salah!');
              }else{
                showAlert('Password yang anda masukkan salah!');
              }
            }
            ?>
            <label for="email">Email</label><br>
            <input class="w-100 mt-2 border-0 shadow" type="email" name="email" value="">
            <br><br>
            <label for="pw">Password</label><br>
            <input class="w-100 mt-2 border-0 shadow" type="password" name="passwd" value=""><br>
            <br>
            <a class="" href="registrasi.php">Buat Akun</a><br>
            <div class="text-center mt-2">
              <input type="checkbox" name="remember" id="remember" value="">
              <label for="remember">Remember me ?</label><br>
              <button type="submit" name="login" class="btn btn-info text-white mt-2">Login</button>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-5 text-white">
        <a class="text-white p-3" href="#">Privacy</a>
        <a class="text-white p-3" href="#">Security</a>
        <a class="text-white p-3" href="#">Terms</a>
        <p class="mt-2 mb-2"> &copy Copyrights - Whinar Kukuh Rizky Ardana - All Right Reserved</p>
      </div>
    </div>
  </body>
</html>
