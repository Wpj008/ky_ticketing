<?php
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
checkLogin();

$id_user = $_POST['id_user'];
$callTicket = getTicketByTech($id_user);
$user = getOnlyUSer($id_user);




?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail utilisateur</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
    <link rel="stylesheet" href="../assets/css/detail_user.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- HEADER USER -->
        <section class="user-header">
            <div class="user-avatar">
                T
            </div>

            <div class="user-details">

                <h2><?= $user['name_user'] ?></h2>
            
                <p><?= $user['email_user'] ?></p>
                <span class="role"><?= $user['name_role'] ?></span>

            </div>
        </section>

        <!-- STATS -->
        <section class="stats">
            <div class="card">
                <h3>Tickets créés</h3>
                <p>12</p>
            </div>

            <div class="card">
                <h3>Tickets assignés</h3>
                <p>5</p>
            </div>
        </section>

        <!-- LISTE TICKETS -->
        <section class="tickets-section">
            <h2>Tickets</h2>

            <div class="tickets-grid">

                <!-- TICKET CARD -->

                <?php foreach($callTicket as $ticket): ?>
                <div class="ticket-card">

                    <div class="ticket-header">
                        <h3><?= $ticket['title_ticket'] ?></h3>
                        <span class="status-<?= $ticket['statut_id'] ?>"><?= $ticket['name_statut'] ?></span>
                    </div>

                    <p class="ticket-desc">
                       <?= $ticket['description_ticket'] ?>
                    </p>

                    <div class="ticket-meta">
                        <span class="priority-<?= $ticket['priority_id'] ?>"><?= $ticket['name_priority'] ?></span>
                        <span>créé : <?= $ticket['created_at_ticket'] ?></span>
                    </div>

                    <form method="POST" action="detail_ticket.php">
                        <input type="hidden" name="id_ticket" value="1">
                        <button class="btn">Voir détail</button>
                    </form>

                </div>

                <?php endforeach ?>

             
            </div>
        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>