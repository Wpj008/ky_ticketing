<?php
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
checkLogin();

$callTickets = selectAllTickets();

$ticket = $_SESSION['id_ticket'];

    $callOnlyTicket = selectOnlyTicket($ticket);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Ticket</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
    <link rel="stylesheet" href="../assets/css/detail_ticket.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

   
        <!-- INFOS TICKET -->
        <section class="table-section">
            <h2>Détail du ticket N° <?= $ticket ?></h2>

            <div class="ticket-info">

                <div><strong>Titre :</strong> <?= $callOnlyTicket['title_ticket'] ?></div>
                <div><strong>Description :</strong> <?= $callOnlyTicket['description_ticket'] ?></div>

                <div><strong>Statut :</strong> 
                    <span class="badge progress"><?= $callOnlyTicket['name_statut'] ?></span>
                </div>

                <div><strong>Priorité :</strong> 
                    <span class="badge high"><?= $callOnlyTicket['name_priority'] ?></span>
                </div>

                <div><strong>Date :</strong> <?= $callOnlyTicket['created_at_ticket'] ?></div>

                <div><strong>Utilisateur :</strong> <?= $callOnlyTicket['name_user'] ?> (<?= $callOnlyTicket['email_user'] ?>)</div>
                <div><strong>Technicien :</strong> Paul Dupont</div>

            </div>
        </section>
            <br><br><br><br><br>
        <!-- CONVERSATION -->
        <section class="table-section">
            <h2>Conversation</h2>

            <div class="messages">

                <!-- Message utilisateur -->
                <div class="message user">
                    <div class="message-header">
                        <span>Richard</span>
                        <span class="date">01/04/2026 10:00</span>
                    </div>
                    <p>Bonjour, je n'arrive plus à me connecter.</p>
                </div>

                <!-- Message technicien -->
                <div class="message tech">
                    <div class="message-header">
                        <span>Paul</span>
                        <span class="date">01/04/2026 10:15</span>
                    </div>
                    <p>Bonjour, nous regardons le problème.</p>
                </div>

            </div>

            <!-- FORM MESSAGE -->
            <form class="message-form">
                <textarea placeholder="Écrire un message..." required></textarea>
                <button class="btn">Envoyer</button>
            </form>

        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>