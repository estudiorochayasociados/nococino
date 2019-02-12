<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$funcion = new Clases\PublicFunction();
$empresa = new Clases\Empresas();
$pedido = new Clases\Pedidos();
$cod_usuario = $_SESSION['usuarios']['cod'];
$empresa->set("cod_usuario", $cod_usuario);
$empresaData = $empresa->view();
$cod_empresa = $empresaData['cod'];
$filterPedidosAgrupados = array("empresa = '" . $cod_empresa . "' GROUP BY cod");
$pedidosArrayAgrupados = $pedido->list($filterPedidosAgrupados, "", "");
header('Content-Type: application/json');
echo json_encode($pedidosArrayAgrupados);
?>
