<?php
session_start();

require_once "../functions/tickets.php";
require_once "../functions/users.php";

checkLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $id_ticket = $_POST['id_ticket'];

    $id_statut_ticket = $_POST['statut_id'];
    $id_priority_ticket = $_POST['priority_id'];

    $id_statut = $_POST['id_statut'];
    $id_priority = $_POST['id_priority'];

//update statut

    if(isset($_POST['id_statut'])){
            if (!empty($id_statut)) {

        if ($id_statut != $id_statut_ticket) {

            updateStatut($id_ticket, $id_statut);

        }

        }
    }


 //update priority

        if(isset($_POST['id_priority'])){
    if (!empty($id_priority)) {

        if ($id_priority != $id_priority_ticket) {

            updatePriority($id_ticket, $id_priority);

        }

    }
        }


   //redirection vers le dashboard

    header("Location: ../pages/dashboard.php");
    exit;

} else {

    header("Location: ../index.php");
    exit;

}


?>