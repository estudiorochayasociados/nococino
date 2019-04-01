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
$correo = new Clases\Email();
$empresa = new Clases\Empresas();
$producto = new Clases\Productos();

$cod_pedido = $_SESSION["cod_pedido"];

$pedido->set("cod", $cod_pedido);
$pedidoData = $pedido->view();
$cod_empresa = $pedidoData['empresa'];
$empresa->set("cod", $cod_empresa);
$empresaData = $empresa->view();
$email_empresa = $empresaData['email'];

$precioTotal = 0;

$carro = $carrito->return();
$carroEnvio = $carrito->checkEnvio();
?>
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400">
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
                    <h2 class="inner">Compra Finalizada</h2>
                    <div id="confirm">
                        <i class="icon_check_alt2"></i>
                        <h3>¡Encargado exitosamente!</h3>
                        <p>
                            Tu pedido ya fue tomado y estará llegando detro de los proximos 30 minutos.
                        </p>
                    </div>
                    <h4>Resumen</h4>
                    <table class="table table-striped nomargin">
                        <tbody>
                        <?php
                        $carro__ = '';
                        foreach ($carro as $carroItem):
                            if ($carroItem['id'] !== "Envio-Seleccion"):
                                $producto->set("cod", $carroItem['id']);
                                $productoData = $producto->view();
                                $nuevoStock = $productoData['stock'] - $carroItem['cantidad'];
                                $producto->editUnico("stock", $nuevoStock);

                                if (!empty($carroItem['opciones'])):
                                    $variantesMostrarCarrito = $carroItem['opciones'][0];
                                    $adicionalesMostrarCarrito = $carroItem['opciones'][1];
                                endif;
                                ?>
                                <tr>
                                    <td class="w_td100">
                                        <strong><?= $carroItem['cantidad']; ?>x</strong> <?= $carroItem['titulo']; ?>
                                        <?php $carro__ .= "<tr style='background: #ccc;'><td><b>" . $carroItem['cantidad'] . "x " . $carroItem['titulo'] . "</b></td>"; ?>
                                    </td>
                                    <td class="w_td100">
                                        <strong class="pull-right">$<?= $carroItem['precio'] * $carroItem['cantidad']; ?></strong>
                                        <?php $carro__ .= "<td>$" . $carroItem['precio'] * $carroItem['cantidad'] . "</td></tr>"; ?>
                                    </td>
                                </tr>
                                <?php if (!empty($carroItem['opciones']) && !empty($variantesMostrarCarrito[1])):
                                $valor = explode(",", $variantesMostrarCarrito); ?>
                                <tr>
                                    <td>
                                        - <?= $valor[1]; ?>
                                        <?php $carro__ .= "<tr><td>&nbsp;&nbsp;&nbsp;- Variante: " . $valor[1] . "</td>"; ?>
                                    </td>
                                    <td>
                                        <strong class="pull-right">$<?= $valor[0] * $carroItem['cantidad']; ?></strong>
                                        <?php $carro__ .= "<td>$" . $valor[0] * $carroItem['cantidad'] . "</td></tr>"; ?>
                                    </td>
                                </tr>
                            <?php endif;
                                if (!empty($carroItem['opciones']) && is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) > 1):
                                    foreach ($adicionalesMostrarCarrito as $value):
                                        $value = explode(",", $value); ?>
                                        <tr>
                                            <td>
                                                - <?= $value[1] ?>
                                                <?php $carro__ .= "<tr><td>&nbsp;&nbsp;&nbsp;- Adicional: " . $value[1] . "</td>"; ?>
                                            </td>
                                            <td>
                                                <strong class="pull-right">$<?= $value[0] * $carroItem['cantidad'] ?></strong>
                                                <?php $carro__ .= "<td>$" . $value[0] * $carroItem['cantidad'] . "</td></tr>"; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                elseif (!empty($carroItem['opciones']) && is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) == 1):
                                    $valor = explode(",", $adicionalesMostrarCarrito[0]); ?>
                                    <tr>
                                        <td>
                                            - <?= $valor[1] ?>
                                            <?php $carro__ .= "<tr><td>&nbsp;&nbsp;&nbsp;- Adicional: " . $valor[1] . "</td>"; ?>
                                        </td>
                                        <td>
                                            <strong class="pull-right">$<?= $valor[0] * $carroItem['cantidad'] ?></strong>
                                            <?php $carro__ .= "<td>$" . $valor[0] * $carroItem['cantidad'] . "</td></tr>"; ?>
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
                                   data-original-title="Tiempo estimado: <?= $empresaData['tiempoEntrega'] ?>"><i
                                            class="icon_question_alt"></i></a>
                                <?php $carro__ .= "<tr style='background: #ccc;'><td><b>Envío:</b> " . $carro[$carroEnvio]["titulo"] . "</td>"; ?>
                            </td>
                            <td>
                                <strong class="pull-right"><?php if ($carro[$carroEnvio]["precio"] == 0) {
                                        echo 'Gratis';
                                        $carro__ .= "<td>Gratis</td></tr>";
                                    } else {
                                        echo '$' . $carro[$carroEnvio]["precio"];
                                        $carro__ .= "<td>$" . $carro[$carroEnvio]["precio"] . "</td></tr>";
                                    } ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="total_confirm">
                                TOTAL
                                <?php $carro__ .= "<tr style='background: #ccc;'><td><b>TOTAL</b></td>"; ?>
                            </td>
                            <td class="total_confirm">
                                <span class="pull-right">$<?= $precioTotal; ?></span>
                                <?php $carro__ .= "<td><b>$" . $precioTotal . "</b></td></tr>"; ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_POST["crear_cuenta"])):
                        if ($_POST["password"] == $_POST["password2"]):
                            $email = $funcion->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                            $password = $funcion->antihack_mysqli(isset($_POST["password"]) ? $_POST["password"] : '');
                            $terminos = $funcion->antihack_mysqli(isset($_POST["terminos"]) ? $_POST["terminos"] : '');
                            $cod = $funcion->antihack_mysqli(isset($_POST["cod"]) ? $_POST["cod"] : '');

                            $usuario->set("cod", $cod);
                            $usuarioData = $usuario->view();

                            $usuario->set("nombre", $usuarioData['nombre']);
                            $usuario->set("apellido", $usuarioData['apellido']);
                            $usuario->set("provincia", $usuarioData['provincia']);
                            $usuario->set("localidad", $usuarioData['localidad']);
                            $usuario->set("direccion", $usuarioData['direccion']);
                            $usuario->set("barrio", $usuarioData['barrio']);
                            $usuario->set("telefono", $usuarioData['telefono']);
                            $usuario->set("email", $email);
                            $usuario->set("password", $password);
                            $usuario->set("terminos", $terminos);
                            $usuario->set("invitado", 0);
                            $usuario->set("fecha", $usuarioData['fecha']);

                            if ($usuario->edit() == 0):
                                ?>
                                <div class="alert alert-warning" role="alert">El email ya está registrado.</div>
                            <?php
                            else:
                                $usuario->login();
                                $funcion->headerMove(URL);
                            endif;
                        else:
                            ?>
                            <div class="alert alert-warning" role="alert">Las contraseñas no coinciden.</div>
                        <?php
                        endif;
                    endif;
                    ?>
                    <?php if ($_SESSION["usuarios"]["invitado"] == 1): ?>
                        <h3>¿Te gustaría crear una cuenta?</h3>
                        <p>
                            ¡Solo te tomará 1 minuto!.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn_full" data-toggle="collapse" href="#crear_cuenta" role="button"
                                   aria-expanded="false" aria-controls="crear_cuenta">Sí</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn_full" href="<?= URL ?>">No</a>
                            </div>
                        </div>
                        <div class="collapse" id="crear_cuenta">
                            <div class="card card-body">
                                <form method="post">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           required><br/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password"
                                                   placeholder="Contraseña"
                                                   id="password1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password2"
                                                   placeholder="Confirmar contraseña"
                                                   id="password2" required>
                                        </div>
                                    </div>
                                    <br/>
                                    <label>
                                        <input type="checkbox" value="1" id="check_2" name="terminos" required>
                                        <span>He leído y acepto los <strong>Términos &amp; Condiciones</strong></span>
                                    </label><br/><br/>
                                    <input type="hidden" name="cod" value="<?= $_SESSION['usuarios']['cod'] ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn_full" name="crear_cuenta" type="submit">Confirmar <i
                                                        class="icon-right-open-5"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

