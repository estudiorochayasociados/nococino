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
$empresa = new Clases\Empresas();
$productos = new Clases\Productos();
$categorias = new Clases\Categorias;
$secciones = new Clases\Secciones;
$imagen = new Clases\Imagenes;
$carrito = new Clases\Carrito();
$envio = new Clases\Envios();
$usuarioJefe = new Clases\Usuarios();

$cod = isset($_GET["id"]) ? $_GET["id"] : '';
$empresa->set("cod", $cod);
$empresaData = $empresa->view();

if (!isset($_SESSION["detectar_carrito"])) {
    $_SESSION["detectar_carrito"] = '';
}
if ($_SESSION["detectar_carrito"] != '' && $_SESSION["detectar_carrito"] != $empresaData['cod']) {
    $_SESSION["detectar_carrito"] = '';
    $carrito->destroy();
}

$filterEnvios = array("cod_empresa = '" . $empresaData['cod'] . "'");
$enviosArray = $envio->list($filterEnvios, "", "");

$filterProductosCategoria = array("cod_empresa = '$cod' GROUP BY categoria");
$productosArrayCategoria = $productos->list($filterProductosCategoria, "", "");

$filterProductosSecciones = array("cod_empresa = '$cod' GROUP BY seccion");
$productosArraySecciones = $productos->list($filterProductosSecciones, "", "");

$carro = $carrito->return();

$carroEnvio = $carrito->checkEnvio();
$countCarrito = count($carro);

$filter = array("cod = '$cod'");
$imagenesArray = $imagen->list($filter, "id DESC", "");

$precioTotal = 0;

$usuarioJefe->set("cod", $empresaData['cod_usuario']);
$usuarioJefeData = $usuarioJefe->view();
if ($usuarioJefeData['plan'] == 2) {
    $colmid = "col-md-9";
} else {
    $colmid = "col-md-6";
}
$horariosArray = unserialize($empresaData["horarios"]);
?>

<!-- SubHeader =============================================== -->

