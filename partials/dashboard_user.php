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
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../assets/css/dashboard_user.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">
        <section class="actions">
            <a href="../pages/createTicket.php" class="btn">+ Créer un ticket</a>
        </section>

        <section class="table-section">
            <h2>Liste de mes tickets</h2>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sujet</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Assigné à</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 

                    $i = 0;
                    
                    foreach ($callTickets as $ticket):

                        $i++;

                        $_SESSION['id_ticket'] = $ticket['id_ticket'];

                        ?>
                    <tr>
                        <td data-label="ID">#<?= $i ?></td>
                        <td data-label="Sujet"><?= $ticket['title_ticket']; ?></td>
                        <td data-label="Priorité"><span class="badge high"><?= $ticket['name_priority']; ?></span></td>
                        <td data-label="Statut"><span class="badge progress"><?= $ticket['name_statut']; ?></span></td>
                        <td data-label="Assigné à"><?= $ticket['name_user']; ?></td>
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