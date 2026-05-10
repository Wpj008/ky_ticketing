<?php 
session_start();
require_once "../functions/tickets.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {

if(isset($_POST['id_tech'])){

    if(!empty($_POST['id_tech'])){
    

        $id_tech = htmlspecialchars($_POST['id_tech']);
        $id_ticket = $_SESSION['id_ticket'];

        assignTechToTicket($id_ticket, $id_tech);

        } else {
            echo "Veuillez sélectionner un technicien.";
            exit;
        } 
        
        } else {
            echo "Données de technicien manquantes.";
            exit;
        }

} else {

    header("Location: ../index.php");
    exit;









}



?>