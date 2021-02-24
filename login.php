<?php

ini_set('session.save_path','/var/tmp/'); 
$username = $_POST['username'];
$password = $_POST['password'];



$archivoUsuario = @file_get_contents("cuentas/$username.txt");
    if ($archivoUsuario) { 
        $arrayArchivo = explode("\n", $archivoUsuario);
        if ($arrayArchivo[1] == $password) {
            session_start();
            $_SESSION['logueado'] =true;
            $_SESSION['username'] = $username;     
            header('location: index.php');
        } else {
            header('location: account.php?error=loginError');
        }
    }else {
        header('location: account.php?error=loginError');
    }


//tarea que pasa si no existe el archivo
