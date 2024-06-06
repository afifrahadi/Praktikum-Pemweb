<?php
include 'connection.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM data_user WHERE username = '$username'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["username"] = $username;
            if (isset($_POST["remember"])) {
                setcookie("username", $username, time() + (86400 * 30), "/");
            }
            header("Location: dashboard.php");
            exit();
        } else {
            $login_error = "Invalid password";
        }
    } else {
        $login_error = "No user found with that username";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($login_error)) { echo "<p style='color:red;'>$login_error</p>"; } ?>
    <form method="post" action="login.php">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Remember me: <input type="checkbox" name="remember"><br><br>
        <input type="submit" value="Login">
    </form>
    <p>Tidak punya akun? <a href="register.php">Register di sini</a></p>
</body>
</html>
