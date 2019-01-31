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
$imagenesEmpresa = new Clases\Imagenes();
$imagenesMenu = new Clases\Imagenes();
$zebra = new Clases\Zebra_Image();
$empresa = new Clases\Empresas();
$menu = new Clases\Productos();
$categoria = new Clases\Categorias();
$seccion = new Clases\Secciones();
$envio = new Clases\Envios();

$cod_usuario = $_SESSION['usuarios']['cod'];
$empresa->set("cod_usuario", $cod_usuario);
$empresaData = $empresa->view();
$filterEmpresa = array("cod = '$empresaData[cod]'");
$imagenesArrayEmpresa = $imagenesEmpresa->list($filterEmpresa, "", "");

$usuario->set("cod", $cod_usuario);
$usuarioData = $usuario->view();

$filterEnvios = array("cod_empresa = '" . $empresaData['cod'] . "'");
$enviosArray = $envio->list($filterEnvios, "", "");
if (empty($enviosArray)) {
    $enviosArray = array(0 => array("titulo" => "", "precio" => ""));
}

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 10;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if (@count($_GET) > 1) {
    $anidador = "&";
} else {
    $anidador = "?";
}

if (isset($_GET['pagina'])):
    $url = $funcion->eliminar_get(CANONICAL, 'pagina');
else:
    $url = CANONICAL;
endif;

