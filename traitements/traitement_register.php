<?php 
session_start();
require_once "../functions/data.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {


    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){

        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])){
    

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $role = htmlspecialchars($_POST['role']);

        registerUser($name, $email, $password, $role);

        } else {
            echo "Veuillez remplir tous les champs.";
            exit;
        } 
        
        } else {
            echo "Données d'inscription manquantes.";
            exit;
        }



}else {

    header("Location: ../index.php");
    exit;
}






?>