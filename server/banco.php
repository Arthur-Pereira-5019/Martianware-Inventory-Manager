<?php

function conectar()
{
    $servername = 'localhost';
    $username = 'root';
    $password = 'admin';
    $dbname = 'webti';

    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}
//conectar();

function cadastra_usuario($nome, $email, $login, $senha)
{
    $con = conectar();
    $stmt = $con->prepare("INSERT INTO usuarios (nome, email, login, senha) VALUES (:nome, :email, :login, :senha)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    return $stmt->execute();
}



function delete_usuario($id)
{
    $con = conectar();
    $stmt = $con->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

function atualiza_usuario($nome, $email, $login, $senha, $id)
{
    $con = conectar();
    $stmt = $con->prepare("UPDATE usuarios SET nome =:nome, email = :email, login = :login, senha = :senha WHERE id = :id");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', var: $id);
    return $stmt->execute();
}
//cadastra_usuario("Borabill", "joao@gmail", "borabill", "abcdefghij");
//cadastra_usuario("Renzk", "joaoasas@gmail", "borabillasasas", "abcdefghijasas");
//delete_usuario(1)
atualiza_usuario("Arthur", "joao@grail", "basasaasa", "sasaasaa", 5);

function get_usuario($id)
{
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', var: $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
echo var_dump(get_usuario(7));

function list_usuario() {
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

echo"<pre>";
print_r(var_dump(list_usuario()));
echo("</pre");

?>