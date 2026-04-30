<?php 
session_start();
require_once "../functions/data.php";
require_once "../functions/users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {

    if(isset($_POST['email']) && isset($_POST['password'])){

        if(!empty($_POST['email']) && !empty($_POST['password'])){
    

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        var_dump($email);
        var_dump($password);

         loginUser($email, $password);
         

        } else {
            echo "Veuillez remplir tous les champs.";
            exit;
        } 
        
        } else {
            echo "Données de connexion manquantes.";
            exit;
        }

} else {

    header("Location: ../index.php");
    exit;
}


?>