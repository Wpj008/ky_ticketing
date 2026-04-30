<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
   
</head> <link rel="stylesheet" href="../assets/css/dashboard_admin.css">
<body>

<div class="container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>SupportPro</h2>
        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Tickets</a>
            <a href="#">Utilisateurs</a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="main">

        <!-- Header -->
        <header class="header">
            <h1>Dashboard Administrateur</h1>
            <div class="user">
                <span>Admin</span>
                <button class="logout">Déconnexion</button>
            </div>
        </header>

        <!-- Stats simples (autorisées car dashboard) -->
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

        <!-- Table tickets -->
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
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>#1</td>
                        <td>Bug connexion</td>
                        <td>Richard</td>
                        <td><span class="badge high">Haute</span></td>
                        <td><span class="badge progress">En cours</span></td>
                        <td>Paul</td>
                        <td><button class="btn">Voir</button></td>
                    </tr>

                    <tr>
                        <td>#2</td>
                        <td>Erreur paiement</td>
                        <td>Marie</td>
                        <td><span class="badge critical">Critique</span></td>
                        <td><span class="badge new">Nouveau</span></td>
                        <td>-</td>
                        <td><button class="btn">Assigner</button></td>
                    </tr>
                </tbody>
            </table>

        </section>

    </main>

</div>

</body>
</html>