<?php
//MENSAJE = ARMADO CARRITO
$mensaje_carro = '<table border="1" style="text-align:left;width:100%;font-size:13px !important"><tbody>';
$mensaje_carro .= '<thead style="background: #333333;color: #fff;"><th>Producto</th><th>Precio</th></thead>';
$mensaje_carro .= $carro__;
$mensaje_carro .= '</tbody></table>';

//MENSAJE = DATOS EMPRESA
$datos_empresa = "<b>Comercio:</b> " . $empresaData['titulo'] . "<br/>";
$datos_empresa .= "<b>Email:</b> " . $empresaData['email'] . "<br/>";
$datos_empresa .= "<b>Provincia:</b> " . $empresaData['provincia'] . "<br/>";
$datos_empresa .= "<b>Localidad:</b> " . $empresaData['ciudad'] . "<br/>";
$datos_empresa .= "<b>Dirección:</b> " . $empresaData['direccion'] . "<br/>";
$datos_empresa .= "<b>Teléfono:</b> " . $empresaData['telefono'] . "<br/>";

//MENSAJE = DATOS USUARIO COMPRADOR
$datos_usuario = "<b>Nombre y apellido:</b> " . $_SESSION["usuarios"]["nombre"] . " " . $_SESSION["usuarios"]["apellido"] . "<br/>";
$datos_usuario .= "<b>Email:</b> " . $_SESSION["usuarios"]["email"] . "<br/>";
$datos_usuario .= "<b>Provincia:</b> " . $_SESSION["usuarios"]["provincia"] . "<br/>";
$datos_usuario .= "<b>Localidad:</b> " . $_SESSION["usuarios"]["localidad"] . "<br/>";
$datos_usuario .= "<b>Dirección:</b> " . $_SESSION["usuarios"]["direccion"] . "<br/>";
$datos_usuario .= "<b>Teléfono:</b> " . $_SESSION["usuarios"]["telefono"] . "<br/>";