<?php
if ($empresaData['portada'] == '') {
?>
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg"
         data-natural-width="1920">
    <?php
    } else {
    ?>
    <section class="parallax-window" data-parallax="scroll" data-image-src="<?= URL ?>/<?= $empresaData['portada'] ?>"
             data-natural-width="1920">
        <?php
        }
        ?>
        <div id="subheader">
            <div id="sub_content">
                <?php if (!$empresaData['logo']) {
                    $logo = '/assets/img/logo.png';
                } else {
                    $logo = $empresaData['logo'];
                } ?>
                <div id="thumb"><img src="<?= URL ?>/<?= $logo ?>" alt=""></div>
                <h1><?= ucwords($empresaData['titulo']) ?></h1>
                <div class="text-uppercase"><em>
                        <?php 
                        foreach ($productosArrayCategoria as $key => $value) {
                            $categorias->set("cod", $value['categoria']);
                            $categoriaData = $categorias->view();
                            echo $categoriaData['titulo'] . ' / ';
                        }
                         ?>
                    </em></div>
                <div class="text-uppercase"><i class="icon_pin"></i> <?= $empresaData['direccion'] ?>, <?= $empresaData['ciudad'] ?>, <?= $empresaData['provincia'] ?></div>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="<?= URL ?>/restaurantes">Restaurantes</a></li>
                <li><?= $empresaData['provincia']; ?></li>
                <li><?= $empresaData['titulo']; ?></li>
            </ul>
        </div>
    </div><!-- Position -->

    <!-- Content ================================================== -->
    <div class="container mt-30 mb-30">
        <div class="row">

            <div class="col-md-12 mb-30">
                <section class="gallery-area mb-20">
                    <div class="container-fullid">
                        <div class="gallery-slider-area">
                            <?php foreach ($imagenesArray as $key => $valor) { ?>
                                <div class="single-item-area">
                                    <div class="img-box-area">
                                        <figure>
                                            <a href="<?= URL ?>/<?= $valor['ruta'] ?>"
                                               data-lightbox="<?= $valor['cod'] ?>"
                                               data-title="<?= $empresaData['titulo']; ?>">
                                                <div style="background: url(<?= URL ?>/<?= $valor['ruta'] ?>)center/cover; width:200px; height:200px;"></div>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <?= ($empresaData['desarrollo']); ?>
                <br><br>
            </div>

            <div class="col-md-3">
                <p><a href="#" class="btn_side" style="pointer-events: none;">Carta</a></p>
                <div class="box_style_1">
                    <?php $i = 0;
                    foreach ($productosArraySecciones as $key => $value) {
                        $secciones->set("cod", $value['seccion']);
                        $seccionData = $secciones->view();
                        if($seccionData['titulo'] != '') {                        
                        if ($i != 0) {
                            echo '<hr>';
                        }
                        $i++;
                        if ($value['seccion'] == "sin-clasificar") { ?>
                                <a href="#sin-clasificar"><h5>Sin clasificar<i class="icon-angle-down pull-right"></i></h5></a>
                            <?php 
                            } else {
                            ?>
                                <a href="javascript:" onclick="carta('<?= $value['seccion'] ?>')"><h5><?= $seccionData['titulo'] ?><i class="icon-angle-down pull-right"></i></h5></a>
                            <?php 
                        } 
                        }
                    }
                        ?>
                </div>

                <p><a href="#" class="btn_side" style="pointer-events: none;">Información</a></p>
                <div class="box_style_1">
                    <h5><?= $empresaData['telefono'] ?><i class="icon-phone-1 pull-right"></i></h5>
                    <hr>
                    <h5><?= $empresaData['direccion'] ?><i class="icon-location-2 pull-right"></i></h5>
                </div>

                <p><a href="#" class="btn_side" style="pointer-events: none;">Horarios</a></p>
                <div class="box_style_1 pt-20 pb-20">
                    <?php if (!empty($horariosArray)) {
                        foreach ($horariosArray as $key => $item) {
                            $mananaCount = count(array_filter($item["Manana"]));
                            $tardeCount = count(array_filter($item["Tarde"]));
                            if ($mananaCount == 1 && !empty($item["Manana"][0])) {
                                $horarioManana = $item["Manana"][0] . ' <i class="icon-clock-5"></i>';
                            } elseif ($mananaCount == 1 && !empty($item["Manana"][1])) {
                                $horarioManana = '';
                            } elseif ($mananaCount == 2) {
                                $horarioManana = $item["Manana"][0] . ' - ' . $item["Manana"][1] . ' <i class="icon-clock-5"></i>';
                            } elseif ($mananaCount == 0) {
                                $horarioManana = '';
                            }
                            if ($tardeCount == 1 && !empty($item["Tarde"][0])) {
                                $horarioTarde = $item["Tarde"][0] . ' <i class="icon-clock-5"></i>';
                            } elseif ($tardeCount == 1 && !empty($item["Tarde"][1])) {
                                $horarioTarde = '';
                            } elseif ($tardeCount == 2) {
                                $horarioTarde = $item["Tarde"][0] . ' - ' . $item["Tarde"][1] . ' <i class="icon-clock-5"></i>';
                            } elseif ($tardeCount == 0) {
                                $horarioTarde = '';
                            }
                            if ($mananaCount == 0 && $tardeCount == 0) {
                                $horarioManana = '<i>Sin definir</i>';
                                $horarioTarde = '';
                            }
                            echo '<div class="col-md-4"><b>' . $key . '</b></div><div class="col-md-7 text-right">' . $horarioManana . '<br/>'. $horarioTarde .'</div>';
                            echo '<div class="clearfix"></div>';
                            if ($key != 'Domingo') {
                                echo '<hr>';
                            }
                            unset($mananaCount);
                            unset($tardeCount);
                        }
                    } else {
                        echo '<h5>Horarios sin definir <i class="icon-clock-5"></i></h5>';
                    } ?>
                </div>

            </div><!-- End col-md-3 -->

            <?php
            if (isset($_POST["enviarCarrito"])) {
                $_SESSION["detectar_carrito"] = $empresaData['cod'];

                $id = $funcion->antihack_mysqli(isset($_POST['cod']) ? $_POST['cod'] : '');
                $cantidad = $funcion->antihack_mysqli(isset($_POST['cantidad']) ? $_POST['cantidad'] : '');
                $titulo = $funcion->antihack_mysqli(isset($_POST['titulo']) ? $_POST['titulo'] : '');
                $precio = $funcion->antihack_mysqli(isset($_POST['precio']) ? $_POST['precio'] : '');

                $variantesPOST = $funcion->antihack_mysqli(isset($_POST['variantesPOST']) ? $_POST['variantesPOST'] : '');

                $precioAdicional = 0;
                if (!empty($variantesPOST)):
                    $variantesPrecio = explode(",", $variantesPOST);
                    $precioAdicional = $precioAdicional + $variantesPrecio[0];
                endif;

                if (!empty($_POST["adicionalesPOST"])):
                    foreach ($_POST["adicionalesPOST"] as $key => $value) {
                        $valor = explode(",", $value);
                        $adicionales[] = $valor[0] . ',' . $valor[1];
                        $precioAdicional = $precioAdicional + $valor[0];
                    }
                endif;

                $carrito->set("id", $id);
                $carrito->set("cantidad", $cantidad);
                $carrito->set("titulo", $titulo);
                $carrito->set("precio", $precio);
                $carrito->set("precioAdicional", $precioAdicional);
                $carrito->set("opciones", array($variantesPOST, $adicionales));
                $carrito->add();
                $funcion->headerMove(CANONICAL);
            }

            if (isset($_POST["tipoEnvio"])) {
                $_SESSION["detectar_carrito"] = $empresaData['cod'];


                $carrito->delete($carroEnvio);

                $tipoEnvio = $funcion->antihack_mysqli(isset($_POST['tipoEnvio']) ? $_POST['tipoEnvio'] : '');
                $envio->set("cod", $tipoEnvio);
                $envioData = $envio->view();

                $carrito->set("id", "Envio-Seleccion");
                $carrito->set("cantidad", 1);
                $carrito->set("titulo", $envioData['titulo']);
                $carrito->set("precio", $envioData['precio']);
                $carrito->set("precioAdicional", 0);
                $carrito->set("opciones", '');
                $carrito->add();
                $carro = $carrito->return();

                $funcion->headerMove(CANONICAL);
            }
            //$carrito->destroy();
            ?>
            <div class="<?= $colmid ?>">
                <div class="box_style_2" id="main_menu">
                    <h2 class="inner">Menús</h2>
                    <?php
                    if (!$productosArraySecciones) {
                        echo '<h4 class="nomargin_top" id="">Aún no se ha cargado el menú <i class="icon-food"></i></h4>';
                    }
                    foreach ($productosArraySecciones as $keyS => $valueS):
                        $secciones->set("cod", $valueS['seccion']);
                        $seccionData = $secciones->view();
                        if ($valueS['seccion'] == 'sin-clasificar') { ?>
                            <h3 class="nomargin_top" id="sin-clasificar">Sin clasificar</h3>
                        <?php } else { ?>
                            <h3 class="nomargin_top" id="<?= $valueS['seccion'] ?>"><?= $seccionData['titulo'] ?></h3>
                        <?php } ?>
                        <table class="table table-striped">
                            <tbody>
                            <?php
                            $filterProductos = array("seccion = '" . $valueS['seccion'] . "'");
                            $productosArray = $productos->list($filterProductos, "", "");

                            foreach ($productosArray as $key => $value):

                                @$variantesMostrar = unserialize($value['variantes']);
                                @$adicionalesMostrar = unserialize($value['adicionales']);
                                $imagen->set("cod", $value['cod']);
                                $imagenData = $imagen->view(); ?>
                                <tr>
                                    <td>
                                        <figure class="thumb_menu_list">
                                            <a href="<?= URL ?>/<?= $imagenData['ruta'] ?>"
                                               data-lightbox="<?= $valueS['cod'] ?>"
                                               data-title="<?= $empresaData['titulo']; ?>">
                                                <img src="<?= URL ?>/<?= $imagenData['ruta'] ?>" alt="thumb">
                                            </a>
                                        </figure>
                                        <h5 class="mt-0"><?= $value['titulo'] ?></h5>
                                        <p><?= $value['desarrollo'] ?></p>
                                        <div class="dev_precio">
                                            <div class="h35 restaurantes-plan<?= $usuarioJefeData['plan'] ?>">
                                                <strong class="font20">$
                                                    <?php if ($value['precio'] == 0 || $value['precio'] == '') {
                                                        $precio = 'Precio a consultar';
                                                    } else {
                                                        $precio = $value['precio'];
                                                    } ?>
                                                    <?= $precio ?>
                                                </strong>
                                            </div>
                                            <div class="c_restaurante-plan<?= $usuarioJefeData['plan'] ?>">
                                                <div class="dropdown dropdown-options">
                                                    <?php if ($valueS['stock'] > 0 && $value['precio'] > 0) { ?>
                                                        <a href="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                                           aria-expanded="true"><span>Agregar a la compra </span><i
                                                                    class="icon_plus_alt2"></i></a>
                                                    <?php } else { ?>
                                                        <br><span class="alert alert-danger"><b>Sin stock</b></span>
                                                        <div class="clearfix"></div><br>
                                                    <?php } ?>

                                                    <div class="dropdown-menu" >
                                                        <form method="post">
                                                            <input name="cod" type="hidden" value="<?= $value['cod'] ?>">
                                                            <input name="titulo" type="hidden" value="<?= $value['titulo'] ?>">
                                                            <input name="precio" type="hidden" value="<?= $value['precio'] ?>">
                                                            <?php if (!empty($variantesMostrar)): ?>
                                                                <h5>Variantes</h5>
                                                                <?php foreach ($variantesMostrar as $key => $valueV1):
                                                                    $valor = explode(",", $valueV1); ?>
                                                                    <label>
                                                                        <input type="radio"
                                                                               value="<?= $valor[0] ?>,<?= $valor[1] ?>"
                                                                               name="variantesPOST"><?= $valor[1] ?>
                                                                        <span>+ $<?= $valor[0] ?></span>
                                                                    </label>
                                                                <?php endforeach;
                                                            endif;
                                                            if (!empty($adicionalesMostrar)): ?>
                                                                <h5>Adicionales</h5>
                                                                <?php foreach ($adicionalesMostrar as $key => $valueA1):
                                                                    $valor = explode(",", $valueA1); ?>
                                                                    <label>
                                                                        <input type="checkbox"
                                                                               value="<?= $valor[0] ?>,<?= $valor[1] ?>"
                                                                               name="adicionalesPOST[]"><?= $valor[1] ?>
                                                                        <span>+ $<?= $valor[0] ?></span>
                                                                    </label>
                                                                <?php endforeach;
                                                            endif; ?>
                                                            <input class="form-control" name="cantidad" type="number" min="1"
                                                                   max="<?= $valueS['stock'] ?>" value="1"
                                                                   oninvalid="this.setCustomValidity('No contamos con esa cantidad')">
                                                            <br/>
                                                            <button type="submit" name="enviarCarrito"
                                                                    class="btn btn-danger">Agregar al carrito
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="padD esc_precio options"
                                        width="25%">
                                        <div class="h35 restaurantes-plan<?= $usuarioJefeData['plan'] ?>">
                                            <strong>$
                                                <?php if ($value['precio'] == 0 || $value['precio'] == '') {
                                                    $precio = 'Precio a consultar';
                                                } else {
                                                    $precio = $value['precio'];
                                                } ?>
                                                <?= $precio ?>
                                            </strong>
                                        </div>
                                        <div class="c_restaurante-plan<?= $usuarioJefeData['plan'] ?>">
                                            <div class="dropdown dropdown-options">
                                                <?php if ($valueS['stock'] > 0 && $value['precio'] > 0) { ?>
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       aria-expanded="true"><i
                                                                class="icon_plus_alt2"></i></a>
                                                <?php } else { ?>
                                                    <br><span class="alert alert-danger"><b>Sin stock</b></span>
                                                    <div class="clearfix"></div><br>
                                                <?php } ?>

                                                <div class="dropdown-menu">
                                                    <form method="post">
                                                        <input name="cod" type="hidden" value="<?= $value['cod'] ?>">
                                                        <input name="titulo" type="hidden" value="<?= $value['titulo'] ?>">
                                                        <input name="precio" type="hidden" value="<?= $value['precio'] ?>">
                                                        <?php if (!empty($variantesMostrar)): ?>
                                                            <h5>Variantes</h5>
                                                            <?php foreach ($variantesMostrar as $key => $valueV2):
                                                                $valor = explode(",", $valueV2); ?>
                                                                <label>
                                                                    <input type="radio"
                                                                           value="<?= $valor[0] ?>,<?= $valor[1] ?>"
                                                                           name="variantesPOST"><?= $valor[1] ?>
                                                                    <span>+ $<?= $valor[0] ?></span>
                                                                </label>
                                                            <?php endforeach;
                                                        endif;
                                                        if (!empty($adicionalesMostrar)): ?>
                                                            <h5>Adicionales</h5>
                                                            <?php foreach ($adicionalesMostrar as $key => $valueA2):
                                                                $valor = explode(",", $valueA2); ?>
                                                                <label>
                                                                    <input type="checkbox"
                                                                           value="<?= $valor[0] ?>,<?= $valor[1] ?>"
                                                                           name="adicionalesPOST[]"><?= $valor[1] ?>
                                                                    <span>+ $<?= $valor[0] ?></span>
                                                                </label>
                                                            <?php endforeach;
                                                        endif; ?>
                                                        <input class="form-control" name="cantidad" type="number" min="1"
                                                               max="<?= $valueS['stock'] ?>" value="1"
                                                               oninvalid="this.setCustomValidity('No contamos con esa cantidad')">
                                                        <br/>
                                                        <button type="submit" name="enviarCarrito"
                                                                class="btn btn-danger">Agregar al carrito
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                    <?php endforeach; ?>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-6 -->
            <div class="b_restaurante-plan<?= $usuarioJefeData['plan'] ?> col-md-3 " id="">
                <div class="theiaStickySidebar">
                    <div id="cart_box">
                        <h3>Tu orden <i class="icon_cart_alt pull-right"></i></h3>
                        <table class="table table_summary">
                            <tbody>
                            <?php for ($i = 0; $i < $countCarrito; $i++):
                                if ($carro[$i]['id'] !== "Envio-Seleccion"):

                                    if (!empty($carro[$i]['opciones'])):
                                        $variantesMostrarCarrito = $carro[$i]['opciones'][0];
                                        $adicionalesMostrarCarrito = $carro[$i]['opciones'][1];
                                    endif; ?>
                                    <tr>
                                        <td>
                                            <a href="#0" class="remove_item"><i class="icon_minus_alt"></i></a>
                                            <strong><?= $carro[$i]['cantidad']; ?>x</strong>
                                            <?= $carro[$i]['titulo']; ?>
                                        </td>
                                        <td>
                                            <strong class="pull-right">$<?= $carro[$i]['precio'] * $carro[$i]['cantidad']; ?></strong>
                                        </td>
                                    </tr>
                                    <?php if (!empty($carro[$i]['opciones']) && !empty($variantesMostrarCarrito)):
                                    $valor = explode(",", $variantesMostrarCarrito); ?>
                                    <tr>
                                        <td>
                                            - <?= $valor[1]; ?>
                                        </td>
                                        <td>
                                            <strong class="pull-right">$<?= $valor[0] * $carro[$i]['cantidad']; ?></strong>
                                        </td>
                                    </tr>
                                <?php endif;
                                    if (!empty($carro[$i]['opciones']) && is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) > 1):
                                        foreach ($adicionalesMostrarCarrito as $key => $value):
                                            $valor = explode(",", $value); ?>
                                            <tr>
                                                <td>
                                                    - <?= $valor[1] ?>
                                                </td>
                                                <td>
                                                    <strong class="pull-right">$<?= $valor[0] * $carro[$i]['cantidad'] ?></strong>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                    elseif (!empty($carro[$i]['opciones']) && is_array($adicionalesMostrarCarrito) && count($adicionalesMostrarCarrito) == 1):
                                        $valor = explode(",", $adicionalesMostrarCarrito[0]); ?>
                                        <tr>
                                            <td>
                                                - <?= $valor[1] ?>
                                            </td>
                                            <td>
                                                <strong class="pull-right">$<?= $valor[0] * $carro[$i]['cantidad'] ?></strong>
                                            </td>
                                        </tr>
                                    <?php endif;
                                endif;
                            endfor; ?>
                            </tbody>
                        </table>
                        <hr>
                        <form method="post">
                            <div class="row" id="options_2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Envío</label>
                                    <select name="tipoEnvio" class="form-control" required
                                            onchange="this.form.submit();">
                                        <option>Seleccionar envío</option>
                                        <?php foreach ($enviosArray as $key => $value) {
                                            $envioTitulo = $carro[$carroEnvio]["titulo"];
                                            $envioPrecio = $carro[$carroEnvio]["precio"];
                                            ?>
                                            <option value="<?= $value['cod'] ?>" <?php if ($value['titulo'] == $envioTitulo) {
                                                echo 'selected';
                                            } ?>>
                                                <?php if ($value['precio'] == 0) {
                                                    echo 'Gratis';
                                                } else {
                                                    echo '$' . $value['precio'];
                                                } ?> | <?= $value['titulo'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><!-- Edn options 2 -->
                        </form>
                        <hr>
                        <table class="table table_summary">
                            <tbody>
                            <?php foreach ($carro as $carroItem):
                                $precioTotal = $precioTotal + ($carroItem['precio'] + $carroItem['precioAdicional']) * $carroItem['cantidad'];
                            endforeach; ?>
                            <tr>
                                <td class="total">
                                    TOTAL <span class="pull-right">$<?= $precioTotal; ?></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <a class="btn_full" href="<?= URL ?>/revisar">Ordernar</a>
                    </div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
            </div><!-- End col-md-3 -->

        </div><!-- End row -->

    </div><!-- End container -->
    <!-- End Content =============================================== -->

    <!-- ordenar envio al final -->
    <?php if (!empty($carro)) {
        foreach ($carro as $key => $value) {
            if ($value["id"] == "Envio-Seleccion") {
                $varEnvio = $carro[$key];
                $carrito->delete($key);
            }
        }
        if ($varEnvio != NULL) {
            $carrito->set("id", $varEnvio["id"]);
            $carrito->set("titulo", $varEnvio["titulo"]);
            $carrito->set("cantidad", $varEnvio["cantidad"]);
            $carrito->set("precio", $varEnvio["precio"]);
            $carrito->set("precioAdicional", $varEnvio["precioAdicional"]);
            $carrito->set("opciones", $varEnvio["opciones"]);
            $carrito->add();
        }
    } ?>

    <?php $template->themeEnd() ?>

    <!-- SPECIFIC SCRIPTS -->
    <script src="<?= URL ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?= URL ?>/assets/js/jquery.fancybox.pack.js"></script>
    <script src="<?= URL ?>/assets/js/slider.js"></script>
    <script src="<?= URL ?>/assets/js/cat_nav_mobile.js"></script>
    <script>$('#cat_nav').mobileMenu();</script>
    <script src="<?= URL ?>/assets/js/theia-sticky-sidebar.js"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 0,
            additionalMarginBottom: 0
        });
    </script>
    <script>
        $('#cat_nav a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 70
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.owl-controls').hide();
        });
    </script>

    <script>
        function carta(id) {
            $('html, body').animate({
                scrollTop: $("#" + id).offset().top - 100
            }, 1000);
        }
    </script>