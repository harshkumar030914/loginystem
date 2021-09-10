<?php

$login = false;
$showerror = false;
if(isset($_POST['username'])){
if($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partials/dbconnect.php';
$username = $_POST['username'];
$Password = $_POST['Password'];


$sql = "SELECT * FROM `users`  WHERE username='$username' AND password='$Password'";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
   $login = true;
   session_start();
   $_SESSION['login'] = true;
      $_SESSION['username'] = $username;
      header("location:welcome.php");
}
else{
$showerror = true;
}
}
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>loginsystem up</title>
  </head>
  <body>
  <?php require 'partials/nav.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->
<?php
if($login){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>you log in!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showerror){
  echo '<div class="alert alert-danger" role="alert">
<strong>  Password NOT MATCH!</strong>'.$showerror.'
</div>';
}
?>

<h1 class="text-center" >Login  to our website</h1>
</div>
<form class="row g-3" action="/loginsystem/login.php" method="post">
  <div class="col-md-6">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="col-md-6">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>

    </div>
  </div>
  <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Sign up</button>
  </div>
</form>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