$filterMenu = array("cod_empresa = '" . $empresaData['cod'] . "'");
$menuArray = $menu->list($filterMenu, "", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $menu->paginador($filterMenu, $cantidad);

if (isset($_GET['pagina'])):
    $funcion->headerMove(CANONICAL . '#seccion-2');
endif;
?>

<?php if ($_SESSION["usuarios"]["vendedor"] == 0):
    $displaySeccion = "style=\"display: none\"";
    $displayTab = "style=\"display: none\"";
    $classSeccion = "class=\"content-current\"";
    $classTab = "class=\"tab-current\"";
else:
    $displaySeccion = "";
    $displayTab = "";
    $classSeccion = "";
    $classTab = "";
endif; ?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400">
    <div id="subheader">
        <div id="sub_content">
            <h1>Panel de usuario</h1>
            <p>Administra todas tus configuraciones desde acá</p>
            <p></p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Inicio</a>
            </li>
            <li>Panel de Usuario</li>
        </ul>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60">
    <div id="tabs" class="tabs">
        <nav>
            <ul>
                <li id="tab1" <?= $displayTab; ?>><a href="<?= URL ?>/panel#seccion-1" class="icon-profile"><span>Empresa</span></a>
                </li>
                <li class="hidden-plan1" id="tab2" <?= $displayTab; ?>><a href="<?= URL ?>/panel#seccion-2" class="icon-menut-items"><span>Menús</span></a>
                </li>
                <li id="tab3" <?= $classTab ?>><a href="<?= URL ?>/panel#seccion-3"
                                                  class="icon-settings"><span>Perfil</span></a>
                </li>
            </ul>
        </nav>
        <div class="content">
            <section id="seccion-1" <?= $displaySeccion ?>>
                <?php $filterCrearEmpresa = array("cod_usuario = '" . $_SESSION['usuarios']['cod'] . "'");
                $existeEmpresa = $empresa->list($filterCrearEmpresa, "", "");
                if (!empty($existeEmpresa)):
                    $mostrardivEmpresa = 'style = "display: none;"';
                    $mostrardivEmpresa2 = '';
                else:
                    $mostrardivEmpresa = '';
                    $mostrardivEmpresa2 = 'style = "display: none;"';
                endif; ?>
                <div class="col-md-offset-3 col-md-6" <?= $mostrardivEmpresa ?>>
                    <div class="box_style_2">
                        <div id="confirm">
                            <i class="icon-shop-1"></i>
                            <h3>¡Completá los datos de tu empresa y empezá a vender!</h3>
                        </div>
                        <a href="<?= URL ?>/crear_empresa" class="btn_full">Crear Empresa</a>
                    </div>
                </div>

                <div <?= $mostrardivEmpresa2 ?>>
                    <?php if (isset($_POST["modificarEmpresa"])):

                        $titulo = $funcion->antihack_mysqli(!empty($_POST["tituloEmpresa"]) ? $_POST["tituloEmpresa"] : $empresaData['titulo']);
                        $desarrollo = $funcion->antihack_mysqli(!empty($_POST["desarrolloEmpresa"]) ? $_POST["desarrolloEmpresa"] : $empresaData['desarrollo']);
                        $telefono = $funcion->antihack_mysqli(!empty($_POST["telefonoEmpresa"]) ? $_POST["telefonoEmpresa"] : $empresaData['telefono']);
                        $email = $funcion->antihack_mysqli(!empty($_POST["emailEmpresa"]) ? $_POST["emailEmpresa"] : $empresaData['email']);
                        $provincia = $funcion->antihack_mysqli(!empty($_POST["provinciaEmpresa"]) ? $_POST["provinciaEmpresa"] : $empresaData['provincia']);
                        $ciudad = $funcion->antihack_mysqli(!empty($_POST["ciudadEmpresa"]) ? $_POST["ciudadEmpresa"] : $empresaData['ciudad']);
                        $barrio = $funcion->antihack_mysqli(!empty($_POST["barrioEmpresa"]) ? $_POST["barrioEmpresa"] : $empresaData['barrio']);
                        $direccion = $funcion->antihack_mysqli(!empty($_POST["direccionEmpresa"]) ? $_POST["direccionEmpresa"] : $empresaData['direccion']);
                        $postal = $funcion->antihack_mysqli(!empty($_POST["postalEmpresa"]) ? $_POST["postalEmpresa"] : $empresaData['postal']);

                        if ($direccion != $empresaData['direccion'] || $ciudad != $empresaData['ciudad'] || $provincia != $empresaData['provincia']):
                            $ubicacionEmpresa = $direccion . '+' . $ciudad . '+' . $provincia;
                            $ubicacionEmpresa = str_replace("-", "+", $funcion->normalizar_link($ubicacionEmpresa));
                            var_dump($ubicacionEmpresa);
                            $jsonEmpresa = json_decode(file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=Nkd7zJVtg6iaOyaQoEvK&app_code=HTkK8DlaV14bg6RDCA-pQA&searchtext=' . $ubicacionEmpresa));
                            $empresaLongitud = $jsonEmpresa->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;
                            $empresaLatitud = $jsonEmpresa->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
                            $coordenadas = $empresaLatitud . ',' . $empresaLongitud;
                        else:
                            $coordenadas = $empresaData['coordenadas'];
                        endif;

                        $empresa->set("id", $empresaData['id']);
                        $empresa->set("cod", $empresaData['cod']);
                        $empresa->set("fecha", $empresaData['fecha']);
                        $empresa->set("cod_usuario", $empresaData['cod_usuario']);
                        $empresa->set("titulo", $titulo);
                        $empresa->set("desarrollo", $desarrollo);
                        $empresa->set("telefono", $telefono);
                        $empresa->set("email", $email);
                        $empresa->set("provincia", $provincia);
                        $empresa->set("ciudad", $ciudad);
                        $empresa->set("barrio", $barrio);
                        $empresa->set("direccion", $direccion);
                        $empresa->set("postal", $postal);
                        $empresa->set("coordenadas", $coordenadas);

                        if (!$_POST["enviosEmpresa1"]) {
                            $envio->set("cod_empresa", $empresaData['cod']);
                            $envio->delete();
                            for ($i = 0; $i < count($_POST["enviosEmpresa1"]); $i++) {
                                if (!empty($_POST["enviosEmpresa1"][$i])) {
                                    $cod_envios = substr(md5(uniqid(rand())), 0, 10);
                                    $envio1 = $funcion->antihack_mysqli(!empty($_POST["enviosEmpresa1"][$i]) ? $_POST["enviosEmpresa1"][$i] : '');
                                    $envio2 = $funcion->antihack_mysqli(!empty($_POST["enviosEmpresa2"][$i]) ? $_POST["enviosEmpresa2"][$i] : '');

                                    $envio->set("cod", $cod_envios);
                                    $envio->set("titulo", $envio1);
                                    $envio->set("precio", $envio2);
                                    $envio->set("cod_empresa", $empresaData['cod']);

                                    $envio->add();
                                }
                            }
                        } else {
                            $cod_envios = substr(md5(uniqid(rand())), 0, 10);
                            $envio1 = "Retiro en sucursal";
                            $envio2 = 0;

                            $envio->set("cod", $cod_envios);
                            $envio->set("titulo", $envio1);
                            $envio->set("precio", $envio2);
                            $envio->set("cod_empresa", $empresaData['cod']);

                            $envio->deleteAll();
                            $envio->add();
                        }

                        if (!empty($_FILES["logoEmpresa"]["name"])):
                            //logo
                            $imgInicio = $_FILES["logoEmpresa"]["tmp_name"];
                            $tucadena = $_FILES["logoEmpresa"]["name"];
                            $partes = explode(".", $tucadena);
                            $dom = (count($partes) - 1);
                            $dominio = $partes[$dom];
                            $prefijo = substr(md5(uniqid(rand())), 0, 10);
                            if ($dominio != ''):
                                $destinoFinal = "assets/archivos/" . $prefijo . "." . $dominio;
                                move_uploaded_file($imgInicio, $destinoFinal);
                                chmod($destinoFinal, 0777);
                                $destinoRecortado = "assets/archivos/recortadas/a_" . $prefijo . "." . $dominio;

                                $zebra->source_path = $destinoFinal;
                                $zebra->target_path = $destinoRecortado;
                                $zebra->jpeg_quality = 80;
                                $zebra->preserve_aspect_ratio = true;
                                $zebra->enlarge_smaller_images = true;
                                $zebra->preserve_time = true;

                                if ($zebra->resize(800, 700, ZEBRA_IMAGE_NOT_BOXED)):
                                    unlink($destinoFinal);
                                endif;

                                $empresa->set("logo", str_replace("../", "", $destinoRecortado));
                            endif;
                        //logo
                        else:
                            $empresa->set("logo", $empresaData['logo']);
                        endif;

                        if (!empty($_FILES["portadaEmpresa"]["name"])):
                            //portada
                            $imgInicio = $_FILES["portadaEmpresa"]["tmp_name"];
                            $tucadena = $_FILES["portadaEmpresa"]["name"];
                            $partes = explode(".", $tucadena);
                            $dom = (count($partes) - 1);
                            $dominio = $partes[$dom];
                            $prefijo = substr(md5(uniqid(rand())), 0, 10);
                            if ($dominio != ''):
                                $destinoFinal = "assets/archivos/" . $prefijo . "." . $dominio;
                                move_uploaded_file($imgInicio, $destinoFinal);
                                chmod($destinoFinal, 0777);
                                $destinoRecortado = "assets/archivos/recortadas/a_" . $prefijo . "." . $dominio;

                                $zebra->source_path = $destinoFinal;
                                $zebra->target_path = $destinoRecortado;
                                $zebra->jpeg_quality = 80;
                                $zebra->preserve_aspect_ratio = true;
                                $zebra->enlarge_smaller_images = true;
                                $zebra->preserve_time = true;

                                if ($zebra->resize(800, 700, ZEBRA_IMAGE_NOT_BOXED)):
                                    unlink($destinoFinal);
                                endif;

                                $empresa->set("portada", str_replace("../", "", $destinoRecortado));
                            endif;
                        //portada
                        else:
                            $empresa->set("portada", $empresaData['portada']);
                        endif;

                        if (!empty($_FILES["filesEmpresa"]["name"])):
                            //galeria
                            $count = 0;
                            foreach ($_FILES['filesEmpresa']['name'] as $f => $name) {
                                $imgInicio = $_FILES["filesEmpresa"]["tmp_name"][$f];
                                $tucadena = $_FILES["filesEmpresa"]["name"][$f];
                                $partes = explode(".", $tucadena);
                                $dom = (count($partes) - 1);
                                $dominio = $partes[$dom];
                                $prefijo = substr(md5(uniqid(rand())), 0, 10);
                                if ($dominio != '') {
                                    $destinoFinal = "assets/archivos/" . $prefijo . "." . $dominio;
                                    move_uploaded_file($imgInicio, $destinoFinal);
                                    chmod($destinoFinal, 0777);
                                    $destinoRecortado = "assets/archivos/recortadas/a_" . $prefijo . "." . $dominio;

                                    $zebra->source_path = $destinoFinal;
                                    $zebra->target_path = $destinoRecortado;
                                    $zebra->jpeg_quality = 80;
                                    $zebra->preserve_aspect_ratio = true;
                                    $zebra->enlarge_smaller_images = true;
                                    $zebra->preserve_time = true;

                                    if ($zebra->resize(800, 700, ZEBRA_IMAGE_NOT_BOXED)) {
                                        unlink($destinoFinal);
                                    }

                                    $imagenesEmpresa->set("cod", $empresaData['cod']);
                                    $imagenesEmpresa->set("ruta", str_replace("../", "", $destinoRecortado));
                                    $imagenesEmpresa->add();
                                }

                                $count++;
                            }
                            //galeria
                        endif;

                        $empresa->edit();
                        $funcion->headerMove(URL . '/panel');
                    endif;
                    ?>

                    <div class="indent_title_in">
                        <i class="icon_house_alt"></i>
                        <h3>Datos de la empresa</h3>
                        <p>Completa los datos de tu empresa.</p>
                    </div>

                    <div class="wrapper_indent">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre de la empresa</label>
                                        <input class="form-control" value="<?php if (!empty($empresaData['titulo'])) {
                                            echo $empresaData['titulo'];
                                        } ?>" name="tituloEmpresa" id="tituloEmpresa" type="text"
                                               placeholder="Ej. Restaurante Argentino">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción de la empresa</label>
                                <textarea class="wysihtml5 form-control" name="desarrolloEmpresa"
                                          placeholder="Breve descripción ..."
                                          style="height: 200px;">
                        <?php if (!empty($empresaData['desarrollo'])) {
                            echo $empresaData['desarrollo'];
                        } ?>

                    </textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" value="<?php if (!empty($empresaData['telefono'])) {
                                            echo $empresaData['telefono'];
                                        } ?>" id="telefonoEmpresa" name="telefonoEmpresa" class="form-control"
                                               placeholder="Ej. 111 123456">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" value="<?php if (!empty($empresaData['email'])) {
                                            echo $empresaData['email'];
                                        } ?>" id="emailEmpresa" name="emailEmpresa" class="form-control"
                                               placeholder="Ej. ventas@mirestaurante.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn_full" name="modificarEmpresa" type="submit">Modificar Datos<i
                                                class="icon-right-open-5"></i></button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End wrapper_indent -->

                    <hr class="styled_2">

                    <div class="hidden-plan1 hidden-plan2 indent_title_in">
                        <i class="icon_pin_alt"></i>
                        <h3>Datos de envío</h3>
                        <p>
                            Completa los datos sobre la forma de envío y su costo.
                        </p>
                        <div class="row">
                            <div class="col-md-3"><br/>
                                <button class="btn_full" id="link1" href="#">Modificar</button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-plan1 hidden-plan2 wrapper_indent" id="enviosEmpresa" style="display: none;">
                        <form method="post">
                            <h2 class="inner">Envíos</h2>
                            <div class="row">
                                <?php foreach ($enviosArray as $key => $value) { ?>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <input type="text" value="<?= $value['titulo'] ?>" id="enviosEmpresa1" name="enviosEmpresa1[]" class="form-control"
                                                   placeholder="Ej. Envío zona centro">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Costo</label>
                                            <input type="number" value="<?= $value['precio'] ?>" id="enviosEmpresa2" name="enviosEmpresa2[]" class="form-control"
                                                   placeholder="Ej. 50">
                                        </div>
                                    </div>
                                <?php } ?>
                                <a class="MasCampos col-md-12" href="#" id="mascamposEnvios"><i
                                            class="icon_plus_alt"></i> Agregar más campos</a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn_full" name="modificarEmpresa" type="submit">Modificar Datos<i
                                                class="icon-right-open-5"></i></button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End wrapper_indent -->

                    <hr class="hidden-plan1 hidden-plan2 styled_2">

                    <div class="indent_title_in">
                        <i class="icon_pin_alt"></i>
                        <h3>Datos de ubicación</h3>
                        <p>
                            Completa los datos sobre la ubicación de tu empresa.
                        </p>
                        <div class="row">
                            <div class="col-md-3"><br/>
                                <button class="btn_full" id="link2" href="#">Modificar</button>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper_indent" id="ubicacionEmpresa" style="display: none;">
                        <form method="post">
                            <h2 class="inner">Ubicación</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provincia</label>
                                        <select class="form-control" name="provinciaEmpresa" id="provinciaEmpresa">
                                            <option value="" selected disabled>Seleccionar provincia</option>
                                            <option value="Córdoba" <?php if ($empresaData['provincia'] == 'Córdoba') {
                                                echo 'selected';
                                            } ?>>Córdoba
                                            </option>
                                            <option value="Buenos Aires" <?php if ($empresaData['provincia'] == 'Buenos Aires') {
                                                echo 'selected';
                                            } ?>>Buenos Aires
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <select class="form-control" name="ciudadEmpresa" id="ciudadEmpresa">
                                            <option value="" selected disabled>Seleccionar ciudad</option>
                                            <option value="San Francisco" <?php if ($empresaData['ciudad'] == 'San Francisco') {
                                                echo 'selected';
                                            } ?>>San Francisco
                                            </option>
                                            <option value="Gran Buenos Aires Zona Sur" <?php if ($empresaData['ciudad'] == 'Gran Buenos Aires Zona Sur') {
                                                echo 'selected';
                                            } ?>>Gran Buenos Aires Zona Sur
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Barrio</label>
                                        <input type="text" value="<?php if (!empty($empresaData['barrio'])) {
                                            echo $empresaData['barrio'];
                                        } ?>" id="barrioEmpresa" name="barrioEmpresa" class="form-control"
                                               placeholder="Ej. Las Rosas">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" value="<?php if (!empty($empresaData['direccion'])) {
                                            echo $empresaData['direccion'];
                                        } ?>" id="direccionEmpresa" name="direccionEmpresa" class="form-control"
                                               placeholder="Ej. Urquiza 555">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Código Postal</label>
                                        <input type="text" value="<?php if (!empty($empresaData['postal'])) {
                                            echo $empresaData['postal'];
                                        } ?>" id="postalEmpresa" name="postalEmpresa" class="form-control"
                                               placeholder="Ej. 2400">
                                    </div>
                                </div>
                            </div><!--End row -->
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn_full" name="modificarEmpresa" type="submit">Modificar Datos<i
                                                class="icon-right-open-5"></i></button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End wrapper_indent -->

                    <hr class="styled_2">
                    <div class="indent_title_in">
                        <i class="icon_images"></i>
                        <h3>Imágenes de tu empresa</h3>
                        <p>
                            Logo y demás imágenes de tu empresa.
                        </p>
                        <div class="row">
                            <div class="col-md-3"><br/>
                                <button class="btn_full" id="link3" href="#">Modificar</button>
                            </div>
                        </div>
                    </div>

                    <div class="wrapper_indent add_bottom_45" id="imagenesEmpresa" style="display: none;">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <h3>Logo</h3>
                                <label>Logo de tu empresa</label><br/>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php if ($empresaData['logo'] != '') { ?>
                                            <img src="<?= URL; ?>/<?= $empresaData['logo']; ?>" width="100%"/>
                                        <?php } else { ?>
                                            <img src="<?= URL; ?>/assets/archivos/sin_imagen.jpg" width="100%"/>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="col-md-12">
                                        <input type="file" id="logoEmpresa" name="logoEmpresa"/>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <div class="hidden-plan1 form-group">
                                <h3>Portada</h3>
                                <label>Portada de tu empresa</label><br/>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php if ($empresaData['portada'] != '') { ?>
                                            <img src="<?= URL; ?>/<?= $empresaData['portada']; ?>" width="100%"/>
                                        <?php } else { ?>
                                            <img src="<?= URL; ?>/assets/archivos/sin_imagen.jpg" width="100%"/>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <div class="col-md-12">
                                        <input type="file" id="portadaEmpresa" name="portadaEmpresa"/>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <div class="hidden-plan1 row">
                                <h3>Galería</h3>
                                <label>Galería de fotos de tu empresa</label><br/>
                                <div class="col-md-12">
                                    <div class="row">
                                        <?php if (!empty($imagenesArrayEmpresa)) {
                                            foreach ($imagenesArrayEmpresa as $key => $value): ?>
                                                <div class="col-md-2">
                                                    <img src="<?= URL; ?>/<?= $value['ruta']; ?>" width="100%">
                                                </div>
                                            <?php endforeach;
                                        } else { ?>
                                            <div class="col-md-2">
                                                <img src="<?= URL; ?>/assets/archivos/sin_imagen.jpg" width="100%"/>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br/>
                                <div class="form-group">
                                    <input type="file" id="filesEmpresa" name="filesEmpresa[]" multiple="multiple"/>
                                </div>
                                <hr>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn_full btn btn-primary" name="modificarEmpresa" type="submit">
                                        Modificar
                                        Datos
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End wrapper_indent -->
                </div>
            </section><!-- End section 1 -->

            <section class="hidden-plan1" id="seccion-2" <?= $displaySeccion ?>>
                <?php $filterCrearMenu = array("cod_empresa = '" . $empresaData['cod'] . "'");
                $existeMenu = $menu->list($filterCrearMenu, "", "");
                if (!empty($existeMenu)):
                    $mostrardivMenu = 'style = "display: none;"';
                    $mostrardivMenu2 = '';
                else:
                    $mostrardivMenu = '';
                    $mostrardivMenu2 = 'style = "display: none;"';
                endif; ?>

                <div class="col-md-offset-3 col-md-6" <?= $mostrardivEmpresa ?>>
                    <div class="box_style_2">
                        <div id="confirm">
                            <i class="icon-shop-1"></i>
                            <h3>¡Antes de crear un menú, necesitamos que crees tu empresa!</h3>
                        </div>
                        <a href="<?= URL ?>/crear_empresa" class="btn_full">Crear Empresa</a>
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-6" <?= $mostrardivEmpresa2 ?> <?= $mostrardivMenu ?>>
                    <div class="box_style_2">
                        <div id="confirm">
                            <i class="icon-food"></i>
                            <h3>¡Añadí los menús que ofrece tu restaurante / negocio y empezá a vender!</h3>
                        </div>
                        <a href="<?= URL ?>/crear-menu" class="btn_full">Crear Menú</a>
                    </div>
                </div>

                <div <?= $mostrardivMenu2 ?>>
                    <div class="indent_title_in">
                        <i class="icon_document_alt"></i>
                        <h3>Modificar Menús</h3>
                        <p>Especifique a continuación los detalles del menú.</p>
                    </div>
                    <div class="wrapper_indent">

                        <a href="<?= URL; ?>/crear-menu" class="btn_1"><i class="icon-plus"></i> Añadir menú</a>
                        <a href="<?= URL; ?>/secciones" class="btn_1"><i class="icon-th-thumb-empty"></i> Administrar secciones</a><br/>
                        <?php foreach ($menuArray as $key => $value):
                            $imagenesMenu->set("cod", $value['cod']);
                            $imagenMenuData = $imagenesMenu->view();
                            $categoria->set("cod", $value['categoria']);
                            $categoriaData = $categoria->view();
                            $seccion->set("cod", $value['seccion']);
                            $seccionData = $seccion->view(); ?>
                            <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        <div class="desc">
                                            <div class="thumb_strip">
                                                <a href="<?= URL; ?>/modificar-menu/<?= $value['cod'] ?>"><img
                                                            src="<?= URL; ?>/<?= $imagenMenuData['ruta'] ?>" alt=""></a>
                                            </div>
                                            <h3><?= $value['titulo'] ?></h3>
                                            <div class="type">
                                                <?= $categoriaData['titulo']; ?>
                                            </div>
                                            <div class="location">
                                                Stock: <?= $value['stock'] ?><br/>
                                                Sección: <?= $seccionData['titulo'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="go_to">
                                            <div>
                                                <a href="<?= URL; ?>/modificar-menu/<?= $value['cod'] ?>" class="btn_1">Modificar
                                                    menú</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End row-->
                            </div><!-- End strip_list-->
                        <?php endforeach; ?>
                        <div class="text_center">
                            <ul class="pagination">
                                <?php if (($pagina + 1) > 1): ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="<?= $url ?><?= $anidador ?>pagina=<?= $pagina ?>"><span
                                                    aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Anterior</span></a></li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $numeroPaginas; $i++): ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="<?= $url ?><?= $anidador ?>pagina=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if (($pagina + 2) <= $numeroPaginas): ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="<?= $url ?><?= $anidador ?>pagina=<?= ($pagina + 2) ?>"><span
                                                    aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section><!-- End section 2 -->

            <section id="seccion-3" <?= $classSeccion ?>>
                <?php
                if (isset($_POST["modificarPerfil"])):

                    $nombre = $funcion->antihack_mysqli(!empty($_POST["nombrePerfil"]) ? $_POST["nombrePerfil"] : $usuarioData['nombre']);
                    $apellido = $funcion->antihack_mysqli(!empty($_POST["apellidoPerfil"]) ? $_POST["apellidoPerfil"] : $usuarioData['apellido']);
                    $email = $funcion->antihack_mysqli(!empty($_POST["emailPerfil"]) ? $_POST["emailPerfil"] : $usuarioData['email']);
                    $provincia = $funcion->antihack_mysqli(!empty($_POST["provinciaPerfil"]) ? $_POST["provinciaPerfil"] : $usuarioData['provincia']);
                    $localidad = $funcion->antihack_mysqli(!empty($_POST["localidadPerfil"]) ? $_POST["localidadPerfil"] : $usuarioData['localidad']);
                    $direccion = $funcion->antihack_mysqli(!empty($_POST["direccionPerfil"]) ? $_POST["direccionPerfil"] : $usuarioData['direccion']);
                    $telefono = $funcion->antihack_mysqli(!empty($_POST["telefonoPerfil"]) ? $_POST["telefonoPerfil"] : $usuarioData['telefono']);
                    $postal = $funcion->antihack_mysqli(!empty($_POST["postalPerfil"]) ? $_POST["postalPerfil"] : $usuarioData['postal']);
                    $plan = $usuarioData['plan']);
                    $vendedor = $usuarioData['vendedor']);
                    if (!empty($_POST["new_passwordPerfil"]) && !empty($_POST["new_password2Perfil"]) && !empty($_POST["old_passwordPerfil"])):
                        if ($_POST["old_passwordPerfil"] == $usuarioData['password']):
                            if ($_POST["new_passwordPerfil"] == $_POST["new_password2Perfil"]):
                                $password = $funcion->antihack_mysqli($_POST["new_passwordPerfil"]);
                            else:
                                echo '<div class="alert alert-warning" role="alert">Las contraseña nueva no coincide con la confirmación</div>';
                                $password = $usuarioData['password'];
                            endif;
                        else:
                            echo '<div class="alert alert-warning" role="alert">Ha escrito mal su contraseña actual</div>';
                            $password = $usuarioData['password'];
                        endif;
                    else:
                        $password = $usuarioData['password'];
                    endif;

                    $usuario->set("cod", $usuarioData['cod']);
                    $usuario->set("nombre", $nombre);
                    $usuario->set("apellido", $apellido);
                    $usuario->set("email", $email);
                    $usuario->set("provincia", $provincia);
                    $usuario->set("localidad", $localidad);
                    $usuario->set("barrio", $barrio);
                    $usuario->set("direccion", $direccion);
                    $usuario->set("telefono", $telefono);
                    $usuario->set("postal", $postal);
                    $usuario->set("password", $password);
                    $usuario->set("vendedor", $vendedor);
                    $usuario->set("plan", $plan);
                    $usuario->set("fecha", $usuarioData['fecha']);

                    $usuario->edit();
                    $funcion->headerMove(URL . '/panel');
                endif;
                ?>
                <div class="row">
                    <div class="col-md-6 col-sm-6 add_bottom_15">
                        <form method="post">
                            <div class="indent_title_in">
                                <i class="icon_mail_alt"></i>
                                <h3>Modificar Datos</h3>
                                <p>
                                    Completa los siguientes campos:
                                </p>
                            </div>
                            <div class="wrapper_indent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control"
                                                   value="<?php if (!empty($usuarioData['nombre'])) {
                                                       echo $usuarioData['nombre'];
                                                   } ?>" name="nombrePerfil" id="nombrePerfil" type="text"
                                                   placeholder="Ej. Jorge">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input class="form-control"
                                                   value="<?php if (!empty($usuarioData['apellido'])) {
                                                       echo $usuarioData['apellido'];
                                                   } ?>" name="apellidoPerfil" id="apellidoPerfil" type="text"
                                                   placeholder="Ej. Pérez">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" value="<?php if (!empty($usuarioData['email'])) {
                                        echo $usuarioData['email'];
                                    } ?>" name="emailPerfil" id="emailPerfil" type="email"
                                           placeholder="Ej. jorge@tumail.com">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <label>Provincia</label>
                                        <select class="form-control" name="provinciaPerfil" id="provincia" required>
                                            <option value="" selected disabled>Provincia</option>
                                            <?php $funcion->provincias() ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <label>Localidad</label>
                                        <select class="form-control" name="localidadPerfil" id="localidad" required>
                                            <option value="" selected disabled>Localidad</option>
                                        </select>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input class="form-control" value="<?php if (!empty($usuarioData['direccion'])) {
                                        echo $usuarioData['direccion'];
                                    } ?>" name="direccionPerfil" id="direccionPerfil" type="text"
                                           placeholder="Ej. Av. Urquiza 369">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <label>Teléfono</label>
                                        <div class="form-group">
                                            <input class="form-control"
                                                   value="<?php if (!empty($usuarioData['telefono'])) {
                                                       echo $usuarioData['telefono'];
                                                   } ?>" name="telefonoPerfil" id="telefonoPerfil" type="text"
                                                   placeholder="Ej. 3564555555">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <label>Postal</label>
                                        <div class="form-group">
                                            <input class="form-control"
                                                   value="<?php if (!empty($usuarioData['postal'])) {
                                                       echo $usuarioData['postal'];
                                                   } ?>" name="postalPerfil" id="postalPerfil" type="text"
                                                   placeholder="Ej. 2400">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="modificarPerfil" class="btn_1 green">Modificar Datos
                                </button>
                            </div><!-- End wrapper_indent -->
                        </form>
                    </div>

                    <div class="col-md-6 col-sm-6 add_bottom_15">
                        <form method="post">
                            <div class="indent_title_in">
                                <i class="icon_lock_alt"></i>
                                <h3>Modificar contraseña</h3>
                                <p>
                                    Completa los siguientes campos:
                                </p>
                            </div>
                            <div class="wrapper_indent">
                                <div class="form-group">
                                    <label>Contraseña actual</label>
                                    <input class="form-control" name="old_passwordPerfil" id="old_passwordPerfil"
                                           type="password" placeholder="********">
                                </div>
                                <div class="form-group">
                                    <label>Nueva contraseña</label>
                                    <input class="form-control" name="new_passwordPerfil" id="new_passwordPerfil"
                                           type="password" placeholder="Ej. Azf45D3yU">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar nueva contraseña</label>
                                    <input class="form-control" name="new_password2Perfil" id="new_password2Perfil"
                                           type="password" placeholder="Ej. Azf45D3yU">
                                </div>
                                <button type="submit" name="modificarPerfil" class="btn_1 green">Modificar contraseña
                                </button>
                            </div><!-- End wrapper_indent -->
                        </form>
                    </div>

                </div><!-- End row -->

                <hr class="styled_2">
            </section><!-- End section 3 -->

        </div><!-- End content -->
    </div>
