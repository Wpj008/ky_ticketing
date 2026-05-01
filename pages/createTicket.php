<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
checkLogin();

    $callPriorities = selectAllPriorities();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création un ticket</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
    <link rel="stylesheet" href="../assets/css/createTicket.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <section class="table-section">
            <h2>Créer un ticket</h2>

            <form class="ticket-form" method="POST" action="../traitements/traitement_ticket.php">

                <!-- Titre -->
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" name="title" placeholder="Ex : Problème de connexion" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="5" placeholder="Décrivez votre problème..." required></textarea>
                </div>

                <!-- Priorité -->
                <div class="form-group">
                    <label>Priorité</label>
                    <select name="priority" required>
                        <option value="">Choisir une priorité</option>
                        <?php foreach ($callPriorities as $priority): ?>

                            <option value="<?= $priority['id_priority'] ?>"><?= $priority['name_priority'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Boutons -->
                <div class="form-actions">
                    <button type="submit" name="submit" class="btn">Créer le ticket</button>
                    <input type="reset" class="btn cancel" value="Annuler"/>
                </div>

            </form>
        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>