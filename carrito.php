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

$cod = isset($_GET["id"]) ? $_GET["id"] : '';
$empresa->set("cod", $cod);
$empresaData = $empresa->view();

$filterProductosCategoria = array("cod_empresa = '$cod' GROUP BY categoria");
$productosArrayCategoria = $productos->list($filterProductosCategoria, "", "");

$filterProductosSecciones = array("cod_empresa = '$cod' GROUP BY seccion");
$productosArraySecciones = $productos->list($filterProductosSecciones, "", "");

$carro = $carrito->return();
$carroEnvio = $carrito->checkEnvio();
$countCarrito = count($carrito->return());

?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="img/sub_header_2.jpg" data-natural-width="1400"
         data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb"><img src="<?= URL ?>/<?= $empresaData['logo'] ?>" alt=""></div>
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                        class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (
                <small><a href="detail_page_2.html">Read 98 reviews</a></small>
                )
            </div>
            <h1><?= $empresaData['titulo'] ?></h1>
            <div><em>
                    <?php foreach ($productosArrayCategoria as $key => $value):
                        $categorias->set("cod", $value['categoria']);
                        $categoriaData = $categorias->view();
                        echo $categoriaData['titulo'] . '/';
                    endforeach; ?>
                </em></div>
            <div><i class="icon_pin"></i> <?= $empresaData['direccion'] ?>, <?= $empresaData['ciudad'] ?>
                , <?= $empresaData['provincia'] ?></div>
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
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-3">
            <p><a href="#" class="btn_side">Carta</a></p>
            <div class="box_style_1">
                <ul id="cat_nav">
                    <?php foreach ($productosArraySecciones as $key => $value):
                        $secciones->set("cod", $value['seccion']);
                        $seccionData = $secciones->view(); ?>
                        <li><a href="#<?= $value['seccion'] ?>" class="active"><?= $seccionData['titulo'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div><!-- End col-md-3 -->

        <div class="col-md-6">
            <div class="box_style_2" id="main_menu">
                <h2 class="inner">Menús</h2>
                <?php foreach ($productosArraySecciones as $key => $value):
                    $variantes = explode("|||", $value['variantes']);
                    $variantes1 = explode(",", $variantes[0]);
                    $variantes2 = explode(",", $variantes[1]);
                    $countVariantes = count($variantes1);
                    $adicionales = explode("|||", $value['adicionales']);
                    $adicionales1 = explode(",", $adicionales[0]);
                    $adicionales2 = explode(",", $adicionales[1]);
                    $countAdicionales = count($adicionales);
                    $secciones->set("cod", $value['seccion']);
                    $seccionData = $secciones->view();
                    $imagen->set("cod", $value['cod']);
                    $imagenData = $imagen->view(); ?>
                    <h3 class="nomargin_top" id="<?= $value['seccion'] ?>"><?= $seccionData['titulo']; ?></h3>
                    <table class="table table-striped cart-list">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Orden</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td width="50%">
                                <figure class="thumb_menu_list"><img src="<?= URL ?>/<?= $imagenData['ruta'] ?>"
                                                                     alt="thumb"></figure>
                                <h5><?= $value['titulo'] ?></h5>
                                <p><?= $value['desarrollo'] ?></p>
                            </td>
                            <td width="25%">
                                <strong><?= $value['precio'] ?></strong>
                            </td>
                            <td class="options" width="25%">
                                <div class="dropdown dropdown-options">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i
                                                class="icon_plus_alt2"></i></a>
                                    <div class="dropdown-menu">
                                        <form method="post">
                                            <h5>Variantes</h5>
                                            <?php for ($i = 0; $i < $countVariantes; $i++): ?>
                                                <label>
                                                    <input type="radio"
                                                           value="<?= $variantes1[$i] ?>,<?= $variantes2[$i] ?>"
                                                           name="variantesPOST"><?= $variantes2[$i] ?>
                                                    <span>+ $<?= $variantes1[$i] ?></span>
                                                </label>
                                            <?php endfor; ?>
                                            <h5>Adicionales</h5>
                                            <?php for ($i = 0; $i < $countVariantes; $i++): ?>
                                                <label>
                                                    <input type="checkbox"
                                                           value="<?= $adicionales1[$i] ?>,<?= $adicionales2[$i] ?>"
                                                           name="adicionalesPOST[]"><?= $adicionales2[$i] ?>
                                                    <span>+ $<?= $adicionales1[$i] ?></span>
                                                </label>
                                            <?php endfor; ?>
                                            <input class="form-control" name="cantidad" type="number" min="1" max="99"
                                                   value="1"><br/>
                                            <button type="submit" name="enviar_<?= $value['cod'] ?>"
                                                    class="btn btn-danger">Agregar al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <?php
                    //$carrito->destroy();
                    if (isset($_POST["enviar_" . $value['cod']])) {
                        if ($carroEnvio != '') {
                            $carrito->delete($carroEnvio);
                        }
                        $id = $funcion->antihack_mysqli(isset($value['cod']) ? $value['cod'] : '');
                        $cantidad = $funcion->antihack_mysqli(isset($_POST['cantidad']) ? $_POST['cantidad'] : '');
                        $titulo = $funcion->antihack_mysqli(isset($value['titulo']) ? $value['titulo'] : '');
                        $precio = $funcion->antihack_mysqli(isset($value['precio']) ? $value['precio'] : '');
                        $variantesPOST = $funcion->antihack_mysqli(isset($_POST['variantesPOST']) ? $_POST['variantesPOST'] : '');
                        $adicionalesPOST = implode("//", $_POST['adicionalesPOST']);

                        $carrito->set("id", $id);
                        $carrito->set("cantidad", $cantidad);
                        $carrito->set("titulo", $titulo);
                        $carrito->set("precio", $precio);
                        $carrito->set("opciones", $variantesPOST . '|||' . $adicionalesPOST);
                        $carrito->add();
                        $funcion->headerMove(CANONICAL . "?success");
                    }
                    if (strpos(CANONICAL, "success") == true) {
                        echo "<div class='alert alert-success'>Agregaste un producto a tu carrito, querés <a href='" . URL . "/carrito'>pasar por caja</a> o <a href='" . URL . "/productos'>seguir comprando</a></div>";
                    }
                    ?>
                <?php endforeach; ?>
            </div><!-- End box_style_1 -->
        </div><!-- End col-md-6 -->

        <div class="col-md-3" id="sidebar">
            <div class="theiaStickySidebar">
                <div id="cart_box">
                    <h3>Tu orden <i class="icon_cart_alt pull-right"></i></h3>
                    <table class="table table_summary">
                        <tbody>
                        <?php for ($i = 0; $i < $countCarrito; $i++): ?>
                            <tr>
                                <td>
                                    <a href="#0" class="remove_item"><i class="icon_minus_alt"></i></a>
                                    <strong><?= $carro[$i]['cantidad']; ?>x</strong>
                                    <?= $carro[$i]['titulo']; ?>
                                </td>
                                <td>
                                    <strong class="pull-right">$<?= $carro[$i]['precio']; ?></strong>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        </tbody>
                    </table>
                    <hr>
                    <div class="row" id="options_2">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="" checked name="option_2" class="icheck">Delivery</label>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="" name="option_2" class="icheck">Retirar</label>
                        </div>
                    </div><!-- Edn options 2 -->

                    <hr>
                    <table class="table table_summary">
                        <tbody>
                        <tr>
                            <td>
                                <?php $subtotal = 0;
                                for ($i = 0; $i < $countCarrito; $i++):
                                    $subtotal = $subtotal + ($carro[$i]['precio'] * $carro[$i]['cantidad']);
                                endfor; ?>
                                Subtotal <span class="pull-right">$<?= $subtotal; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Delivery <span class="pull-right">$25</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="total">
                                TOTAL <span class="pull-right">$<?= $subtotal + 25; ?></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <a class="btn_full" href="cart.html">Ordernar</a>
                </div><!-- End cart_box -->
            </div><!-- End theiaStickySidebar -->
        </div><!-- End col-md-3 -->

    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<?php $template->themeEnd() ?>

<!-- SPECIFIC SCRIPTS -->
<script src="<?= URL ?>/assets/js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="<?= URL ?>/assets/js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
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