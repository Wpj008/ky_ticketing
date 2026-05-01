<?php 
require_once "data.php";

function createTicket($title, $description, $priority){

    try{

        $queryTicket = getPDO()->prepare("INSERT INTO tickets(title_ticket, description_ticket, user_id, statut_id, priority_id) VALUES(:title, :description, :user_id, :statut_id, :priority_id)");

        $queryTicket->bindParam(':title', $title);
        $queryTicket->bindParam(':description', $description);
        $queryTicket->bindParam(':user_id', $_SESSION['user_id']);
        $queryTicket->bindValue(':statut_id', 1);
        $queryTicket->bindParam(':priority_id', $priority);

        $queryTicket->execute();
        echo "Ticket créé avec succès !";
        header("Location: ../pages/dashboard.php");
        exit;

    }catch(PDOException $e){

        echo "Erreur lors de la création du ticket : " . $e->getMessage();
        exit;
    }


}

function selectAllTickets(){

    try{

    $queryGetTickets = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user");

    $queryGetTickets->execute();

    $results = $queryGetTickets->fetchAll(PDO::FETCH_ASSOC);

    return $results;

    } catch(PDOException $e){
        echo "Erreur lors de la récupération des tickets : " . $e->getMessage();
        exit;
    }



}


function selectAllPriorities(){

    try{

    $queryPriority = getPDO()->prepare("SELECT * FROM priorities");

    $queryPriority->execute();

    $results = $queryPriority->fetchAll(PDO::FETCH_ASSOC);

    return $results;


    }catch(PDOException $e){
        echo "Erreur lors de la récupération des priorités : " . $e->getMessage();
        exit;
    }

}

    function selectOnlyTicket($id_ticket){

        try{

            $queryOnlyTicket = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user WHERE id_ticket = :id_ticket");

            $queryOnlyTicket->bindParam(':id_ticket', $id_ticket);
            $queryOnlyTicket->execute();

            $result = $queryOnlyTicket->fetch(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e){
            echo "Erreur lors de la récupération du ticket : " . $e->getMessage();
            exit;
        }

    }















?>