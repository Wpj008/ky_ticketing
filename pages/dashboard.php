<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
    <h1>BONNJEJJEJEJEJEJ</h1>

    <?php

        echo $_SESSION['role_id'];
        echo $_SESSION['role_id'];
        if(isset($_SESSION['user_id'], $_SESSION['role_id'])){

            if($_SESSION['role_id'] == 1){
                header("Location: ../partials/dashboard_user.php");
                exit;

            } elseif($_SESSION['role_id'] == 2){
                header("Location: ../partials/dashboard_tech.php");
                exit;

            } else if($_SESSION['role_id'] == 3){
                header("Location: ../partials/dashboard_admin.php");
                exit;

            } else {
               header("Location: ../index.php");
               exit;
                
            }
        }
    
    
    
    ?>

    <a href="../pages/logout.php">Se déconnecter</a>

</body>
</html>