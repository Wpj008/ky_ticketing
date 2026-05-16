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
        echo "<p style='color:green;'> Ticket créé avec succès ! </p>";

        header("Location: ../pages/dashboard.php");
        exit;

    }catch(PDOException $e){

    echo "<p style='color:red;'> Erreur lors de la création du ticket : </p>" . $e->getMessage();
        exit;
    }


}

function selectAllTickets(){

    try{

   // $queryGetTickets = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user");


   $queryGetTickets = getPDO()->prepare("SELECT tickets.*, priorities.name_priority, statuts.name_statut, creator.name_user AS creator_name, tech.name_user AS tech_name FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts  ON tickets.statut_id = statuts.id_statut INNER JOIN users creator ON tickets.user_id = creator.id_user LEFT JOIN users tech ON tickets.assigned_to = tech.id_user");

    $queryGetTickets->execute();

    $results = $queryGetTickets->fetchAll(PDO::FETCH_ASSOC);

    return $results;

    } catch(PDOException $e){
        echo "<p style='color:red;'> Erreur lors de la récupération des tickets : </p>" . $e->getMessage();
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
        echo "<p style='color:red;'> Erreur lors de la récupération des priorités : </p>" . $e->getMessage();
        exit;
    }

}

function selectAllStatuts(){

    try{

        $queryStatut = getPDO()->prepare("SELECT * FROM statuts");

        $queryStatut->execute();

        $results = $queryStatut->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }catch(PDOException $e){
        echo "<p style='color:red;'> Erreur lors de la récupération des statuts : </p>" . $e->getMessage();
        exit;
    }

}



    function selectOnlyTicket($id_ticket){

        try{

            //$queryOnlyTicket = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user WHERE id_ticket = :id_ticket");


             $queryOnlyTicket = getPDO()->prepare("SELECT tickets.*,  priorities.name_priority, statuts.name_statut, creator.name_user AS creator_name, tech.name_user AS tech_name FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts ON tickets.statut_id = statuts.id_statut INNER JOIN users creator ON tickets.user_id = creator.id_user LEFT JOIN users tech ON tickets.assigned_to = tech.id_user WHERE id_ticket = :id_ticket");

            $queryOnlyTicket->bindParam(':id_ticket', $id_ticket);
            $queryOnlyTicket->execute();

            $result = $queryOnlyTicket->fetch(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e){
            echo "<p style='color:red;'> Erreur lors de la récupération du ticket : </p>" . $e->getMessage();
            exit;
        }

    }

    function assignTechToTicket($id_ticket, $id_tech){

        try{

            $queryAssignTech = getPDO()->prepare("UPDATE tickets SET assigned_to = :id_tech WHERE id_ticket = :id_ticket");

            $queryAssignTech->bindParam(':id_tech', $id_tech);
            $queryAssignTech->bindParam(':id_ticket', $id_ticket);

            $queryAssignTech->execute();

            echo "<p style='color:green;'> Technicien assigné avec succès ! </p>";

            header("Location: ../pages/dashboard.php");
            exit;

        }catch(PDOException $e){
            echo "<p style='color:red;'> Erreur lors de l'assignation du technicien : </p>" . $e->getMessage();

        }

    }

    function updateStatut($id_ticket, $id_statut){

        try{

        
            $queryUpdateStatut = getPDO()->prepare("UPDATE tickets SET statut_id = :id_statut WHERE id_ticket = :id_ticket");

            $queryUpdateStatut->bindParam(':id_statut', $id_statut);
            $queryUpdateStatut->bindParam(':id_ticket', $id_ticket);

            $queryUpdateStatut->execute();

            echo "<p style='color:green;'> Statut mis à jour avec succès ! </p>";

            header("Location: ../pages/dashboard.php");
            exit;

        }catch(PDOException $e){
            echo "<p style='color:red;'> Erreur lors de la mise à jour du statut : </p>" . $e->getMessage();
            exit;
        }

    }

    function updatePriority($id_ticket, $id_priority){

        try{

            $queryUpdatePriority = getPDO()->prepare("UPDATE tickets SET priority_id = :id_priority WHERE id_ticket = :id_ticket");

            $queryUpdatePriority->bindParam(':id_priority', $id_priority);
            $queryUpdatePriority->bindParam(':id_ticket', $id_ticket);

            $queryUpdatePriority->execute();

            echo "<p style='color:green;'> Priorité mise à jour avec succès ! </p>";
            header("Location: ../pages/dashboard.php");
            exit;

        }catch(PDOException $e){
            echo "<p style='color:red;'> Erreur lors de la mise à jour de la priorité : </p>" . $e->getMessage();
            exit;
        }

    }






?>