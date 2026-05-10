<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
checkLogin();

$ticket = $_SESSION['id_ticket'];

    $callOnlyTicket = selectOnlyTicket($ticket);

$callAllTech = getTech();
?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Ticket (Admin)</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
    <link rel="stylesheet" href="../assets/css/assign_ticket.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- INFOS TICKET -->
        <section class="table-section">
            <h2>Détail du ticket #<?= $ticket ?></h2>

            <form class="ticket-info" method="POST" action="../traitements/traitement_assign_ticket.php">

                <div><strong>Titre :</strong> <?= $callOnlyTicket['title_ticket'] ?></div>
                <div><strong>Description :</strong> <?= $callOnlyTicket['description_ticket'] ?></div>

                <div>
                    <strong>Statut :</strong>
                    <span class="badge progress"><?= $callOnlyTicket['name_statut'] ?></span>
                </div>

                <div>
                    <strong>Priorité :</strong>
                    <span class="badge high"><?= $callOnlyTicket['name_priority'] ?></span>
                </div>

                <div><strong>Date création :</strong> <?= $callOnlyTicket['created_at_ticket'] ?></div>
                <div><strong>Dernière mise à jour :</strong> <?= $callOnlyTicket['updated_at_ticket'] ?></div>

                <div>
                    <strong>Utilisateur :</strong>
                    <?= $callOnlyTicket['creator_name'] ?>  </div>

                <!-- ASSIGNATION TECHNICIEN -->
                <div class="assign-row">
                    <label><strong>Technicien assigné :</strong></label>

                    <div class="assign-controls">
                        <select name="id_tech" required>
                            <option value="">-- Choisir un technicien --</option>
                            <?php foreach ($callAllTech as $tech): ?>
                                <option value="<?= $tech['id_user'] ?>"><?= $tech['name_user'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button name="submit" class="btn">Enregistrer</button>
                    </div>
                </div>

            </form>
        </section>

       
    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>