<?php
header('Content-Type: application/json; charset=utf-8');
//error_reporting(0);
session_start();
$json = file_get_contents('php://input');
$query = json_decode($json, false);
require_once 'autenticacao.php';
require_once 'cadastrar.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($query->type === "logar") {
    if ($query->name !== "") {
        logar($query->name, $query->password, true);
    }
} else if ($query->type === "cadastrar") {
    if ($query->name !== "") {
        cadastrar($query->name, $query->password);
    }
}
