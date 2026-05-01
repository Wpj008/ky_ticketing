<?php 
session_start();
require_once "../functions/users.php";
checkLogin();

$callTech = getTech();

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
                <p>5</p>
            </div>

            <div class="card">
                <h3>Total tickets</h3>
                <p>120</p>
            </div>

            <div class="card">
                <h3>Tickets en cours</h3>
                <p>35</p>
            </div>

            <div class="card">
                <h3>Tickets critiques</h3>
                <p>10</p>
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
                        <th>Total tickets</th>
                        <th>En cours</th>
                        <th>Critiques</th>
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
                        <td data-label="Total"><?= $tech['role_id'] ?></td>
                        <td data-label="En cours"><?= $tech['role_id'] ?></td>
                        <td data-label="Critiques"><?= $tech['created_at_user'] ?></td>
                        <td data-label="Action">
                            <button class="btn">Voir</button>
                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </section>

        <!-- TABLE TICKETS D'UN TECHNICIEN -->
        <section class="table-section">
            <h2>Tickets du technicien</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Utilisateur</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td data-label="ID">#1</td>
                        <td data-label="Titre">Bug connexion</td>
                        <td data-label="Utilisateur">Richard</td>
                        <td data-label="Priorité">
                            <span class="badge high">Haute</span>
                        </td>
                        <td data-label="Statut">
                            <span class="badge progress">En cours</span>
                        </td>
                    </tr>

                    <tr>
                        <td data-label="ID">#2</td>
                        <td data-label="Titre">Erreur paiement</td>
                        <td data-label="Utilisateur">Marie</td>
                        <td data-label="Priorité">
                            <span class="badge critical">Critique</span>
                        </td>
                        <td data-label="Statut">
                            <span class="badge new">Nouveau</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>

    </div>
</main>

<script src="../assets/js/app.js"></script>

</body>
</html>