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

<?php
if (isset($_POST["ubicacion"])):
    $provincia = $funcion->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
    $ciudad = $funcion->antihack_mysqli(isset($_POST["ciudad"]) ? $_POST["ciudad"] : '');
    $direccion = $funcion->antihack_mysqli(isset($_POST["direccion"]) ? $_POST["direccion"] : '');

    $ubicacion = $direccion . '-' . $ciudad . '-' . $provincia;
    $ubicacion = str_replace(" ", "-", $ubicacion);

    $funcion->headerMove(URL . '/restaurantes?ubicacion=' . $ubicacion);
endif;
?>

    <!-- SubHeader =============================================== -->
    <section class="header-video">
        <div id="hero_video">
            <div id="sub_content">
                <h1><b>¿Qué te gustaría comer?</b>  </h1>
                <p>
                    Ingresá colocando tu localidad y tu dirección para decirte que te queda más cerca 
                </p>
                <form method="post">
                    <div id="custom-search-input">
                        <input type="hidden" name="provincia" value="Córdoba">
                        <div class="col-md-5">
                            <div class="form-group">
                                <select class="form-control" name="ciudad" id="ciudad" required>
                                    <option value="" selected disabled>Seleccioná tu Ciudad</option>
                                    <option value="San Francisco">San Francisco</option>
                                    <option value="Gran Buenos Aires Zona Sur">Gran Buenos Aires Zona Sur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" class="form-control" name="direccion"
                                       placeholder="Escribí tu dirección">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" name="ubicacion" class="h40 btn_1" value="Buscar">
                        </div>
                    </div>
                </form>
            </div><!-- End sub_content -->
        </div>
        <img src="assets/img/video_fix.png" alt="" class="header-video--media" data-video-src="assets/video/intro"
             data-teaser-source="assets/video/intro" data-provider="Vimeo" data-video-width="1920"
             data-video-height="960">
    </section><!-- End Header video -->
    <!-- End SubHeader ============================================ -->

    <!-- Content ================================================== -->
    <div class="container margin_60">

        <div class="main_title">
            <h2 class="nomargin_top" style="padding-top:0"><b>¿Cómo funciona?</b></h2>
            <p>Es suuuuper fácil, buscas que te gustaría pedir, armas tu pedido y listo, te llega a casa y le abonas al vendedor <i class="em em-clap"></i></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box_home" id="one">
                    <span>1</span>
                    <h3>Ingresá tu dirección</h3>
                    <p>
                        Encontraremos todos los restaurantes cercanos en tu zona.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_home" id="two">
                    <span>2</span>
                    <h3>Elegí un restaurante</h3>
                    <p>
                        De todos los restaurantes disponibles elegí el de tu agrado.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
            <div class="box_home" id="four">
                    <span>3</span>
                    <h3>Disfrutá</h3>
                    <p>
                        ¡Disfrutá la comida que pediste!
                    </p>
                </div> 
            </div> 
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="high_light">
        <div class="container">
            <h3><b>¿Tenés un restó o negocio de comidas?</b> <i class="em em-pizza"></i></h3><br/>
            <p>Solicitá tu cuenta de vendedor haciendo click en el siguiente link.</p>
            <?php if (empty($_SESSION["usuarios"])): ?>
                <a href="#" data-toggle="modal" data-target="#register" onclick="Cambb()">SOLICITAR SER VENDEDOR</a>
            <?php else: ?>
                <a href="#" data-toggle="modal" data-target="#vendedor">SOLICITAR SER VENDEDOR</a>
            <?php endif; ?>
        </div><!-- End container -->
    </div>

    <!-- VENDEDOR -->
<?php
if (isset($_POST["vendedor"])):
    $nombre = $funcion->antihack_mysqli(isset($_POST["nombreVendedor"]) ? $_POST["nombreVendedor"] : '');
    $provincia = $funcion->antihack_mysqli(isset($_POST["provinciaVendedor"]) ? $_POST["provinciaVendedor"] : '');
    $localidad = $funcion->antihack_mysqli(isset($_POST["localidadVendedor"]) ? $_POST["localidadVendedor"] : '');
    $telefono = $funcion->antihack_mysqli(isset($_POST["telefonoUsuario"]) ? $_POST["telefonoUsuario"] : '');

    $usuario->set("cod", $_SESSION["usuarios"]['cod']);
    $usuario->set("email", $_SESSION["usuarios"]['email']);
    $usuario->editUnico("telefono", $telefono);
    $usuario->editUnico("vendedor", 2);

    ?>
    <script>
        $(document).ready(function () {
            $('#modalOK').modal("show");
        });
    </script>
<?php
endif;
?>

    <div class="modal fade" id="vendedor" tabindex="-1" role="dialog" aria-labelledby="myVendedor" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <p id="errorVendedor"></p>
                <form class="popup-form" id="myVendedor" method="post">
                    <div class="login_icon"><i class="icon_lock_alt"></i></div>
                    <input type="text" class="form-control form-white" name="nombreVendedor"
                           placeholder="Nombre de tu restaurtante / negocio" required>
                    <div class="row">
                        <label class="col-md-6 col-xs-6">
                            <select class="form-control" name="provinciaVendedor" id="provincia" required>
                                <option value="" selected disabled>Provincia</option>
                                <?php// $funcion->provincias() ?>
                                <option value="Córdoba" >Córdoba</option>
                                <option value="Buenos Aires" >Buenos Aires</option>
                            </select>
                        </label>
                        <label class="col-md-6 col-xs-6">
                            <select class="form-control" name="localidadVendedor" <!--id="localidad"--> required>
                                <option value="" selected disabled>Localidad</option>
                                <option value="San Francisco">San Francisco</option>
                                <option value="Gran Buenos Aires Zona Sur">Gran Buenos Aires Zona Sur</option>
                            </select>
                        </label>
                    </div>
                    <?php if (empty($_SESSION["usuarios"]["telefono"])): ?>
                        <input type="text" class="form-control form-white" name="telefonoUsuario"
                               placeholder="Tu teléfono personal" required>
                    <?php endif; ?>
                    <button type="submit" name="vendedor" class="btn btn-submit">Solicitar</button>
                </form>
            </div>
        </div>
    </div><!-- End Register modal -->

    <div class="modal fade" id="modalOK" tabindex="-1" role="dialog" aria-labelledby="modalOK" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <br/>
                <div id="confirm">
                    <i class="icon_check_alt2 text_white"></i>
                    <h3 class="text_white">¡Tu solicitud fue enviada correctamente!</h3>
                </div>
                <br/>
                <div class="alert alert-success" role="alert">¡Tu solicitud fue enviada correctamente!. Te vamos a
                    avisar
                    por email o teléfono cuando te habilitemos.
                </div>
            </div>
        </div>
    </div><!-- End Register modal -->

<?php $template->themeEnd() ?>

    <div class="layer"></div><!-- Mobile menu overlay mask -->

    <!-- SPECIFIC SCRIPTS -->
    <script src="assets/js/video_header.js"></script>
    <script>
        $(document).ready(function () {
            'use strict';
            HeaderVideo.init({
                container: $('.header-video'),
                header: $('.header-video--media'),
                videoTrigger: $("#video-trigger"),
                autoPlayVideo: true
            });

        });
    </script>
    <script>
        function Cambb(){
            $(document).ready(function () {
                $("#senalVendedor").html('<input name="senalVendedor" value="1" type="hidden">');
            });
        }
    </script>