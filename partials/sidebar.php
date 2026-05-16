<?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1):?>

    <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">Ky_ticketing</div>

    <nav class="sidebar-nav">
        <a href="../partials/dashboard_user.php" class="active">Dashboard</a>
        <a href="../pages/profile.php">Profile</a>
        
    </nav>
</aside>
    
    <?php endif; ?>

<?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2):?>

    <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">Ky_ticketing</div>

    <nav class="sidebar-nav">
        <a href="../partials/dashboard_tech.php" class="active">Dashboard</a>
        <a href="getTicket.php">Tickets</a>
        <a href="getUser.php">Utilisateurs</a>
        <a href="../pages/profile.php">Profile</a>
    </nav>
</aside>
    
    <?php endif; ?>

<?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 3):?>

    <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">Ky_ticketing</div>

    <nav class="sidebar-nav">
        <a href="../partials/dashboard_admin.php" class="active">Dashboard</a>
        <a href="getTicket.php">Tickets</a>
        <a href="getTech.php">Techniciens</a>
        <a href="getUser.php">Utilisateurs</a>
        <a href="../pages/profile.php">Profile</a>
    </nav>
</aside>
    
    <?php endif ?> 