</div><!-- End container  -->
<!-- End Content =============================================== -->

<?php $template->themeEnd() ?>

<!-- Specific scripts -->
<script src="<?= URL ?>/assets/js/tabs.js"></script>
<script>
    new CBPFWTabs(document.getElementById('tabs'));

    var str = window.location.href;
    var n2 = str.search('#seccion-2');
    var n3 = str.search('#seccion-3');
    if (n2 > -1) {
        $("#seccion-2").addClass("content-current");
        $("#seccion-1").removeClass("content-current");
        $("#tab2").addClass("tab-current");
        $("#tab1").removeClass("tab-current");
    }
    if (n3 > -1) {
        $("#seccion-3").addClass("content-current");
        $("#seccion-1").removeClass("content-current");
        $("#tab3").addClass("tab-current");
        $("#tab1").removeClass("tab-current");
    }

    document.getElementById('tab1').addEventListener('click', function () {
        $("#tab2").removeClass("tab-current");
        $("#seccion-2").removeClass("content-current");
        $("#tab3").removeClass("tab-current");
        $("#seccion-3").removeClass("content-current");
    }, false);

    document.getElementById('tab2').addEventListener('click', function () {
        $("#tab1").removeClass("tab-current");
        $("#seccion-1").removeClass("content-current");
        $("#tab3").removeClass("tab-current");
        $("#seccion-3").removeClass("content-current");
    }, false);

    document.getElementById('tab3').addEventListener('click', function () {
        $("#tab1").removeClass("tab-current");
        $("#seccion-1").removeClass("content-current");
        $("#tab2").removeClass("tab-current");
        $("#seccion-2").removeClass("content-current");
    }, false);
