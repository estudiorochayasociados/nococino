<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$usuario = new Clases\Usuarios();
$funcion = new Clases\PublicFunction();
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';
unset($_SESSION["usuarios"]);
$usuario->set("email",$email);
$usuario->set("password",$password);
$usuario->login();
$funcion->headerMove(URL.'/panel#seccion-1');
?>