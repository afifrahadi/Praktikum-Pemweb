<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_COOKIE["username"])) {
    header("Location: login.php");
    exit();
}

$username = isset($_SESSION["username"]) ? $_SESSION["username"] : $_COOKIE["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>
