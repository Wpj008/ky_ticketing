




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>


    <form action="traitements/traitement_login.php" method="POST">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  >
        <br>
        <label for="password">Mot de Passe:</label>
        <input type="password" id="password" name="password"  >
        <br>
        <button type="submit" name="submit">Se connecter</button>
    </form>

</body>
</html>