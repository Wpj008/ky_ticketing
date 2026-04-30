<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utilisateur</title>
    <link rel="stylesheet" href="../assets/css/dashboard_user.css">
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>SupportPro</h2>
        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Mes tickets</a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="main">

        <!-- Header -->
        <header class="header">
            <h1>Mes Tickets</h1>
            <div class="user">
                <span>Utilisateur</span>
                <button class="logout">Déconnexion</button>
            </div>
        </header>

        <!-- Bouton création -->
        <section class="actions">
            <button class="btn">+ Créer un ticket</button>
        </section>

        <!-- Table -->
        <section class="table-section">
            <h2>Liste de mes tickets</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Assigné à</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>#1</td>
                        <td>Problème connexion</td>
                        <td><span class="badge high">Haute</span></td>
                        <td><span class="badge progress">En cours</span></td>
                        <td>Paul</td>
                        <td><button class="btn">Voir</button></td>
                    </tr>

                    <tr>
                        <td>#2</td>
                        <td>Bug affichage</td>
                        <td><span class="badge new">Faible</span></td>
                        <td><span class="badge new">Nouveau</span></td>
                        <td>-</td>
                        <td><button class="btn">Voir</button></td>
                    </tr>

                </tbody>
            </table>

        </section>

    </main>

</div>

</body>
</html>