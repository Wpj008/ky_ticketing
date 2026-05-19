<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/tickets.php";
require_once "../functions/tools.php";

checkLogin();

$id_user = $_SESSION['user_id'];

$callTickets = selectAllTickets();
$callPriorities = selectAllPriorities();
$callStatuts = selectAllStatuts();

$getTickets = getTicketByTech($id_user);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Technicien</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- FILTRES -->
        <section class="filters">
            <select>
                <option>Statut</option>
                <?php foreach($callStatuts as $statut): ?>
                    <option><?= $statut['name_statut'] ?></option>
                <?php endforeach; ?>
            </select>

            <select>
                <option>Priorité</option>
                <?php foreach($callPriorities as $priority): ?>
                    <option><?= $priority['name_priority'] ?></option>
                <?php endforeach; ?>
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
                  foreach($getTickets as $ticket):
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
                    </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </section>

    </div>
</main>


<script src="../assets/js/app.js"></script>

</body>
</html>