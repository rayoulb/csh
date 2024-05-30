
<?php 
include_once "../database/conn.php";
if(isset($_GET['id']) && isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $id = intval($_GET['id']);
    $select= mysqli_query($conn,"SELECT * FROM `offers` where id = '$id' LIMIT 1");
    while($row = mysqli_fetch_assoc($select)){
        $service = $row['service'];
        $sujet = $row['sujet'];
        $profile = $row['profile'];
        $date_de_début = $row['date_de_début'];
        $date_dxpiration = $row['date_dxpiration'];
    }

    $select_befor = mysqli_query($conn,"SELECT * FROM `demander` WHERE email = '$email' AND service = '$service'");

    if(mysqli_num_rows($select_befor) > 0){
        exit('Commandez avant, veuillez patienter <a href="../offers_stagiaire.php">RETOUR</a>');
    }else{

        $insert = mysqli_query($conn,"INSERT INTO `demander`( `service`, `sujet`, `profile`, `date_de_début`, `date_dxpiration`, `email`) 
        VALUES ('$service','$sujet','$profile','$date_de_début','$date_dxpiration','$email')");
        header('location:../offers_stagiaire.php');
    }


}
?>

