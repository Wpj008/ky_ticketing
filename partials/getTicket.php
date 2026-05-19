<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
require_once "../functions/statistique.php";
checkLogin();

$callTickets = selectAllTickets();
$callPriorities = selectAllPriorities();
$callStatuts = selectAllStatuts();

$total_ticket = countTickets();
$total_ticket_new = countNewTickets();
$total_ticket_Notresolu = countNotResoluTickets();


?>

 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- STATS -->
        <section class="stats">
            <div class="card">
                <h3>Total tickets</h3>
                <p><?= $total_ticket['total_tickets'] ?></p>
            </div>

            <div class="card">
                <h3>Nouveaux Tickets</h3>
                <p><?= $total_ticket_new['total_new'] ?></p>
            </div>

        
            <div class="card">
                <h3>Tickets non Résolus</h3>
                <p><?= $total_ticket_Notresolu['total_not_resolu'] ?></p>
            </div>
        </section>

        <!-- FILTRES -->
        <section class="filters">

        <select id="statusFilter">
    <option value="">Statut</option>
    <?php foreach($callStatuts as $statut): ?>
        <option value="<?= $statut['name_statut'] ?>">
            <?= $statut['name_statut'] ?>
         </option>
         <?php endforeach; ?>
    </select>


    <select id="priorityFilter">
         <option value="">Priorité</option>
            <?php foreach($callPriorities as $priority): ?>
        <option value="<?= $priority['name_priority'] ?>">
            <?= $priority['name_priority'] ?>
        </option>
        <?php endforeach; ?>
    </select>

    <select>
                <option>Assignation</option>
                <option>Tous</option>
                <option>Mes tickets</option>
                <option>Non assignés</option>
            </select>

        </section>

        <!-- TABLE -->
        <section class="table-section">
            <h2>Liste des tickets</h2>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Utilisateur</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Assigné à</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                  <?php 
                  $i = 0;
                  foreach($callTickets as $ticket):
                    $i++;
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
                        <td data-label="Action">
                     <form method="POST" action="detail_ticket.php">
                          <input type="hidden" name="id_ticket" value="<?= $ticket['id_ticket']; ?>">
                            <button type="submit" name="submit-ticket" class="btn">
                                 Voir
                             </button>
                         </form>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>
<script src="../assets/js/script.js"></script>

</body>
</html>