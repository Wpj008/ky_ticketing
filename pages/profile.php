<?php
session_start();
require_once "../functions/users.php";
require_once "../functions/profile.php";

if(isset($_GET['id'])) {
    $id_user = $_GET['id'];
} else {
    $id_user = $_SESSION['user_id'];
}


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

            <form method="POST" action="../traitements/traitement_update_or_delete_user.php">

                <!-- Nom -->
                <div class="form-group">

                    <input type="hidden" name="id_user" value="<?= $selectuser['id_user'] ?>">
                    <label>Nom</label>
                    <input id="inputName" name="name_user" type="text" value="<?= $selectuser['name_user'] ?>" disabled>
                    <input type="hidden" name="name_user_hidden" value="<?= $selectuser['name_user'] ?>">
                </div>

                <!-- Email (non modifiable) -->
                <div class="form-group">
                    <label>Email</label>
                    <input id="inputEmail" name="email_user" type="email" value="<?= $selectuser['email_user'] ?>" disabled>
                    <input type="hidden" name="email_user_hidden" value="<?= $selectuser['email_user'] ?>">
                </div>

                <!-- Rôle -->
                <div class="form-group">
                    <label>Rôle</label>
                    <input id="inputRule" type="text" value="<?= $selectuser['name_role'] ?>" disabled>
                </div>

                <br><br>

                <button class="btn-warning" onclick="ActivateButton()" id="btnActivate">Activer Modifications</button>
                <button class="btn-warning" onclick="DesactivateButton()" id="btnDesactivate" disabled="disabled">Désactiver Modifications</button>
               
               

                <button name="submitUpdate" class="btn-safe" id="btnValidate" disabled="disabled">Valider Modifications</button>
                <button name="submitDelete" class="btn-danger" id="btnDelete" disabled="disabled">Supprimer Compte</button>


                </form>

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