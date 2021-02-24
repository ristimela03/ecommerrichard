<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$archivos = array_diff (scandir("cuentas/"), array('.','..'));

$errorValidacion = false;
foreach ($archivos as $archivo) {
    $archivoRegistro = file_get_contents("cuentas/$archivo");
    $arrayCuenta = explode("\n",$archivoRegistro);
    if ($arrayCuenta[2] == $email || $arrayCuenta[0] == $username) {
        $errorValidacion = true;
    }
}

if (file_exists("cuentas/$username.txt") || $errorValidacion){
    header('location: account.php?error=regError');
}else {

    $archivoRegistro = fopen("cuentas/$username.txt",'a+');
    fwrite($archivoRegistro,$username."\n");
    fwrite($archivoRegistro,$password."\n");
    fwrite($archivoRegistro,$email."\n");
    fclose($archivoRegistro);
}

//tarea que pasa si ya existe el archivo
