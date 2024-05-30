<?php 
include_once "../database/conn.php";
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $delete = mysqli_query($conn,"DELETE FROM `offers` WHERE id = '$id'");
    header('location:../offers.php');
}