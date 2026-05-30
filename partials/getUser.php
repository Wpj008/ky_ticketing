<?php 
session_start();
require_once "../functions/users.php";
require_once "../functions/statistique.php";
checkLogin();

$callUser = getUser();


 $totalTechs = countTechs();
 $totalAdmin = countAdmin();
 $TOTAL = TOLTALusers();
 $totalUser = countUser();
 







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
                <p><?=  $TOTAL['total_users'] ?></p>
            </div>

            <div class="card">
                <h3>Utilisateurs</h3>
                <p><?=  $totalUser['total_user'] ?></p>
            </div>

            <div class="card">
                <h3>Techniciens</h3>
                <p><?=  $totalTechs['total_techs'] ?></p>
            </div>

            <div class="card">
                <h3>Administrateurs</h3>
                <p><?=  $totalAdmin['total_admin'] ?></p>
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
                        <th>Statut</th>
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
                        <td data-label="Statut">
                            <?php if ($user['isActif'] == 1): ?>
                                <span class="etat-user-1">Actif</span>
                            <?php else: ?>
                                <span class="etat-user-2">Inactif</span>
                            <?php endif; ?>
                        </td>
                        <td data-label="Date"><?= $user['created_at_user'] ?></td>
                        <form method="POST" action="detail_user.php">
                            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
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