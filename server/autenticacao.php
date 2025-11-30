<?php
header('Content-Type: application/json; charset=utf-8');
//error_reporting(0);
function logar($name, $password, $print)
{
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    if ($name === "admin" && $password === "adminpassword") {
        if ($print  === true)  {
            echo json_encode(['status' => 3, 'message' => "Bem vindo " . $name]);
        }
        $_SESSION['username'] = $name;
        exit();
    } else {
        $user = get_usuario_name($name);
        if (!$user) {
            if ($print === true) {
                echo json_encode(['status' => 1, 'message' => 'Usuário não encontrado, verifique suas credenciais ou faça cadastro!']);
            }
            exit();
        }
        if ($user['password'] == $password) {
            if ($print === true) {
                echo json_encode(['status' => 3, 'message' => "Bem-vindo " . $name]);
            }
            $_SESSION['username'] = $name;
            exit();
        } else {
            if ($print === true) {
                echo json_encode(['status' => 2, 'message' => 'Credenciais inválidas!']);
            }
            exit();
        }
    }
}

function logout() {
    session_destroy();
    echo json_encode(['status' => 7, 'message' => 'Deslogado com sucesso!']);
}
