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

?>

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400" >

        <div id="subheader">
            <div id="sub_content">
                <h1>Invitado</h1>
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
                <li>invitado</li>
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
                    if (isset($_POST["invitado"])):
                        $nombre = $funcion->antihack_mysqli(isset($_POST["nombreInvitado"]) ? $_POST["nombreInvitado"] : '');
                        $apellido = $funcion->antihack_mysqli(isset($_POST["apellidoInvitado"]) ? $_POST["apellidoInvitado"] : '');
                        $telefono = $funcion->antihack_mysqli(isset($_POST["telefonoInvitado"]) ? $_POST["telefonoInvitado"] : '');
                        $provincia = $funcion->antihack_mysqli(isset($_POST["provinciaInvitado"]) ? $_POST["provinciaInvitado"] : '');
                        $ciudad = $funcion->antihack_mysqli(isset($_POST["ciudadInvitado"]) ? $_POST["ciudadInvitado"] : '');
                        $barrio = $funcion->antihack_mysqli(isset($_POST["barrioInvitado"]) ? $_POST["barrioInvitado"] : '');
                        $direccion = $funcion->antihack_mysqli(isset($_POST["direccionInvitado"]) ? $_POST["direccionInvitado"] : '');
                        $cod = substr(md5(uniqid(rand())), 0, 10);
                        $fecha = getdate();
                        $fecha = $fecha['year'] . '-' . $fecha['mon'] . '-' . $fecha['mday'];

                        $usuario->set("cod", $cod);
                        $usuario->set("nombre", $nombre);
                        $usuario->set("apellido", $apellido);
                        $usuario->set("telefono", $telefono);
                        $usuario->set("provincia", $provincia);
                        $usuario->set("localidad", $ciudad);
                        $usuario->set("barrio", $barrio);
                        $usuario->set("direccion", $direccion);
                        $usuario->set("invitado", 1);
                        $usuario->set("fecha", $fecha);
                        $usuario->set("email", $cod."@emailTemporal.foodie");
                        $usuario->set("password", $cod."passwordTemporal");

                        $usuario->add();
                        $usuario->login();
                        $funcion->headerMove(URL . '/revisar');
                    endif;
                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="nombreInvitado" name="nombreInvitado"
                                           placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" id="apellidoInvitado"
                                           name="apellidoInvitado"
                                           placeholder="Apellido">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="numeric" class="form-control" id="telefonoInvitado"
                                           name="telefonoInvitado"
                                           placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" value="Córdoba" name="provinciaInvitado">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <select class="form-control" name="ciudadInvitado" id="ciudadInvitado">
                                        <option value="" selected disabled>Selecciona tu provincia</option>
                                        <option value="San Francisco">San Francisco</option>
                                        <option value="La Francia">La Francia</option>
                                        <option value="Devoto">Devoto</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Barrio</label>
                                    <input type="text" id="barrioInvitado" name="barrioInvitado" class="form-control"
                                           placeholder="Barrio">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" id="direccionInvitado" name="direccionInvitado"
                                           class="form-control" placeholder="Dirección">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn_full" name="invitado" type="submit">Confirmar <i
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