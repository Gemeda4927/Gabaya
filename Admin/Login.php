<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials are correct (you can use a database check here)
    if ($username == 'admin' && $password == 'adminpassword') {
        $_SESSION['admin'] = true;
        header('Location: ../pages/product-upload.php');
        exit();
    } else {
        echo "<p>Invalid username or password!</p>";
    }
}
?>

<form action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit" name="login">Login</button>
</form>
