<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    session_start();
  
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'invalid_credentials':
                echo '<h2 style="color:red; text-align:center;">Invalid username or password.</h2>';
                break;
        }
    }

    if (isset($_GET['success']) && $_GET['success'] === 'true') {
        header("Location: index.php");
        exit();
    }
    ?>
<body>
    <h2>Login</h2>
    <form action = 'autenticacao.php' method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name = "username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name = "password" required>
        <br><br>
        <input type="submit" value="Login">
</form>
</body>
</html>