</script>

<script>
    document.getElementById('link1').addEventListener('click', function () {
        document.getElementById('enviosEmpresa').style.display = 'block';
        document.getElementById('link1').style.display = 'none';
    }, false);
    document.getElementById('link2').addEventListener('click', function () {
        document.getElementById('ubicacionEmpresa').style.display = 'block';
        document.getElementById('link2').style.display = 'none';
    }, false);
    document.getElementById('link3').addEventListener('click', function () {
        document.getElementById('imagenesEmpresa').style.display = 'block';
        document.getElementById('link3').style.display = 'none';
    }, false);
</script>

<script src="<?= URL ?>/assets/js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript">
    $('.wysihtml5').wysihtml5({});
</script>

<script>//Script para arrastrar imagenes
    dropContainer.ondragover = dropContainer.ondragenter = function (evt) {
        evt.preventDefault();
    };

    dropContainer.ondrop = function (evt) {
        fileInput.files = evt.dataTransfer.files;
        evt.preventDefault();
    };
</script>

<script>//Script para mostrar vista previa de la imagen cargada
    $(window).load(function () {

        $(function () {
            $('#fileInput').change(function (e) {
                addImage(e);
            });

            function addImage(e) {
                var file = e.target.files[0],
                    imageType = /image.*/;

                if (!file.type.match(imageType))
                    return;

                var reader = new FileReader();
                reader.onload = fileOnload;
                reader.readAsDataURL(file);
            }

            function fileOnload(e) {
                var result = e.target.result;
                $('#imgSalida').attr("src", result);
                document.getElementById('spanDrop').style.display = "none";
            }
        });
    });
