<?php 
session_start();
require_once "../functions/tickets.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {

if(isset($_POST['id_tech'])){

    if(!empty($_POST['id_tech'])){
    

        $id_tech = htmlspecialchars($_POST['id_tech']);
        $id_ticket = $_POST['id_ticket'];

        assignTechToTicket($id_ticket, $id_tech);

        } else {
            echo "<p style='color:red;'> Veuillez sélectionner un technicien. </p>";
            exit;
        } 
        
        } else {
            echo "<p style='color:red;'> Données de technicien manquantes. </p>";
            exit;
        }

} else {

    header("Location: ../index.php");
    exit;









}



?>