<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
checkLogin();

$ticket = $_SESSION['id_ticket'];

$callAllStatuts = selectAllStatuts();
$callAllPriorities = selectAllPriorities();

    $callOnlyTicket = selectOnlyTicket($ticket);

   
    $_SESSION['id_priority_ticket'] = $callOnlyTicket['priority_id'];
    $_SESSION['id_statut_ticket'] = $callOnlyTicket['statut_id'];
   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Ticket</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
    <link rel="stylesheet" href="../assets/css/update_statut_or_priority.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- INFOS -->
        <section class="table-section">
            <h2>Modifier le ticket <?= $callOnlyTicket['id_ticket'] ?></h2>

           

            <form class="ticket-info" method="POST" action="../traitements/traitement_update_statut_or_priority.php">

                <div><strong>Titre :</strong> <?= $callOnlyTicket['title_ticket'] ?></div>
                <div><strong>Description :</strong> <?= $callOnlyTicket['description_ticket'] ?></div>

                <!-- STATUT -->
                <div class="update-row">
                    <label><strong>Statut : </strong></label>
                    <label class="">Statut actuel</label>
                    <input type="text" value="<?= $callOnlyTicket['name_statut'] ?>" disabled>

                    <label class="">Modifier statut</label>
                    <select name="id_statut" >
                            <option value="">-- Modifier le statut --</option>
                            <?php foreach ($callAllStatuts as $statut): ?>
                                <option value="<?= $statut['id_statut'] ?>"><?= $statut['name_statut'] ?></option>
                            <?php
                           //  $_SESSION['id_statut_ticket'] = $statut['id_statut'];
                        
                        endforeach; ?>
                        </select>
                </div>

                <!-- PRIORITÉ -->
                <div class="update-row">
                    <label><strong>Priorité :</strong></label>

                    <label class="">Priorité actuelle</label>
                    <input type="text" value="<?= $callOnlyTicket['name_priority'] ?>" disabled>

                    <label class="">Modifier priorité</label>
                    <select name="id_priority" >
                            <option value="">-- Modifier la priorité --</option>
                            <?php foreach ($callAllPriorities as $priority): ?>
                                <option value="<?= $priority['id_priority'] ?>"><?= $priority['name_priority'] ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>         

                <div><strong>Date création :</strong> <?= $callOnlyTicket['created_at_ticket'] ?></div>
                <div><strong>Dernière mise à jour :</strong> <?= $callOnlyTicket['updated_at_ticket'] ?></div>

                <div><strong>Utilisateur :</strong> <?= $callOnlyTicket['creator_name'] ?></div>
                <div><strong>Technicien :</strong> <?= $callOnlyTicket['tech_name'] ?></div>

                <!-- ACTION -->
                <div class="form-actions">
                    <button class="btn" name="submit">Enregistrer</button>
                </div>

            </form>
        </section>

   
    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>