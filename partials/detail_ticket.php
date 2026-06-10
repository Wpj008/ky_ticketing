<?php
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
require_once "../functions/messages.php";

checkLogin();


$ticket = $_POST['id_ticket'];

    $callOnlyTicket = selectOnlyTicket($ticket);
    $callMessage = selectMessage($ticket);

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
                    <span class="status-<?= $callOnlyTicket['statut_id'] ?>"><?= $callOnlyTicket['name_statut'] ?></span>
                </div>

                <div><strong>Priorité :</strong> 
                    <span class="priority-<?= $callOnlyTicket['priority_id'] ?>"><?= $callOnlyTicket['name_priority'] ?></span>
                </div>

                <div><strong>Date :</strong> <?= $callOnlyTicket['created_at_ticket'] ?></div>

                <div><strong>Utilisateur :</strong> <?= $callOnlyTicket['creator_name'] ?></div>
                <div><strong>Technicien :</strong> <?= $callOnlyTicket['tech_name'] ?></div>
                <br><br><br>
                <div>
                 <?php if($_SESSION['role_id'] != 1 && $callOnlyTicket['assigned_to'] == $_SESSION['user_id']):  ?>
                <a class="btn" href="update_statut_or_priority.php?id_ticket=<?= $ticket ?>">Modifier le statut ou la priorité</a>
           <?php
          endif;
            if($_SESSION['role_id'] == 3): ?>
            <a class="btn" href="update_statut_or_priority.php?id_ticket=<?= $ticket ?>">Modifier le statut ou la priorité</a>
          <?php endif ?>
            </div>

            </div>
        </section>
            <br><br><br><br><br>
        <!-- CONVERSATION -->
        <section class="table-section">
            <h2>Conversation</h2>

            <div class="messages">

            <?php foreach ($callMessage as $message): ?>

            <?php 
                  if($message['id_user'] == $_SESSION['user_id']):

        
                     $class = 'tech'; // gauche 

                         else: 

                          $class = 'user'; // droite
                    endif;
                ?>

            <div class="message <?= $class ?>">
                 <div class="message-header">
                    <span><?= ($message['name_user']) ?></span>
                    <span class="date">
                        <?= date('d/m/Y H:i', strtotime($message['created_at_message'])) ?>
                      </span>
            </div>

                 <p><?= nl2br($message['content_message']) ?></p>
                </div>

        <?php endforeach; ?>

        </div>
            <!-- FORM MESSAGE -->
         <?php if($callOnlyTicket['name_statut'] == "Fermé" ): 
                
                echo "<P style='color: red;'> La discussion a été cloturéé ! </p>";
             else:
                ?>
            <form class="message-form" method="POST" action="../traitements/traitement_message.php">
                    <input type="hidden" name="id_ticket" value="<?= $ticket; ?>">
                    <textarea name="message" placeholder="Écrire un message..." required></textarea>
                    <button class="btn" name="submit">Envoyer</button>
            </form>

        <?php endif; ?>

        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>