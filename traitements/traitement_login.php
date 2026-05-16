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
            echo "<p style='color:red;'> Veuillez remplir tous les champs. </p>";
            exit;
        } 
        
        } else {
            echo "<p style='color:red;'> Données de connexion manquantes. </p>";
            exit;
        }

} else {

    header("Location: ../index.php");
    exit;
}


?>