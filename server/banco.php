<?php

function conectar()
{
    $servername = 'localhost';
    $username = 'root';
    $password = 'Art.DB25';
    $dbname = 'martianware';

    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

try {
    conectar();
} catch(Exception $e) {
    echo json_encode(['code' => 0, 'message' => 'Erro ao conectar no banco de dados, corrija as credenciais!']);
}

?>