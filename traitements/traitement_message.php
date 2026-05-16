<?php
session_start();
require_once "../functions/tickets.php";
require_once "../functions/users.php";
require_once "../functions/messages.php";

checkLogin();


if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {




    if(isset($_POST['message'])){

         if(!empty($_POST['message'])){

         $message = htmlspecialchars($_POST['message']);

         $ticket_id = $_SESSION['id_ticket'];
         $user_id = $_SESSION['user_id'];

            createMessage($message, $ticket_id, $user_id);
         } else {

         echo "<p style='color:red;'> Erreur lors de l'envoie de la requete !! </p>";
         }

    }


}






















?>