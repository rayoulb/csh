<?php
include_once "../database/conn.php";
if (isset($_POST['user']) && isset($_POST['myselect']) && isset($_POST['email'])) {
    $user = intval($_POST['user']);
    $email = $_POST['email'];
    $myselect = $_POST['myselect'];
    $email = $_SESSION['email'];
    $update = mysqli_query($conn,"UPDATE `users` SET email_encadrant = '$email', `statut`='$myselect' WHERE id = '$user'");
    
    $update = mysqli_query($conn,"UPDATE `users` SET `statut_dencadrant`='$myselect' WHERE email = '$email'");
    echo "Statut enregistré";
}


