<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
checkLogin();

$callTickets = selectAllTickets();

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
                <p>120</p>
            </div>

            <div class="card">
                <h3>En cours</h3>
                <p>35</p>
            </div>

            <div class="card">
                <h3>Résolus</h3>
                <p>60</p>
            </div>

            <div class="card">
                <h3>Critiques</h3>
                <p>10</p>
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
                        <td data-label="Priorité"><span class="badge high"><?= $ticket['name_priority'] ?></span></td>
                        <td data-label="Statut">
                            <span class="badge new"><?= $ticket['name_statut'] ?></span>
                        </td>
                        <td data-label="Assigné à"><?= $ticket['tech_name'] ?? '-' ?></td>
                        <form method="POST" action="detail_ticket.php">
                            <input type="hidden" name="id_ticket" value="<?= $ticket['id_ticket']; ?>">
                        <td data-label="Action"><button name="submit-ticket" class="btn">Voir</button></td>
                        </form>
                        <?php if($ticket['assigned_to'] === null): ?>
                            <td data-label="Action"><a href="assign_ticket.php?id=<?= $ticket['id_ticket'] ?>" class="btn">Assigner</a></td>
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