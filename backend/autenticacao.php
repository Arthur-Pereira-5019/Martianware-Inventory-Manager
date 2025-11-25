<?php session_start();
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
if(!(isset($_POST['username']) && isset($_POST['password']))) {
    header("Location: login.php?error=faltando_dados");
    exit();
}
$username = $_POST['username'];
$password = $_POST['password'];
if($username === "admin" && $password === "senha123") {
        header("Location: formulario.php");
        echo "<h1>Login bem-sucedido!</h1>";
        echo "<h1>Bem-vindo  $username!</h1>";
        session_start();
        $_SESSION['username'] = $username;
} else {
    header("Location: login.php?error=credenciais_invalidos");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form>
        
    
</body>
</html>