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

function cadastra_usuario($name, $password)
{
    $con = conectar();
    $stmt = $con->prepare("INSERT INTO usuarios (name, password) VALUES (:name, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    return $stmt->execute();
}

function delete_usuario($id)
{
    $con = conectar();
    $stmt = $con->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

function atualiza_usuario($name, $password, $id)
{
    $con = conectar();
    $stmt = $con->prepare("UPDATE usuarios SET name =:name, password = :password WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', var: $id);
    return $stmt->execute();
}
//cadastra_usuario("Borabill", "joao@gmail", "borabill", "abcdefghij");
//cadastra_usuario("Renzk", "joaoasas@gmail", "borabillasasas", "abcdefghijasas");
//delete_usuario(1)
//atualiza_usuario("Arthur", "joao@grail", "basasaasa", "sasaasaa", 5);

function get_usuario($id)
{
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', var: $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_usuario_name($name) {
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM usuarios WHERE name = :name");
    $stmt->bindParam(':name', var: $name);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//echo var_dump(get_usuario(7));

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