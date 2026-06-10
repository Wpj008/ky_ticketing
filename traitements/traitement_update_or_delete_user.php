<?php
session_start();

require_once "../functions/tickets.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitUpdate'])) {


    $id_user = $_POST['id_user'];

    if(isset($_POST['name_user']) && isset($_POST['email_user']) && isset($_POST['name_user_hidden']) && isset($_POST['email_user_hidden'])) {

    $name_bdd = htmlspecialchars($_POST['name_user_hidden']);
    $email_bdd = htmlspecialchars($_POST['email_user_hidden']);

    $name_form = htmlspecialchars($_POST['name_user']);
    $email_form = htmlspecialchars($_POST['email_user']);

    if (!empty($name_form) && !empty($email_form)) {


    if ($name_form != $name_bdd) {

        updateName($id_user, $name_form);

    }

    if ($email_form != $email_bdd) {
        updateEmail($id_user, $email_form);

    }

    } else {

        echo "<p style='color:red;'> Veuillez remplir tous les champs du formulaire. </p>";

    }

    } else {

        echo "<p style='color:red;'> Données du formulaire manquantes. </p>";

    }

    header("Location: ../pages/profile.php");
    exit;

    
} 


//Traitement suppression de compte

else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitDelete'])) {


    if(isset($_POST['id_user'])) {

        $id_user = $_POST['id_user'];

        if (!empty($id_user) && $_SESSION['role_id'] == 3) {

            deleteUser($id_user);

        } else {

            echo "<p style='color:red;'> ID utilisateur manquant ou vous n'avez pas les droits nécessaires. </p>";

        }

    } else {
        echo "<p style='color:red;'> Données de suppression manquantes. </p>";

    }

  

} else {

    header("Location: ../index.php");
    exit;

}

?>