</script>

<script>//Script para que el usuario genere nuevos campos
    jQuery.fn.generaNuevosCampos = function (nombreCampo1, nombreCampo2) {
        $(this).each(function () {
            elem = $(this);
            elem.data("nombreCampo1", nombreCampo1);
            elem.data("nombreCampo2", nombreCampo2);

            elem.click(function (e) {
                e.preventDefault();
                elem = $(this);
                nombreCampo1 = elem.data("nombreCampo1");
                nombreCampo2 = elem.data("nombreCampo2");
                texto_insertar = '<div class="col-sm-6"><div class="form-group"><input type="text" name="' + nombreCampo1 + '" class="form-control" /></div></div><div class="col-sm-6"><div class="form-group"><input type="text" name="' + nombreCampo2 + '" class="form-control" /></div></div>';
                nuevo_campo = $(texto_insertar);
                elem.before(nuevo_campo);
            });
        });
        return this;
    }

    $(document).ready(function () {
        $("#mascamposVariante").generaNuevosCampos("variante1[]", "variante2[]");
    });

    $(document).ready(function () {
        $("#mascamposAdicional").generaNuevosCampos("adicional1[]", "adicional2[]");
    });

    $(document).ready(function () {
        $("#mascamposEnvios").generaNuevosCampos("enviosEmpresa1[]", "enviosEmpresa2[]");
    });
</script>