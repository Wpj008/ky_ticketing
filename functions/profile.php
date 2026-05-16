<?php
require_once "data.php";

function selectUser($id_user){

    try{

        $querySelect = getPDO()->prepare("SELECT * FROM users INNER JOIN roles ON roles.id_role = users.role_id WHERE id_user = $id_user ");

        $querySelect->execute();

        $user = $querySelect->fetch();

        return $user;


    }catch(PDOException $e){

    echo "<p style='color:red;'> Erreur de recuperation </p>".$e->getMessage();

    }
}

    function updatePasseword($id_user, $confirm_password){

    $hashPassword = password_hash($confirm_password, PASSWORD_DEFAULT);

        try{

            $queryUpdate = getPDO()->prepare("UPDATE users SET password_user = :password_3 WHERE id_user = :id_user  ");

            $queryUpdate->bindParam(':password_3', $hashPassword);
            $queryUpdate->bindParam(':id_user', $id_user);

            $queryUpdate->execute();

        }catch(PDOException $e){

        echo "<p style='color:red;'> Erreur lors de la modification du mot de passe </p>" .$e->getMessage();
        }


    }













?>