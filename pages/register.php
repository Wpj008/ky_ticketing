<?php
session_start();
require_once "../functions/users.php";

checkLogin();

$callRole = SelectAllRoles();

?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/dashboard_user.css">
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <section class="login-container">
            <div class="login-card">

                <h1>Inscription</h1>

                <form action="../traitements/traitement_register.php" method="POST" onsubmit="return verificationPassword();">

                    <div class="input-group">
                        <label>Nom</label>
                        <input id="name" type="text" name="name" required>
                        <div id="nameError" class="error-message"></div>
                    </div>

                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="input-group">
                        <label>Mot de passe</label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="input-group">
                        <label>Rôle</label>
                        <select name="role" required>
                            <option value="">Sélectionnez</option>

                            <?php foreach($callRole as $role): ?>
                                <option value="<?= $role['id_role'] ?>">
                                    <?= $role['name_role'] ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn-login">
                        S'inscrire
                    </button>

                </form>

            </div>
        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>
</body>
</html>