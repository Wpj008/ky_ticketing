<?php 
session_start();
require_once "../functions/data.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {


    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['role'])){

        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['role'])){
    

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = "123456";
        $role = htmlspecialchars($_POST['role']);

        registerUser($name, $email, $password, $role);

        } else {
            echo "<p style='color:red;'> Veuillez remplir tous les champs. </p>";
            exit;
        } 
        
        } else {
             echo "<p style='color:red;'> Données d'inscription manquantes. </p>";
            exit;
        }



}else {

    header("Location: ../index.php");
    exit;
}






?>