//USUARIO EMAIL
$mensajeCompraUsuario = '¡Muchas gracias por tu nueva compra!<br/>A continuación te dejamos el pedido que nos realizaste.<hr/> <h3>Pedido realizado:</h3>';
$mensajeCompraUsuario .= $mensaje_carro;
$mensajeCompraUsuario .= '<br/><hr/>';
$mensajeCompraUsuario .= '<h3>Datos del comercio:</h3>';
$mensajeCompraUsuario .= $datos_empresa;
$mensajeCompraUsuario .= '<br/><hr/>';
$mensajeCompraUsuario .= '<h3>Tus datos:</h3>';
$mensajeCompraUsuario .= $datos_usuario;

$correo->set("asunto", "Muchas gracias por tu nueva compra");
$correo->set("receptor", $_SESSION["usuarios"]["email"]);
$correo->set("emisor", EMAIL);
$correo->set("mensaje", $mensajeCompraUsuario);
$correo->emailEnviar();

//ADMIN EMAIL
$mensajeCompra = '¡Nueva compra desde la web!<br/>A continuación te dejamos el detalle del pedido.<hr/> <h3>Pedido realizado:</h3>';
$mensajeCompra .= $mensaje_carro;
$mensajeCompra .= '<br/><hr/>';
$mensajeCompra .= '<h3>Datos del usuario:</h3>';
$mensajeCompra .= $datos_usuario;
$mensajeCompra .= '<br/><hr/>';
$mensajeCompra .= '<h3>Datos de tu comercio:</h3>';
$mensajeCompra .= $datos_empresa;

$correo->set("asunto", "NUEVA COMPRA ONLINE");
$correo->set("receptor", $email_empresa);
$correo->set("emisor", EMAIL);
$correo->set("mensaje", $mensajeCompra);
$correo->emailEnviar();


if (!empty($carro)):
    $carrito->destroy();
    if ($_SESSION["usuarios"]["invitado"] == 1) {
        unset($_SESSION["usuarios"]);
    }
    unset($_SESSION["cod_pedido"]);

endif;
$template->themeEnd() ?>