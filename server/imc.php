<?php if(!(isset($_POST['peso']) && isset($_POST['altura']))) {
    header("Location: formulario.php?error=faltando_dados");
    exit();
}
$peso = $_POST['peso'];
$altura = $_POST['altura'];

    ?>
<p>IMC:<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    if(!is_numeric($peso) || !is_numeric($altura) || $altura <= 0 ) {
        header("Location: formulario.php?error=dados_invalidos");
        exit();
    }
    echo $peso/($altura*$altura);
    ?><p><?php ?>