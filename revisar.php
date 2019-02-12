<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funcion = new Clases\PublicFunction();
$template->set("title", TITULO);
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
//Clases
$pedido = new Clases\Pedidos;
$carrito = new Clases\Carrito();
$usuario = new Clases\Usuarios();

$cod_pedido = $_SESSION["cod_pedido"];

$carro = $carrito->return();
$carroEnvio = $carrito->checkEnvio();

$cod_usuario = $_SESSION['usuarios']['cod'];
$usuario->set("cod", $cod_usuario);
$usuarioData = $usuario->view();

$precioTotal = 0;

if (empty($_SESSION["usuarios"])):
    $funcion->headerMove(URL . '/invitado');
endif;

if (empty($usuarioData['direccion']) || empty($usuarioData['localidad']) || empty($usuarioData['provincia']) || empty($usuarioData['telefono'])):
    $funcion->headerMove(URL . '/completarPerfil');
endif;
?>

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Confirmar</h1>
                <p>Confirmá tu pedido.</p>
                <p></p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Pedido</a></li>
                <li>Confirmación</li>
            </ul>
        </div>
    </div><!-- Position -->

    <!-- Content ================================================== -->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="box_style_2">
                    <h2 class="inner">Confirmar</h2>
                    <h4>Pedido</h4>
                    <table class="table table-striped nomargin">
                        <tbody>
                        <?php foreach ($carro as $carroItem):
                            if ($carroItem['id'] !== "Envio-Seleccion"):

                                if (!empty($carroItem['opciones'])):
                                    $variantesMostrarCarrito = $carroItem['opciones'][0];
                                    $adicionalesMostrarCarrito = $carroItem['opciones'][1];
                                endif;
                                ?>
                                <tr>
                                    <td class="w_td100">
                                        <strong><?= $carroItem['cantidad']; ?>x</strong> <?= $carroItem['titulo']; ?>
                                    </td>
                                    <td class="w_td100">
                                        <strong class="pull-right">$<?= $carroItem['precio'] * $carroItem['cantidad']; ?></strong>
                                    </td>
                                </tr>
                                <?php if (!empty($carroItem['opciones']) && !empty($variantesMostrarCarrito[1])):
                                $valor = explode(",", $variantesMostrarCarrito); ?>
                                <tr>
                                    <td>
                                        - <?= $valor[1]; ?>
                                    </td>
                                    <td>
                                        <strong class="pull-right">$<?= $valor[0] * $carroItem['cantidad']; ?></strong>
                                    </td>
                                </tr>
                            <?php endif;
                                if (!empty($carroItem['opciones']) && is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) > 1):
                                    foreach ($adicionalesMostrarCarrito as $value):
                                        $value = explode(",", $value); ?>
                                        <tr>
                                            <td>
                                                - <?= $value[1] ?>
                                            </td>
                                            <td>
                                                <strong class="pull-right">$<?= $value[0] * $carroItem['cantidad'] ?></strong>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                elseif (!empty($carroItem['opciones']) && is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) == 1):
                                    $valor = explode(",", $adicionalesMostrarCarrito[0]); ?>
                                    <tr>
                                        <td>
                                            - <?= $valor[1] ?>
                                        </td>
                                        <td>
                                            <strong class="pull-right">$<?= $valor[0] * $carroItem['cantidad'] ?></strong>
                                        </td>
                                    </tr>
                                <?php endif;
                            endif;
                        endforeach; ?>

                        <?php foreach ($carro as $carroItem):
                            $precioTotal = $precioTotal + ($carroItem['precio'] + $carroItem['precioAdicional']) * $carroItem['cantidad'];
                        endforeach; ?>
                        <tr>
                            <td>
                                Envío: <?= $carro[$carroEnvio]["titulo"] ?>
                                <a href="#" class="tooltip-1" data-placement="top" title=""
                                   data-original-title="Tiempo estimado: 30 min."><i
                                            class="icon_question_alt"></i></a>
                            </td>
                            <td>
                                <strong class="pull-right"><?php if ($carro[$carroEnvio]["precio"] == 0) {
                                        echo 'Gratis';
                                    } else {
                                        echo '$' . $carro[$carroEnvio]["precio"];
                                    } ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="total_confirm">
                                TOTAL
                            </td>
                            <td class="total_confirm">
                                <span class="pull-right">$<?= $precioTotal; ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <form method="post" action="<?= URL ?>/checkout">
                        <h3>El pago se realiza en efectivo</h3>
                        <p>
                            Indique el monto con el que pagará para entregarle el cambio justo.
                        </p>
                        <input class="form-control" type="number" name="monto" required placeholder="500"><br/>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn_full" name="confirmar" type="submit">Confirmar <i
                                            class="icon-right-open-5"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

<?php $template->themeEnd() ?>