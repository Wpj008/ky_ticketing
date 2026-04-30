<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Technicien</title>
    <link rel="stylesheet" href="../assets/css/dashboard_tech.css">
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>SupportPro</h2>
        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Tickets</a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="main">

        <!-- Header -->
        <header class="header">
            <h1>Dashboard Technicien</h1>
            <div class="user">
                <span>Technicien</span>
                <button class="logout">Déconnexion</button>
            </div>
        </header>

        <!-- Filtres -->
        <section class="filters">
            <select>
                <option>Statut</option>
                <option>Nouveau</option>
                <option>En cours</option>
                <option>Résolu</option>
            </select>

            <select>
                <option>Priorité</option>
                <option>Faible</option>
                <option>Moyenne</option>
                <option>Haute</option>
                <option>Critique</option>
            </select>

            <select>
                <option>Assignation</option>
                <option>Tous</option>
                <option>Mes tickets</option>
                <option>Non assignés</option>
            </select>
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

                    <!-- Ticket non assigné -->
                    <tr>
                        <td>#1</td>
                        <td>Bug connexion</td>
                        <td>Richard</td>
                        <td><span class="badge high">Haute</span></td>
                        <td><span class="badge new">Nouveau</span></td>
                        <td>-</td>
                        <td>
                            <button class="btn">Prendre en charge</button>
                        </td>
                    </tr>

                    <!-- Ticket assigné -->
                    <tr>
                        <td>#2</td>
                        <td>Erreur paiement</td>
                        <td>Marie</td>
                        <td><span class="badge critical">Critique</span></td>
                        <td><span class="badge progress">En cours</span></td>
                        <td>Moi</td>
                        <td>
                            <button class="btn">Voir</button>
                        </td>
                    </tr>

                </tbody>
            </table>

        </section>

    </main>

</div>

</body>
</html>