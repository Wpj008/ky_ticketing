<?php
session_start();
require_once "../functions/users.php";
 
checkLogin();


if (!isset($_SESSION['user_id'], $_SESSION['role_id'])) {
    header("Location: ../index.php");
    exit;
}

if ($_SESSION['role_id'] == 1) {
    header("Location: ../partials/dashboard_user.php");
    exit;
}

if ($_SESSION['role_id'] == 2) {
    header("Location: ../partials/dashboard_tech.php");
    exit;
}

if ($_SESSION['role_id'] == 3) {
    header("Location: ../partials/dashboard_admin.php");
    exit;
}

header("Location: ../index.php");
exit;