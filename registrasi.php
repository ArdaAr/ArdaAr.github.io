<?php
require "db-connection.php";

if(isset($_POST["save"])){
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $pw = $_POST["passwd"];
  $username = $_POST["username"];
  // $gambar = $_POST["pict"];

  print_r($_FILES['gambar']);
  // handle uploaded images
  $namaFile = $_FILES['gambar']['name'];
  $namaTmp = $_FILES['gambar']['tmp_name'];
  $target_dir = "userpict/";
  $uploaded = move_uploaded_file($namaTmp, $target_dir.$namaFile);
  // $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
  // $imageFile = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $regis = $conn->query("INSERT INTO user (Nama, email, password, username, pict) VALUES ('$nama', '$email', '$pw', '$username', '$namaFile')");
  if ($regis){
    header('Location:login.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body style="background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1915&q=80');height: 100vh;">
    <div class="container-md text-center text-white">
      <h1>REGISTRATION HERE </h1>
      <div class="d-flex justify-content-center flex-row bd-highlight mb-2 mt-2 text-dark">
        <div class="w-50 bg-light p-3 shadow rounded-2 text-start">
          <form class="" action="" method="post" enctype="multipart/form-data">
            <label for="email">Alamat Email : </label><br>
            <input class="w-100 mt-2 border-0 shadow" type="email" name="email" value="" required>
            <br><br>
            <label for="pw">Password : </label><br>
            <input class="w-100 mt-2 border-0 shadow" type="password" name="passwd" value="" required>
            <br><br>
            <label for="nama">Nama Lengkap : </label><br>
            <input class="w-100 mt-2 border-0 shadow" type="text" name="nama" value="" required>
            <br><br>
            <label for="username">Username : </label><br>
            <input class="w-100 mt-2 border-0 shadow" type="text" name="username" value="" required>
            <br><br>
            <label for="gambar">Foto Profil : </label><br>
            <input class="w-100 mt-2 border-0 shadow" type="file" name="gambar" value="" required><br>
            <div class="text-center">
              <button type="submit" name="save" class="btn btn-info mt-3 text-white">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
