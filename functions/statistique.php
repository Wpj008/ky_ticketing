<?php 
require_once "data.php";

function TOLTALusers(){// function pour compter le nombre total d'utilisateurs (pour l'affichage dans le dashboard)

    try{

        $query = getPDO()->prepare("SELECT COUNT(*) AS total_users FROM users");
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
}

}


function countTechs(){// function pour compter le nombre total de techniciens (pour l'affichage dans le dashboard)

    try{

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_techs FROM users WHERE role_id = 2");
    $query->execute();

    return $query->fetch();

    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
    }
}

function countAdmin(){// function pour compter le nombre total d'administrateurs (pour l'affichage dans le dashboard)

    try{

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_admin FROM users WHERE role_id = 3");
    $query->execute();

    return $query->fetch();

    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
    }
}

function countUser(){// function pour compter le nombre total d'utilisateurs (pour l'affichage dans le dashboard)

    try{

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_user FROM users WHERE role_id = 1");
    $query->execute();

    return $query->fetch();

    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
    }
}


function countTickets(){// function pour compter le nombre total de tickets (pour l'affichage dans le dashboard)

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_tickets FROM tickets");
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}



function countCriticalTickets(){// function pour compter le nombre total de tickets critiques (pour l'affichage dans le dashboard)

    $query = getPDO()->prepare(" SELECT COUNT(*) AS total_critical FROM tickets WHERE priority_id = 4");

    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}


function countNewTickets(){// function pour compter le nombre total de tickets nouveaux (pour l'affichage dans le dashboard)

    $query = getPDO()->prepare(" SELECT COUNT(*) AS total_new FROM tickets WHERE statut_id = 1");

    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}

function countNotResoluTickets(){// function pour compter le nombre total de tickets non résolus (pour l'affichage dans le dashboard)

    $query = getPDO()->prepare(" SELECT COUNT(*) AS total_not_resolu FROM tickets WHERE statut_id < 5 ");

    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}


function countAssignedTickets(){// function pour compter le nombre total de tickets assignés (pour l'affichage dans le dashboard)

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_assigned FROM tickets WHERE assigned_to IS NULL");

    $query->execute();

    return $query->fetch();
}


?>