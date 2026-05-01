<?php
require_once "data.php";

function registerUser($name, $email, $password, $role) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = getPDO();


    try {


        $queryRegister = $data->prepare("INSERT INTO users (name_user, email_user, password_user, role_id) VALUES (:name, :email, :password, :role)");

        $queryRegister->bindParam(':name', $name);
        $queryRegister->bindParam(':email', $email);
        $queryRegister->bindParam(':password', $hashedPassword);
        $queryRegister->bindParam(':role', $role);

        $queryRegister->execute();

        echo "Inscription réussie !";
        header("Location: ../pages/dashboard.php");
        exit;
        
    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
        exit;
    }
}



function loginUser($email, $password){

$data = getPDO();

    try{
       
        $queryLogin = $data->prepare("SELECT * FROM users WHERE email_user = :email ");

        $queryLogin->bindParam(':email', $email);
        $queryLogin->execute();

        $results = $queryLogin->fetch(PDO::FETCH_ASSOC);

        var_dump($results);

        if($results && password_verify($password, $results['password_user'])){

            session_start();
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $results['id_user'];
            $_SESSION['name_user'] = $results['name_user'];
            $_SESSION['email_user'] = $results['email_user'];
            $_SESSION['role_id'] = $results['role_id'];


        header("Location: ../pages/dashboard.php");
        exit;

        } else {
            echo "Email ou mot de passe incorrect.";
        }

    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit;
    }
}


function SelectAllRoles(){

    $data = getPDO();

    try {

        $queryRole = $data->prepare("SELECT * FROM roles");
        $queryRole->execute();

        $roles =  $queryRole->fetchAll(PDO::FETCH_ASSOC);

        return $roles;

    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des rôles : " . $e->getMessage();
        exit;
    }
}

//function  de verification de la connexion user
function checkLogin(){
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: ../index.php');  // Rediriger vers la page de connexion
    exit;  // Arrêter l'exécution des scripts suivants
}
}

function getUser(){

    try{

    $queryUser = getPDO()->prepare("SELECT* FROM users WHERE role_id = 1");
    $queryUser->execute();

    $users = $queryUser->fetchAll(PDO::FETCH_ASSOC);

    return $users;

    }catch(PDOException $e){

        echo "Erreur lors de la récupération de l'utilisateur : " . $e->getMessage();
        exit;
    }

}

    function getTech(){
        
        try{

            $queryTech = getPDO()->prepare("SELECT* FROM users WHERE role_id = 2");
            $queryTech->execute();
    
            $techs = $queryTech->fetchAll(PDO::FETCH_ASSOC);
    
            return $techs;
    
            }catch(PDOException $e){
    
                echo "Erreur lors de la récupération des techniciens : " . $e->getMessage();
                exit;
    }

}


?>