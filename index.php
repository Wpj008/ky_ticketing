<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

<div class="login-container">
    <div class="login-card">

        <h1>Login</h1>

        <form action="traitements/traitement_login.php" method="POST">

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de Passe:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="submit" class="btn-login">
                Se connecter
            </button>
        </form>

    </div>
</div>

</body>
</html>