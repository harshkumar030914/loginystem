<?php
$server="localhost";
$username="root";
$password="";
$dbname="users1493";
$con = mysqli_connect($server,$username,$password,$dbname);
if(!$con){
  die("error".mysqli_connect_error());
}
else{
  //echo "sucess";
}
 ?>
