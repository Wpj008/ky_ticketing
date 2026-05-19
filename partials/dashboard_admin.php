<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
require_once "../functions/statistique.php";
checkLogin();

$callTickets = selectAllTickets();
$total_ticket_assign = countAssignedTickets();
$total_ticket = countTickets();
$total_ticket_new = countNewTickets();
$total_ticket_critical = countCriticalTickets();
$total_ticket_Notresolu = countNotResoluTickets();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
</head>
<body>

<!-- HEADER -->
<?php include '../partials/header.php'; ?>

<!-- SIDEBAR -->
<?php include '../partials/sidebar.php'; ?>

<!-- OVERLAY (mobile) -->
<div class="overlay" id="overlay"></div>

<!-- MAIN -->
<main class="main-content">
    <div class="content-wrapper">

        <!-- STATS -->
        <section class="stats">
            <div class="card">
                <h3>Total Tickets</h3>
                <p><?= $total_ticket['total_tickets'] ?></p>
            </div>

            <div class="card">
                <h3>Nouveau Ticket</h3>
                <p><?= $total_ticket_new['total_new'] ?></p>
            </div>

            <div class="card">
                <h3>Ticket non Assigné</h3>
                <p><?= $total_ticket_assign['total_assigned'] ?></p>
            </div>

            <div class="card">
                <h3>TIckets Critiques</h3>
                <p><?= $total_ticket_critical['total_critical'] ?></p>
            </div>

            <div class="card">
                <h3>TIckets Non résolu</h3>
                <p><?= $total_ticket_Notresolu['total_not_resolu'] ?></p>
            </div>
        </section>

        <!-- TABLE -->
        <section class="table-section">
            <h2>Liste des tickets</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Utilisateur</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Assigné à</th>
                        <th>Action</th>
                        <th>Assignation</th>
                    </tr>
                </thead>

                <tbody>
                
                <?php 
                  $i = 0;
                  foreach($callTickets as $ticket):
                    $i++;

                    $_SESSION['id_ticket'] = $ticket['id_ticket'];
                    ?>    
                    <tr>
                        <td data-label="ID"><?= $i ?></td>
                        <td data-label="Titre"><?= $ticket['title_ticket'] ?></td>
                        <td data-label="Utilisateur"><?= $ticket['creator_name'] ?></td>
                        <td data-label="Priorité"><span class="priority-<?= $ticket['priority_id'] ?>"><?= $ticket['name_priority'] ?></span></td>
                        <td data-label="Statut">
                            <span class="status-<?= $ticket['statut_id'] ?>"><?= $ticket['name_statut'] ?></span>
                        </td>
                        <td data-label="Assigné à"><?= $ticket['tech_name'] ?? '-' ?></td>
                        <form method="POST" action="detail_ticket.php">
                            <input type="hidden" name="id_ticket" value="<?= $ticket['id_ticket']; ?>">
                        <td data-label="Action"><button name="submit-ticket" class="btn">Voir</button></td>
                        </form>
                        <?php if($ticket['assigned_to'] === null): ?>
                            <form method="POST" action="assign_ticket.php">
                            <input type="hidden" name="id_ticket" value="<?= $ticket['id_ticket']; ?>">
                        <td data-label="Action"><button name="submit-ticket" class="btn">Assigner</button></td>
                        </form>
                        <?php endif; ?>
                        
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </section>

    </div>
</main>

<!-- JS -->
<script src="../assets/js/app.js"></script>

</body>
</html>