<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(0);
session_start();

require_once 'usuarioRepository.php';
require_once 'autenticacao.php';

function cadastrar($name, $password)
{
    if (!isset($_SESSION['username'])) {
        cadastra_usuario($name, $password);
        echo json_encode(['status' => 4, 'message' => "Usuário cadastro com sucesso!"]);
        logar($name, $password, false);
    } else {
        echo json_encode(['status' => 5, 'message' => "Usuário já logado!"]);
    }
}

?>