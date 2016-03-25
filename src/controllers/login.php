<?php

if (isset($_POST['submit'])) {
    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');

    if (checkLogin($login, $password)) {
        //enregiustrement des informations d'authentification
        session_regenerate_id(true);
        $response = "login ok";
        $_SESSION['role'] = 'client';
        $_SESSION['login'] = $login;
        header('location: http://chapitre.local');
    } else {
        setFlash('les informations de connexion sont incorrectes');
        $response = getResponse('view-login', array('login' => $login));
    }
} else {
    $response = getResponse('view-login', array('login' => ''));
}

echo $response;
?>
