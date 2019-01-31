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
$usuario = new Clases\Usuarios();

$cod_usuario = $_SESSION['usuarios']['cod'];
$usuario->set("cod", $cod_usuario);
$usuarioData = $usuario->view();

?>

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Completar Perfil</h1>
                <p>Completá tus datos para enviar el pedido.</p>
                <p></p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Pedido</a></li>
                <li>Completar perfil</li>
            </ul>
        </div>
    </div><!-- Position -->

    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-12">
                <div class="box_style_2" id="main_menu">
                    <h2 class="inner">Información necesaria</h2>
                    <!-- REGISTRAR -->
                    <?php
                    if (isset($_POST["completarPerfil"])):
                        $nombre = $funcion->antihack_mysqli(isset($_POST["nombreInvitado"]) ? $_POST["nombreInvitado"] : $usuarioData['nombre']);
                        $apellido = $funcion->antihack_mysqli(isset($_POST["apellidoInvitado"]) ? $_POST["apellidoInvitado"] : $usuarioData['apellido']);
                        $email = $usuarioData['email'];
                        $password = $usuarioData['password'];
                        $telefono = $funcion->antihack_mysqli(isset($_POST["telefonoInvitado"]) ? $_POST["telefonoInvitado"] : $usuarioData['telefono']);
                        $provincia = $funcion->antihack_mysqli(isset($_POST["provinciaInvitado"]) ? $_POST["provinciaInvitado"] : $usuarioData['provincia']);
                        $ciudad = $funcion->antihack_mysqli(isset($_POST["ciudadInvitado"]) ? $_POST["ciudadInvitado"] : $usuarioData['ciudad']);
                        $postal = $funcion->antihack_mysqli(isset($_POST["postalInvitado"]) ? $_POST["postalInvitado"] : $usuarioData['postal']);
                        $barrio = $funcion->antihack_mysqli(isset($_POST["barrioInvitado"]) ? $_POST["barrioInvitado"] : $usuarioData['barrio']);
                        $direccion = $funcion->antihack_mysqli(isset($_POST["direccionInvitado"]) ? $_POST["direccionInvitado"] : $usuarioData['direccion']);
                        $fecha = $usuarioData['fecha'];
                        $vendedor = $usuarioData['vendedor'];
                        $plan = $usuarioData['plan'];
                        $cod = $usuarioData['cod'];

                        $usuario->set("cod", $cod);
                        $usuario->set("nombre", $nombre);
                        $usuario->set("apellido", $apellido);
                        $usuario->set("telefono", $telefono);
                        $usuario->set("password", $password);
                        $usuario->set("postal", $postal);
                        $usuario->set("provincia", $provincia);
                        $usuario->set("localidad", $ciudad);
                        $usuario->set("barrio", $barrio);
                        $usuario->set("direccion", $direccion);
                        $usuario->set("invitado", 0);
                        $usuario->set("plan", $plan);
                        $usuario->set("vendedor", $vendedor);
                        $usuario->set("fecha", $fecha);

                        $usuario->edit();
                        $usuario->login();
                        $funcion->headerMove(URL . '/revisar');
                    endif;
                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Provincia</label>
                                    <select class="form-control" name="provinciaInvitado" id="provinciaInvitado">
                                        <option value="" selected disabled>Selecciona tu provincia</option>
                                        <option value="Córdoba" <?php if ($usuarioData['provincia'] == 'Córdoba') echo 'selected'; ?>>
                                            Córdoba
                                        </option>
                                        <option value="Buenos Aires" <?php if ($usuarioData['provincia'] == 'Buenos Aires') echo 'selected'; ?>>
                                            Buenos Aires
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <select class="form-control" name="ciudadInvitado" id="ciudadInvitado">
                                        <option value="" selected disabled>Selecciona tu localidad</option>
                                        <option value="San Francisco" <?php if ($usuarioData['localidad'] == 'San Francisco') echo 'selected'; ?>>
                                            San Francisco
                                        </option>
                                        <option value="Gran Buenos Aires Zona Sur" <?php if ($usuarioData['localidad'] == 'Gran Buenos Aires Zona Sur') echo 'selected'; ?>>
                                            Gran Buenos Aires Zona Sur
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Barrio</label>
                                    <input type="text" id="barrioInvitado" value="<?= $usuarioData['barrio'] ?>"
                                           name="barrioInvitado" class="form-control"
                                           placeholder="Barrio">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" id="direccionInvitado" value="<?= $usuarioData['direccion'] ?>"
                                           name="direccionInvitado"
                                           class="form-control" placeholder="Dirección">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="numeric" class="form-control" id="telefonoInvitado"
                                           value="<?= $usuarioData['telefono'] ?>"
                                           name="telefonoInvitado"
                                           placeholder="Teléfono">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn_full" name="completarPerfil" type="submit">Confirmar <i
                                            class="icon-right-open-5"></i></button>
                            </div>
                        </div>
                    </form>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-12 -->

        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

<?php $template->themeEnd() ?>