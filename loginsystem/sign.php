<?php

$showalert = false;  // for showing sucess box
$showerror = false; // shoing error box optional
if(isset($_POST['username'])){ // run program only if username is set
// optional (if method is post)

include 'partials/dbconnect.php'; // connection with php
$username = $_POST['username'];
$Password = $_POST['Password'];
$CPassword = $_POST['CPassword'];

$sql ="SELECT * FROM `users`  WHERE username='$username'"; // select username from table and checj if it exist or not
$result = mysqli_query($con,$sql); // store the result
$num = mysqli_num_rows($result);
if($num > 0){
  $showerror = "USERNAME ALREADY TAKEN";
}
else{
if($Password == $CPassword){ // check if password and confirm password match or not
$sql = "INSERT INTO `users` ( `username`, `password`, `date`) VALUES ( '$username', '$Password', CURRENT_TIMESTAMP); "; // if all the condition are satisfy then insert data
$result = mysqli_query($con,$sql); // fire the query
if($result){
  $showalert = true; // if sql is truly inserted then showalert comes true
}
}
else{
$showerror = "password do not match";
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

    <title>sign up</title>
  </head>
  <body>
  <?php require 'partials/nav.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->
<?php
if($showalert){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>sucess sign up!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showerror){
  echo '<div class="alert alert-danger" role="alert">
  ERROR &nbsp '.$showerror.'
</div>';
}
?>

<h1 class="text-center">Sign to our website</h1>
</div>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
<form class="form-control" action="/loginsystem/sign.php" method="post">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
    <label for="CPassword4" class="form-label">CPassword</label>
    <input type="password" class="form-control" id="CPassword" name="CPassword">
<div class="row">
    <div class="col-md-12 my-5" >
    <button type="submit" class="btn btn-primary">Sign up</button>
    </div>
  </div>
    </form>
  </div>
  <div class="col-md-3"></div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
