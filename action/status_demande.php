<?php
include_once "../database/conn.php";
if (isset($_POST['id']) && isset($_POST['status']) && isset($_POST['email_encadrant'])) {
    $id = intval($_POST['id']);
    $email_encadrant = $_POST['email_encadrant'];
    $status = $_POST['status'];
    $update = mysqli_query($conn,"UPDATE `demander` SET  `end_stg`='$status',email_encadrant='$email_encadrant' WHERE id = '$id'");
    echo "Statut enregistré";
}


