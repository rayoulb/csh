<?php 

session_start();
define("ROOT","https://rcoding.xyz/");
define("NAME_WEBSITE","CSH");
$conn= mysqli_connect('localhost','u306861737_csh','Bg+7A7N$h','u306861737_csh');


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  
  //unset qunatity
  unset($_SESSION['qty_array']);

  
  
  


