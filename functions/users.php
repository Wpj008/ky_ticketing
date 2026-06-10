<?php
require_once "data.php";

function registerUser($name, $email, $password, $role) {// function pour enregistrer un nouvel utilisateur (insertion dans la table users)

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = getPDO();


    try {// On essaye d'exécuter la requête d'insertion dans la base de données, et on attrape les erreurs éventuelles avec le catch


        $queryRegister = $data->prepare("INSERT INTO users (name_user, email_user, password_user, role_id) VALUES (:name, :email, :password, :role)");

        $queryRegister->bindParam(':name', $name);
        $queryRegister->bindParam(':email', $email);
        $queryRegister->bindParam(':password', $hashedPassword);
        $queryRegister->bindParam(':role', $role);

        $queryRegister->execute();

        echo "<p style='color:green;'> Inscription réussie ! </p>";
        
        header("Location: ../pages/dashboard.php");
        exit;
        
    } catch (PDOException $e) {
        echo "<p style='color:red;'> Erreur lors de l'inscription : </p>" . $e->getMessage();
        exit;
    }
}



function loginUser($email, $password){// function pour connecter un utilisateur (vérification de l'email et du mot de passe, et création de la session)

$data = getPDO();

    try{
       
        $queryLogin = $data->prepare("SELECT * FROM users WHERE email_user = :email ");

        $queryLogin->bindParam(':email', $email);
        $queryLogin->execute();

        $results = $queryLogin->fetch(PDO::FETCH_ASSOC);


        if($results && password_verify($password, $results['password_user'])){

            session_start();
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $results['id_user'];
            $_SESSION['name_user'] = $results['name_user'];
            $_SESSION['email_user'] = $results['email_user'];
            $_SESSION['role_id'] = $results['role_id'];

        if($results['isActif'] == 0){
            echo "<p style='color:red;'> Votre compte a été supprimé. Veuillez contacter l'administrateur. </p>";
            session_destroy();
            exit;

        }else{
            header("Location: ../pages/dashboard.php");
            exit;
     
        }

        } else {
            echo "<p style='color:red;'> Email ou mot de passe incorrect. </p>";
        }

    } catch (PDOException $e) {
        echo "<p style='color:red;'> Erreur de connexion à la base de données : </p>" . $e->getMessage();
        exit;
    }
}


function SelectAllRoles(){// function pour récupérer tous les rôles (pour le dropdown de création de compte dans le dashboard)

    $data = getPDO();

    try {

        $queryRole = $data->prepare("SELECT * FROM roles");
        $queryRole->execute();

        $roles =  $queryRole->fetchAll(PDO::FETCH_ASSOC);

        return $roles;

    } catch (PDOException $e) {
        echo "<p style='color:red;'> Erreur lors de la récupération des rôles : </p>" . $e->getMessage();
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

function getUser(){// function pour récupérer tous les utilisateurs (pour l'affichage dans le dashboard)

    try{

    $queryUser = getPDO()->prepare("SELECT* FROM users WHERE role_id = 1");
    $queryUser->execute();

    $users = $queryUser->fetchAll(PDO::FETCH_ASSOC);

    return $users;

    }catch(PDOException $e){

    echo "<p style='color:red;'> Erreur lors de la récupération de l'utilisateur : </p>" . $e->getMessage();
        exit;
    }

}

    function getTech(){// function pour récupérer tous les techniciens (pour l'affichage dans le dashboard et pour l'assignation de ticket)
        
        try{

            $queryTech = getPDO()->prepare("SELECT* FROM users WHERE role_id = 2");
            $queryTech->execute();
    
            $techs = $queryTech->fetchAll(PDO::FETCH_ASSOC);
    
            return $techs;
    
            }catch(PDOException $e){
    
            echo "<p style='color:red;'> Erreur lors de la récupération des techniciens : </p>" . $e->getMessage();
                exit;
    }

}

function getOnlyUSer($id_user){// function pour récupérer un seul utilisateur (pour l'affichage dans la page de profil et pour la modification du profil)

    try{

        $queryOnlyUser = getPDO()->prepare("SELECT * FROM users INNER JOIN roles ON roles.id_role = users.role_id WHERE id_user = :user_id ");

       $queryOnlyUser->bindParam(":user_id", $id_user);
       $queryOnlyUser->execute();

       $result = $queryOnlyUser->fetch();

       return $result;
    }catch(PDOException $e){
    
         echo "<p style='color:red;'> Erreur lors de la récupération des techniciens : </p>" . $e->getMessage();
        exit;
    }


}

function updateName($id_user, $name){// function pour modifier le nom d'un utilisateur (update dans la table users)

    try{

        $queryUpdate = getPDO()->prepare("UPDATE users SET name_user = :name WHERE id_user = :user_id");

        $queryUpdate->bindParam(':name', $name);
        $queryUpdate->bindParam(':user_id', $id_user);

        $queryUpdate->execute();

        echo "<p style='color:green;'> Nom mis à jour avec succès ! </p>";

    }catch(PDOException $e){

        echo "<p style='color:red;'> Erreur lors de la mise à jour du nom : </p>" . $e->getMessage();
        exit;

    }


}


function updateEmail($id_user, $email){// function pour modifier l'email d'un utilisateur (update dans la table users)

    try{

        $queryUpdate = getPDO()->prepare("UPDATE users SET email_user = :email WHERE id_user = :user_id");

        $queryUpdate->bindParam(':email', $email);
        $queryUpdate->bindParam(':user_id', $id_user);

        $queryUpdate->execute();

        echo "<p style='color:green;'> Email mis à jour avec succès ! </p>";

    }catch(PDOException $e){

        echo "<p style='color:red;'> Erreur lors de la mise à jour de l'email : </p>" . $e->getMessage();
        exit;

    }


}

function deleteUser($id_user){// function pour supprimer un utilisateur (update dans la table users)


    try{

    $queryDelete = getPDO()->prepare("UPDATE users SET isActif = 0 WHERE id_user = :user_id");

    $queryDelete->bindParam(':user_id', $id_user);
    $queryDelete->execute();

        echo "<p style='color:green;'> Compte supprimé avec succès ! </p>";
    
       header("Location: ../pages/dashboard.php");
       exit;


    }catch(PDOException $e){

        echo "<p style='color:red;'> Erreur lors de la suppression du compte : </p>" . $e->getMessage();
        exit;

    }


}




?>