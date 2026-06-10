<?php 
require_once "data.php";

function createTicket($title, $description, $priority){// function pour créer un ticket (insertion dans la table tickets)

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

function selectAllTickets(){// function pour récupérer tous les tickets avec une jointure pour afficher les détails (priorité, statut, créateur, technicien assigné)

    try{

   // $queryGetTickets = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user");


   $queryGetTickets = getPDO()->prepare("SELECT tickets.*, priorities.name_priority, statuts.name_statut, creator.name_user AS creator_name, tech.name_user AS tech_name, creator.isActif FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts  ON tickets.statut_id = statuts.id_statut INNER JOIN users creator ON tickets.user_id = creator.id_user LEFT JOIN users tech ON tickets.assigned_to = tech.id_user WHERE creator.isActif = 1");

    $queryGetTickets->execute();

    $results = $queryGetTickets->fetchAll(PDO::FETCH_ASSOC);

    return $results;
 
    } catch(PDOException $e){
        echo "<p style='color:red;'> Erreur lors de la récupération des tickets : </p>" . $e->getMessage();
        exit;
    }



}


function selectAllPriorities(){// function pour récupérer toutes les priorités (pour le dropdown de création de ticket et de modification de la priorité dans le dashboard)

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

function selectAllStatuts(){// function pour récupérer tous les statuts (pour le dropdown de modification du statut dans le dashboard)

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



    function selectOnlyTicket($id_ticket){// function pour récupérer un seul ticket avec tous les détails (priorité, statut, créateur, technicien assigné)

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

    function getTicketByUser($id_user){// function pour récupérer tous les tickets d'un utilisateur avec une jointure pour afficher les détails (priorité, statut, créateur, technicien assigné)

    try{

        //$queryOnlyTicket = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user WHERE id_ticket = :id_ticket");


         $queryOnlyTicket = getPDO()->prepare("SELECT tickets.*,  priorities.name_priority, statuts.name_statut, creator.name_user AS creator_name, tech.name_user AS tech_name, creator.email_user AS creator_email, tech.email_user AS tech_email FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts ON tickets.statut_id = statuts.id_statut INNER JOIN users creator ON tickets.user_id = creator.id_user LEFT JOIN users tech ON tickets.assigned_to = tech.id_user WHERE user_id = :id_user");

        $queryOnlyTicket->bindParam(':id_user', $id_user);
        $queryOnlyTicket->execute();

        $result = $queryOnlyTicket->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }catch(PDOException $e){
        echo "<p style='color:red;'> Erreur lors de la récupération des tickets de l'utilisateur : </p>" . $e->getMessage();
        exit;
    }

}


function getTicketByTech($id_user){// function pour récupérer tous les tickets assignés à un technicien avec une jointure pour afficher les détails (priorité, statut, créateur, technicien assigné)

try{

    //$queryOnlyTicket = getPDO()->prepare("SELECT * FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts On tickets.statut_id = statuts.id_statut INNER JOIN users ON tickets.user_id = users.id_user WHERE id_ticket = :id_ticket");


     $queryOnlyTicket = getPDO()->prepare("SELECT tickets.*,  priorities.name_priority, statuts.name_statut, creator.name_user AS creator_name, tech.name_user AS tech_name, creator.email_user AS creator_email, tech.email_user AS tech_email FROM tickets INNER JOIN priorities ON tickets.priority_id = priorities.id_priority INNER JOIN statuts ON tickets.statut_id = statuts.id_statut INNER JOIN users creator ON tickets.user_id = creator.id_user LEFT JOIN users tech ON tickets.assigned_to = tech.id_user WHERE assigned_to = :id_user");

    $queryOnlyTicket->bindParam(':id_user', $id_user);
    $queryOnlyTicket->execute();

    $result = $queryOnlyTicket->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}catch(PDOException $e){
    echo "<p style='color:red;'> Erreur lors de la récupération des tickets du technicien : </p>" . $e->getMessage();
    exit;
}

}

    function assignTechToTicket($id_ticket, $id_tech){// function pour assigner un technicien à un ticket (mise à jour de la colonne assigned_to dans la table tickets)

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

    function updateStatut($id_ticket, $id_statut){// function pour mettre à jour le statut d'un ticket (mise à jour de la colonne statut_id dans la table tickets)

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

    function updatePriority($id_ticket, $id_priority){// function pour mettre à jour la priorité d'un ticket (mise à jour de la colonne priority_id dans la table tickets)

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