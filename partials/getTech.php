<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/statistique.php";

checkLogin();

$callTech = getTech();
 $totalTechs = countTechs();
$total_ticket = countTickets();
$total_ticket_new = countNewTickets();
$total_ticket_critical = countCriticalTickets();

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techniciens</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- STATS TECHNICIENS -->
        <section class="stats">
            <div class="card">
                <h3>Total techniciens</h3>
                <p><?= $totalTechs['total_techs'] ?></p>
            </div>

            <div class="card">
                <h3>Total tickets</h3>
                <p><?= $total_ticket['total_tickets'] ?></p>
            </div>

            <div class="card">
                <h3>Tickets Nouveaux</h3>
                <p><?= $total_ticket_new['total_new'] ?></p>
            </div>

            <div class="card">
                <h3>Tickets critiques</h3>
                <p><?= $total_ticket_critical['total_critical'] ?></p>
            </div>
        </section>

        <section class="actions">
            <a href="../pages/register.php" class="btn">+ Ajouter un technicien</a>
        </section>

        <!-- TABLE TECHNICIENS -->
        <section class="table-section">
            <h2>Liste des techniciens</h2>

            <table>
                <thead>


                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date création</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php 
                $i = 0;
                foreach($callTech as $tech):
                    $i++;
                ?>

                    <tr>
                        <td data-label="ID"><?= $i ?></td>
                        <td data-label="Nom"><?= $tech['name_user'] ?></td>
                        <td data-label="Email"><?= $tech['email_user'] ?></td>
                        <td data-label="Critiques"><?= $tech['created_at_user'] ?></td>
                        <form method="POST" action="detail_tech.php">
                            <input type="hidden" name="id_user" value="<?= $tech['id_user']; ?>">
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