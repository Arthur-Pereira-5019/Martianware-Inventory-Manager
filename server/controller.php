<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(0);
session_start();
$json = file_get_contents('php://input');
$query = json_decode($json, false);
require_once 'autenticacao.php';
require_once 'cadastrar.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

switch ($query->type) {
    case "logar":
        logar($query->name, $query->password, true);
        break;
    case "cadastrar":
        cadastrar($query->name, $query->password);
        break;
    case "testar":
        if (isset($_SESSION['username'])) {
            echo json_encode(['status' => 5, 'message' => "Bem vindo " . $_SESSION['username'] . "!"]);
        } else {
            echo json_encode(['status' => 6, 'message' => "Usuário não logado!"]);
        }
        break;
    default:
        if (isset($_SESSION['username'])) {
            switch ($query->type) {
                case "novo_produto":
                    cadastrar($query->name, $query->password);
                    break;
                case "logout":
                    logout();
                    break;
                default:
                    echo json_encode(['status' => 8, 'message' => "Unknown endpoint or not allowed!"]);
                    break;
            }
        }
}
