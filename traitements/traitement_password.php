<?php
session_start();
require_once "../functions/users.php";
require_once "../functions/profile.php";

checkLogin();

$id_user = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {


    if(isset($_POST['new_password']) && isset($_POST['confirm_password'])){

        if(!empty($_POST['new_password']) && !empty($_POST['confirm_password'])){

           
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password == $confirm_password) {
                       
                updatePasseword($id_user, $confirm_password);
                // Message de succès
                echo "<p style='color:green;'>  Votre mot de passe a été mis à jour avec succès. </p>";
            } else {
                echo "<p style='color:red;'> Les mots de passe ne correspondent pas. </p>";
            }

        }


    }





} else if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submitReinitialisation'])) {

    ReinitialisationPassword($id_user);
    echo "<p style='color:green;'>  Le mot de passe a été réinitialisé !</p>";

  
    header("Location: ../pages/dashboard.php");
    exit;

} else {

    header("Location: ../pages/profile.php");

}










?>