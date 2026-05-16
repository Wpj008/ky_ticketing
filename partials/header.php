<?php 
$name = $_SESSION['name_user'] ;


?>

<header class="header">
    <button class="burger" id="burger">☰</button>

    <div class="header-left">
        <h1>Ky_ticketing</h1>
    </div>

    <div class="header-right">
        <span class="user-role"><?= $name ?></span>
        <a href="../pages/logout.php" class="logout">Déconnexion</a>
    </div>
</header>