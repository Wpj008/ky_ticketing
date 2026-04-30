<?php

require_once "../functions/users.php";

$callRole = SelectAllRoles();

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

    <h1>Inscription</h1>

    <form action="../traitements/traitement_register.php" method="POST">

        <label for="name">Nom:</label>
        <input type="text" id="name" name="name"  >
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  >
        <br>
        <label for="password">Mot de Passe:</label>
        <input type="password" id="password" name="password"  >
        <br>
        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="">Sélectionnez un rôle</option>
            <?php foreach($callRole as $role): ?>

            <option value="<?= $role['id_role'] ?>"><?= $role['name_role'] ?></option>   
        <?php endforeach; ?>
        </select>
        <br>
        <button type="submit" name="submit">Inscription</button>
    </form> 
    
</body>
</html>