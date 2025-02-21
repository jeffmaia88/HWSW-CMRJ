<?php

session_start();

$usuario_autenticado = false;

$usuario_app = array (
    array('login' => 'jefferson.maia', 'senha' => 'dezembro88'),
    array('login' => 'mauro.neves', 'senha' => '123456'),
);



foreach($usuario_app as $user) {
    
    if($user['login'] == strtolower($_POST['login']) && $user['senha'] == $_POST['password']) {
        $usuario_autenticado = true;
    }
}


if ($usuario_autenticado) {
    echo 'Usuario autenticado';
    $_SESSION['autenticado'] = 'SIM';
    header('location: entrada.php');
}else {
    $_SESSION['autenticado'] = 'NÃO';
    header('location: index.php?login=error');
    
}




?>