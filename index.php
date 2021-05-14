<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body class="" style="background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1915&q=80');height: 100vh;">
    <div class="container-md">
      <div class="d-flex flex-row justify-content-evenly bd-highlight mb-3 p-3 mb-2 shadow bg-light mt-20 rounded text-dark">
        <div class="">
          <h3>User Login</h3>
          <form class="" action="handleLogin.php" method="post">
            <label for="email">Email</label><br>
            <input type="email" name="email" value="">
            <br><br>
            <label for="pw">Password</label><br>
            <input type="password" name="passwd" value="">

            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
        <div class="">
          <!-- <img src="https://images.unsplash.com/photo-1559056961-1f4dbbf9d36a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80" class="rounded mx-auto d-block" alt=""> -->
        </div>
      </div>
    </div>
  </body>
</html>
