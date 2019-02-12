<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "Admin");
$template->set("description", "Admin");
$template->set("keywords", "Inicio");
$template->set("favicon", LOGO);
$template->themeInit();
//Clases
$pedidos = new Clases\Pedidos();
$carrito = new Clases\Carrito();
$usuarios = new Clases\Usuarios();
$productos = new Clases\Productos();

$monto = 'Paga con: '.$funciones->antihack_mysqli(isset($_POST['monto']) ? $_POST['monto'] : '');
$cod_pedido = $_SESSION["cod_pedido"];
$tipo_pedido = isset($_GET["tipo_pedido"]) ? $_GET["tipo_pedido"] : '1';

$pedidos->set("cod", $cod_pedido);
$pedido = $pedidos->view();

$usuarioSesion = $_SESSION['usuarios'];
$carro = $carrito->return();

$timezone  = -3;
$fecha = gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I")));

?>
<?php
if (is_array($pedido)):
    $pedidos->set("cod", $cod_pedido);
    $pedidos->delete();
endif;

foreach ($carro as $carroItem):

    $productos->set("cod",$carroItem["id"]);
    $productosData = $productos->view();
    if($productosData){
        $cod_empresa = $productosData["cod_empresa"];
    }

    if(empty($carroItem["opciones"])){
        $opciones = '';
    }else{
        $opciones = '|||'.serialize($carroItem["opciones"]);
    }
    if($carroItem["id"] == "Envio-Seleccion"){
        $monto = "Envio-Seleccion";
    }else{
        $monto = 'Paga con: '.$funciones->antihack_mysqli(isset($_POST['monto']) ? $_POST['monto'] : '');
    }

    $pedidos->set("cod", $cod_pedido);
    $pedidos->set("producto", $carroItem["titulo"].$opciones);
    $pedidos->set("cantidad", $carroItem["cantidad"]);
    $pedidos->set("precio", $carroItem["precio"]);
    $pedidos->set("precioAdicional", $carroItem["precioAdicional"]);
    $pedidos->set("estado", 0);
    $pedidos->set("tipo", $tipo_pedido);
    $pedidos->set("usuario", $usuarioSesion["cod"]);
    $pedidos->set("empresa", $cod_empresa);
    $pedidos->set("detalle", $monto);
    $pedidos->set("fecha", $fecha);
    $pedidos->add();
endforeach;

switch ($tipo_pedido):
    /*case 0:
        //Transferencia o depósito bancario
        $pedidos->set("cod", $cod_pedido);
        $pedidos->set("estado", 1);
        $pedidos->cambiar_estado();
        $funciones->headerMove(URL . "/compra-finalizada.php");
        break;*/
    case 1:
        //Coordinar con el vendedor
        $pedidos->set("cod", $cod_pedido);
        $pedidos->set("estado", 1);
        $pedidos->cambiar_estado();
        $funciones->headerMove(URL . "/compra-finalizada");
        break;
    /*case 2:
        include("vendor/mercadopago/sdk/lib/mercadopago.php");
        $mp = new MP ("3087431389449841", "8V6jXmINfMLcpoEqV1cnVGQbEMnVwyjK");
        $preference_data = array(
            "items" => array(
                array(
                    "id" => $cod_pedido,
                    "title" => "COMPRA CÓDIGO N°:" . $cod_pedido,
                    "quantity" => 1,
                    "currency_id" => "ARS",
                    "unit_price" => $precio
                )
            ),
            "payer" => array(
                "name" => $usuarioSesion["nombre"],
                "surname" => $usuarioSesion["apellido"],
                "email" => $usuarioSesion["email"]
            ),
            "back_urls" => array(
                "success" => "/compra-finalizada.php",
                "pending" => "/compra-finalizada.php",
                "failure" => "/compra-finalizada.php"
            ),
            "external_reference" => $cod_pedido,
            "auto_return" => "all",
            //"client_id" => $usuarioSesion["cod"],
            "payment_methods" => array(
                "excluded_payment_methods" => array(),
                "excluded_payment_types" => array(
                    array("id" => "ticket"),
                    array("id" => "atm")
                )
            )
        );
        $preference = $mp->create_preference($preference_data);
        //$funciones->headerMove($preference["response"]["sandbox_init_point"]);
        echo "<iframe src='" . $preference["response"]["sandbox_init_point"] . "' width='100%' height='700px'></iframe>";
        break;*/
endswitch;

$template->themeEnd();
?>