<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header('Location:login.php');
  }
  $data = $_SESSION["data"];
?>
<!-- https://www.slideteam.net/wp/wp-content/uploads/2016/05/Graidient-4.png -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body class="p-5" style="background-image: url(bg/20-Soft-Gradient-Background-copy-1.jpg);height: 100vh;">
  <div class="container-md text-blue">
    <div class="d-flex justify-content-center flex-row bd-highlight mb-2 mt-2 text-dark">
      <div class="rounded-xl p-2 shadow">
        <img src="icon/logo.png" style="width:auto;" class="rounded" alt="logo app">
      </div>
      <div class="d-flex flex-column justify-content-center w-25 bg-light p-3 shadow rounded-2 text-center">
        <div class="">
          <img class="rounded-md shadow mb-3" src="userpict/<?=$data["pict"];?>" style="width:80%;" alt="">
          <h2><?= 'SELAMAT DATANG '.$data["Nama"]; ?></h2>
          <a href="logout.php" class="btn btn-info text-white">Logout</a>
        </div>
      </div>
    </div>
    <div class="mt-3 text-center text-white">
      <p class="mt-2"> &copy Copyrights - Whinar Kukuh Rizky Ardana - All Right Reserved</p>
    </div>
  </div>
</body>
</html>
