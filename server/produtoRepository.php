<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
require_once("banco.php");
function insert_produtos($nome, $quantidade, $preco)
{
    $con = conectar();
    $stmt = $con->prepare("INSERT INTO produtos (nome, quantidade, preco) VALUES (:nome, :quantidade, :preco)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':preco', $preco);
    return $stmt->execute();
}

function delete_produtos($id)
{
    $con = conectar();
    $stmt = $con->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

function update_produtos($nome, $quantidade, $preco)
{
    $con = conectar();
    $stmt = $con->prepare("UPDATE produtos SET nome =:nome, quantidade = :quantidade, preco = :preco WHERE id = :id");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':preco', var: $preco);
    $stmt->bindParam(':id', var: $id);
    return $stmt->execute();
}

function get_produto($id)
{
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM produtos WHERE id = :id");
    $stmt->bindParam(':id', var: $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
/*
function get_usuario_name($name) {
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM produtos WHERE name = :name");
    $stmt->bindParam(':name', var: $name);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}*/

function list_usuario() {
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM produtos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>