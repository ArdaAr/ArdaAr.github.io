<?php
session_start();
require "db-connection.php";
// login validation
if (isset($_POST["login"])){
  // cek apakah username kosong
  if ($_POST["email"]==''){
    // echo '<div class="alert alert-danger" role="alert">
    //         Username harus diisi!
    //       </div>';
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
  echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body class="" style="background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1915&q=80');height: 100vh;">
    <div class="container-md">
      <div class="d-flex flex-row justify-content-evenly bd-highlight mb-3 p-3 mb-2 shadow bg-light mt-20 rounded text-dark">
        <div class="">
          <h3>User Login</h3>
          <form class="" action="" method="post">
            <?php
            if (isset($_POST["login"])){
              if (isset($error_email)){
                showAlert('Email Harus Diisi!');
              }elseif(isset($wrg_emaill)){
                showAlert('Email yang anda masukkan salah!');
              }else{
                showAlert('Password yang anda masukkan salah!');
              }
            }
            ?>
            <label for="email">Email</label><br>
            <input type="text" name="email" value="">
            <br><br>
            <label for="pw">Password</label><br>
            <input type="password" name="passwd" value="">

            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </form>
        </div>
        <div class="">
          <!-- <img src="https://images.unsplash.com/photo-1559056961-1f4dbbf9d36a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80" class="rounded mx-auto d-block" alt=""> -->
        </div>
      </div>
    </div>
  </body>
</html>
