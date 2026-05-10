<?php 
session_start();
require_once "../functions/users.php";
checkLogin();

$callUser = getUser();





?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php include '../partials/sidebar.php'; ?>

<div class="overlay" id="overlay"></div>

<main class="main-content">
    <div class="content-wrapper">

        <!-- STATS UTILISATEURS -->
        <section class="stats">
            <div class="card">
                <h3>Total utilisateurs</h3>
                <p>25</p>
            </div>

            <div class="card">
                <h3>Utilisateurs</h3>
                <p>18</p>
            </div>

            <div class="card">
                <h3>Techniciens</h3>
                <p>5</p>
            </div>

            <div class="card">
                <h3>Administrateurs</h3>
                <p>2</p>
            </div>
        </section>

        <!-- ACTION -->
         <?php if($_SESSION['role_id'] == 3): ?>
        <section class="actions">
            <a href="../pages/register.php" class="btn">+ Ajouter un utilisateur</a>
        </section>
        <?php endif; ?>

        <!-- TABLE UTILISATEURS -->
        <section class="table-section">
            <h2>Liste des utilisateurs</h2>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Total Tickets</th>
                        <th>En cours</th>
                        <th>Date création</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php 
                $i = 0;
                foreach($callUser as $user):
                    $i++;
                ?>

                              
                    <tr>
                        <td data-label="ID"><?= $i ?></td>
                        <td data-label="Nom"><?= $user['name_user'] ?></td>
                        <td data-label="Email"><?= $user['email_user'] ?></td>
                        <td data-label="Total Tickets"><?= $user['total_tickets'] ?></td>
                        <td data-label="En cours"><?= $user['in_progress'] ?></td>
                        <td data-label="Date"><?= $user['created_at_user'] ?></td>
                        <td data-label="Action">
                            <button class="btn">Voir</button>
                        </td>
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