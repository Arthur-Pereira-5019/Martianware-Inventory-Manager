<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['username'])) {
        echo "<p>Usuário logado: " . $_SESSION['username'] . "</p>";  
    } else {
        header("Location: login.php?error=nao_autenticado");
        exit();
    }

    if(isset($_GET['nome'])) {
        $_SESSION['nome'] = $_GET['nome'];
        echo "<h2>Bem-vindo: " . $_SESSION['username'] . "</h2>";  
    }
    
    if(isset($_GET['error'])) {
        if($_GET['error'] == 'faltando_dados') {
    echo '<p>Faltando dados</p>';

        } else if($_GET['error'] == 'dados_invalidos') {
    echo '<p>Dados inválidos</p>';

        }
    }
 ?>
    <h2>Formulário de Cadastro</h2>
    <form action="imc.php" method = "post">
        <label for="iname">Nome</label>
        <input type="text" id="iname" name = "nome">

        <label for="iemail">E-mail</label>
        <input type="text" id="iemail" name = "email">

        <label for="ipeso">Peso</label>
        <input type="text" id="ipeso" name = "peso">

        <label for="ialtura">Altura</label>
        <input type="text" id="ialtura" name = "altura">

        <input type="submit" value="Cadastrar">
    </form>
    
</body>
</body>
</html>