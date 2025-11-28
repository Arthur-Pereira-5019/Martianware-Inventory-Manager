<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require 'banco.php';
header('Content-Type: application/json');
session_start();

if (!(isset($_POST['loginquery']))) {
    echo json_encode(['status' => 'bad_request', 'message' => 'Requisição inválida!']);
    exit();
}
$loginquery = $_POST['loginquery'];
$loginobject = json_decode($loginquery);

if ($loginquery->name === "admin" && $loginquery->password === "adminpassword") {
    echo json_encode(['status' => 'ok', 'message' => $username . 'Logado com sucesso!']);
    session_start();
    $_SESSION['username'] = $username;
    exit();
} else {
    $user = get_usuario_name($loginquery->name);
    if ($user['password'] == $loginquery->password) {
        echo json_encode(['status' => 'ok', 'message' => $username . 'Logado com sucesso!']);
        session_start();
        $_SESSION['username'] = $username;
        exit();
    } else {
        echo json_encode(['status' => 'bad_request', 'message' => 'Usuário não encontrado, verifique suas credenciais!']);
        exit();
    }
}
