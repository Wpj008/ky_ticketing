<?php
session_start();
require_once "../functions/users.php";
require_once "../functions/profile.php";

$id_user = $_SESSION['user_id'];

$selectuser = selectUser($id_user);
 
checkLogin();


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <section class="table-section">
            <h2>Mon Profil</h2>

            <div class="profile-form">

                <!-- Nom -->
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="<?= $selectuser['name_user'] ?>" disabled>
                </div>

                <!-- Email (non modifiable) -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="<?= $selectuser['email_user'] ?>" disabled>
                </div>

                <!-- Rôle -->
                <div class="form-group">
                    <label>Rôle</label>
                    <input type="text" value="<?= $selectuser['name_role'] ?>" disabled>
                </div>
            </div>



</section>

<br><br><br>

                <section class="table-section">

                <h2>Changement de Mot de Passe</h2>

                <form class="profile-form" method="POST" action="../traitements/traitement_password.php" onsubmit="return verificationPassword();">
                <!-- Mot de passe -->

                <div class="form-group">
                    <label>Nouveau mot de passe</label>
                    <input name="new_password" type="password" placeholder="Laisser vide si inchangé">
                </div>

                <!-- Confirmation -->
                <div class="form-group">
                    <label>Confirmer mot de passe</label>
                    <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirmer le mot de passe">
                    <div id="passwordEror" class="error-message" style="color : red;"></div>
                </div>

                <!-- Action -->
                <div class="form-actions">
                    <button name="submit" class="btn">Mettre à jour</button>
                </div>

            </form>
        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>

<script src="../assets/js/verification.js"></script>

</body>
</html>