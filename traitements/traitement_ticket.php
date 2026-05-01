<?php 
session_start();
require_once "../functions/tickets.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {

    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['priority'])){

        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['priority'])){
    

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $priority = htmlspecialchars($_POST['priority']);

        createTicket($title, $description, $priority);

        } else {
            echo "Veuillez remplir tous les champs.";
            exit;
        } 
        
        } else {
            echo "Données de ticket manquantes.";
            exit;
        }

} else {

    header("Location: ../index.php");
    exit;
}







?>