<?php

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
  $login = true;
}
else{
  $login = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGINSystem</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';
        if($login){
      echo '  <li class="nav-item">
          <a class="nav-link" href="login.php">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign.php">SIGN IN</a>
        </li>';
      }
      if(!$login){
echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">LOG OUT</a>
        </li>';
}
      echo '</ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
?>
