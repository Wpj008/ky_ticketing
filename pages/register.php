<?php
session_start();

require_once "../functions/users.php";

$callRole = SelectAllRoles();

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>

<div class="login-container">
    <div class="login-card">

        <h1>Inscription</h1>

        <form action="../traitements/traitement_register.php" method="POST">

            <div class="input-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="input-group">
                <label for="password">Mot de Passe:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="input-group">
                <label for="role">Rôle:</label>
                <select id="role" name="role">
                    <option value="">Sélectionnez un rôle</option>

                    <?php foreach($callRole as $role): ?>
                        <option value="<?= $role['id_role'] ?>">
                            <?= $role['name_role'] ?>
                        </option>   
                    <?php endforeach; ?>

                </select>
            </div>

            <button type="submit" name="submit" class="btn-login">
                Inscription
            </button>

        </form> 
        
    </div>
</div>

</body>
</html>