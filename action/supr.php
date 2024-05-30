<?php 
include_once "../database/conn.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM `users` WHERE id = '$id'");
    header('location:../accounts.php');
}