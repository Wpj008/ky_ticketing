<?php 
require_once "data.php";

function TOLTALusers(){

    try{

        $query = getPDO()->prepare("SELECT COUNT(*) AS total_users FROM users");
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
}

}


function countTechs(){

    try{

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_techs FROM users WHERE role_id = 2");
    $query->execute();

    return $query->fetch();

    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
    }
}

function countAdmin(){

    try{

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_admin FROM users WHERE role_id = 3");
    $query->execute();

    return $query->fetch();

    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
    }
}

function countUser(){

    try{

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_user FROM users WHERE role_id = 1");
    $query->execute();

    return $query->fetch();

    }catch(PDOException $e){

    echo"ERROORR".$e->getMessage();
    }
}


function countTickets(){

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_tickets FROM tickets");
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}



function countCriticalTickets(){

    $query = getPDO()->prepare(" SELECT COUNT(*) AS total_critical FROM tickets WHERE priority_id = 4");

    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}


function countNewTickets(){

    $query = getPDO()->prepare(" SELECT COUNT(*) AS total_new FROM tickets WHERE statut_id = 1");

    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}

function countNotResoluTickets(){

    $query = getPDO()->prepare(" SELECT COUNT(*) AS total_not_resolu FROM tickets WHERE statut_id < 5 ");

    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}


function countAssignedTickets(){

    $query = getPDO()->prepare("SELECT COUNT(*) AS total_assigned FROM tickets WHERE assigned_to IS NULL");

    $query->execute();

    return $query->fetch();
}










?>