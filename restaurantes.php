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
$imagenesBanners = new Clases\Imagenes();
$imagenesEmpresa = new Clases\Imagenes();
$categorias = new Clases\Categorias();
$productos = new Clases\Productos();
$usuarioJefe = new Clases\Usuarios();
$banners = new Clases\Banner();

//Banners
$categoriasArray = $categorias->list(array("area = 'banners'"), '', '');
foreach ($categoriasArray as $val) {
    if ($val['titulo'] == 'Filtro') {
        $banners->set("categoria", $val['cod']);
        $banFiltro = $banners->listForCategory();
    }
    if ($val['titulo'] == 'Superior') {
        $banners->set("categoria", $val['cod']);
        $banSuperior = $banners->listForCategory();
    }
    if ($val['titulo'] == 'Intercalado') {
        $banners->set("categoria", $val['cod']);
        $banIntercalado = $banners->listForCategory();
    }
    if ($val['titulo'] == 'Mobile Superior') {
        $banners->set("categoria", $val['cod']);
        $banMobileSup = $banners->listForCategory();
    }
    if ($val['titulo'] == 'Mobile Inferior') {
        $banners->set("categoria", $val['cod']);
        $banMobileInf = $banners->listForCategory();
    }
}

$ubicacionUsuario = isset($_GET["ubicacion"]) ? $_GET["ubicacion"] : '';
if ($ubicacionUsuario != ''):
    $ubicacionUsuario = str_replace("-", "+", $funcion->normalizar_link($ubicacionUsuario));
    $jsonUsuario = json_decode(file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=Nkd7zJVtg6iaOyaQoEvK&app_code=HTkK8DlaV14bg6RDCA-pQA&searchtext=' . $ubicacionUsuario));
    $usuarioLongitud = ($jsonUsuario->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude);
    $usuarioLatitud = ($jsonUsuario->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude);
endif;

$categoriaGET = isset($_GET["categoria"]) ? $_GET["categoria"] : 0;
$envioGET = isset($_GET["envio"]) ? $_GET["envio"] : 2;

$filterEmpresa = '';

if ($categoriaGET != 0):
    unset($filterEmpresa);
    if (strpos($categoriaGET, ',') !== false):
        foreach (explode(',', $categoriaGET) as $value):
            $productosArrayTemp[] = $productos->list(array("categoria = '$value' GROUP BY cod_empresa"), "", "");
        endforeach;
        $cantidadCategorias = count($productosArrayTemp);
        for ($i = 0; $i < $cantidadCategorias; $i++):
            $cantidadProductos = count($productosArrayTemp[$i]);
            for ($j = 0; $j < $cantidadProductos; $j++):
                $arrayDeCodigos[] = "cod = '" . $productosArrayTemp[$i][$j]['cod_empresa'] . "'";
            endfor;
            if ($i == 0):
                $arraySinRepeticiones = $arrayDeCodigos;
            endif;
            $arraySinRepeticiones = array_intersect($arrayDeCodigos, $arraySinRepeticiones);
            unset($arrayDeCodigos);
        endfor;
        $filterEmpresa = array(implode(" OR ", $arraySinRepeticiones));
    else:
        $filterProductos = array("categoria = '$categoriaGET' GROUP BY cod_empresa");
        $productosArray = $productos->list($filterProductos, "", "");
        foreach ($productosArray as $key => $value):
            $filterEmpresaTmp[] = "cod = '" . $value['cod_empresa'] . "'";
        endforeach;
        $filterEmpresa = array(implode(" OR ", $filterEmpresaTmp));
    endif;
endif;

if ($envioGET != 2):
    if ($categoriaGET == 0):
        unset($filterEmpresa);
    endif;
    if ($envioGET == 1):
        $filterEmpresa[] = "delivery = '" . $envioGET . "'";
    else:
        $filterEmpresa = '';
    endif;
endif;

$productosCategorias = $productos->list(array("categoria != '' GROUP BY categoria"), "", "");
if ($productosCategorias) {
    foreach ($productosCategorias as $key => $value):
        $categoriasQuery[] = "cod = '" . $value['categoria'] . "'";
    endforeach;
    $filterCategorias = array(implode(" OR ", $categoriasQuery));
    $categoriasArray = $categorias->list($filterCategorias, "titulo asc", "");
} else {
    $categoriasArray = array(0 => array("cod" => "", "titulo" => ""));
}

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '0';
$cantidad = 16;

if ($pagina > 0) {
    $pagina = $pagina - 1;
}

if (isset($_GET['pagina'])):
    $url = $funcion->eliminar_get(CANONICAL, 'pagina');
else:
    $url = CANONICAL;
endif;

if (isset($_SESSION['seed'])) {
    $seed = $_SESSION['seed'];
} else {
    $_SESSION['seed'] = mt_rand();
    $seed = $_SESSION['seed'];
}

$empresaArray = $empresa->list($filterEmpresa, "rand($seed)", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $empresa->paginador($filterEmpresa, $cantidad);
?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400">
    <div id="subheader">
        <div id="sub_content">
            <h1>Restaurantes</h1>
            <p>Elegí el restaurante más cerca de tu casa.</p>
            <p></p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Inicio</a></li>
            <li>Crear Empresa</li>
        </ul>
    </div>
</div><!-- Position -->

<!-- banner superior -->
<div class="container hidden-xs hidden-sm">
    <?php
    shuffle($banSuperior);
    $imagenesBanners->set("cod", $banSuperior[0]["cod"]);
    $imagenesBannersData = $imagenesBanners->view();
    echo '<a class="ban_superior" href="' . $banSuperior[0]['link'] . '" target="_blank"><img width="100%" src="' . $imagenesBannersData['ruta'] . '" /></a><br/><br/>';
    ?>
</div>
<!-- banner mobile superior -->
<div class="container hidden-md hidden-lg">
    <?php
    shuffle($banMobileSup);
    $imagenesBanners->set("cod", $banMobileSup[0]["cod"]);
    $imagenesBannersData = $imagenesBanners->view();
    echo '<a class="ban_mobile_superior" href="' . $banMobileSup[0]['link'] . '" target="_blank"><img width="100%" src="' . $imagenesBannersData['ruta'] . '" /></a><br/><br/>';
    ?>
</div>

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-3">
            <div id="filters_col">
                <?php
                if ($categoriaGET != 0) {
                    $categoriaExp = explode(",", $_GET['categoria']);
                    foreach ($categoriaExp as $item) {
                        $categoriasTemp[] = "cod = '" . $item . "'";
                    }
                    $categoriasTemp = implode(" OR ", $categoriasTemp);

                    $categoriasEliminar = $categorias->list(array($categoriasTemp), "", "");
                    ?>
                    <ul class="filterE">
                        <?php
                        if (isset($_POST["eliminar"])) {
                            $keyEliminar = $_POST["keyEliminar"];
                            unset($categoriasEliminar[$keyEliminar]);
                            $urlNueva = $funcion->eliminar_get(CANONICAL, 'categoria');
                            foreach ($categoriasEliminar as $item) {
                                $categoriasRestantes[] = $item["cod"];
                            }
                            $anidadorNuevo = $funcion->anidador(CANONICAL, "categoria", count($_GET));
                            $categoriasRestantesImp = implode(",", $categoriasRestantes);
                            if (!empty($categoriasRestantesImp)) {
                                $funcion->headerMove($urlNueva . $anidadorNuevo . "categoria=" . $categoriasRestantesImp);
                            } else {
                                $funcion->headerMove($urlNueva);
                            }
                        }
                        foreach ($categoriasEliminar as $key => $item) { ?>
                            <form method="post">
                                <li class="fs16 mb-10">
                                    <input name="keyEliminar" type="hidden" value="<?= $key ?>">
                                    <button class="btn_filter" name="eliminar" type="submit"><i class="icon-cancel-circled-1"></i> <?= $item['titulo'] ?></button>
                                </li>
                            </form>
                        <?php } ?>
                    </ul>
                <?php } ?>

                <?php if ($envioGET != 2) { ?>
                    <ul class="filterE">
                        <?php if ($envioGET == 1) {
                            $envioEliminar = "Comercios con delivery";
                        }
                        if ($envioGET == 0) {
                            $envioEliminar = "Todos los comercios";
                        }

                        if (isset($_POST["eliminar2"])) {
                            $urlNuevaEnvio = $funcion->eliminar_get(CANONICAL, 'envio');
                            $funcion->headerMove($urlNuevaEnvio);
                        }
                        ?>
                        <form method="post">
                            <li class="fs16 mb-10">
                                <input name="keyEliminar" type="hidden" value="<?= $key ?>">
                                <button class="btn_filter" name="eliminar2" type="submit"><i class="icon-cancel-circled-1"></i> <?= $envioEliminar ?></button>
                            </li>
                        </form>
                        <?php ?>
                    </ul>
                <?php } ?>

                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters"
                   id="filters_col_bt">Filtros <i class="icon-plus-1 pull-right"></i></a>
                <div class="collapse" id="collapseFilters">
                    <div class="filter_type">
                        <h6 class="fs18"><b>Delivery</b></h6>
                        <ul>
                            <?php
                            $anidador = $funcion->anidador(CANONICAL, "envio", count($_GET));
                            if (isset($_GET['envio'])):
                                $urlEnvio = $funcion->eliminar_get(CANONICAL, 'envio');
                            else:
                                $urlEnvio = CANONICAL;
                            endif;
                            ?>
                            <li class="fs16 mb-10">
                                <a href="<?= $urlEnvio . $anidador ?>envio=1"
                                   class="categoriasLink"><i class="icon-truck-1"></i> Comercios con delivery
                                </a>
                            </li>
                            <li class="fs16 mb-10">
                                <a href="<?= $urlEnvio . $anidador ?>envio=0"
                                   class="categoriasLink"><i class="icon-shop-1"></i> Todos los comercios
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="filter_type">
                        <h6 class="fs18"><b>¿Qué te gustaría comer?</b></h6>
                        <ul>
                            <?php foreach ($categoriasArray as $key => $value):
                                $anidador = $funcion->anidador(CANONICAL, "categoria", count($_GET));
                                if ($categoriaGET != 0):
                                    $categoriaNueva = $categoriaGET . "," . $value['cod'];
                                    $urlFiltro = $funcion->eliminar_get(CANONICAL, 'categoria');
                                else:
                                    $categoriaNueva = $value['cod'];
                                    $urlFiltro = CANONICAL;
                                endif; ?>
                                <li class="fs16 mb-10">
                                    <a href="<?= $urlFiltro . $anidador ?>categoria=<?= $categoriaNueva ?>"
                                       class="categoriasLink"><i class="icon-plus-squared-small"></i> <?= $value['titulo'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div><!--End collapse -->
            </div><!--End filters col-->
            <div class="hidden-xs hidden-sm"><!-- banner superior -->
                <?php
                shuffle($banFiltro);
                for ($i = 0; $i < 2; $i++) {
                    $imagenesBanners->set("cod", $banFiltro[$i]["cod"]);
                    $imagenesBannersData = $imagenesBanners->view();
                    echo '<a href="' . $banFiltro[$i]['link'] . '" target="_blank"><img width="100%" src="' . $imagenesBannersData['ruta'] . '" /></a><br/><br/>';
                } ?>
            </div>
        </div><!--End col-md -->

        <div class="col-md-9">

            <?php
            if ($ubicacionUsuario != '') {
                $distanciaArray = array();
                foreach ($empresaArray as $key => $value) {
                    if($value['coordenadas'] != ''){
                        $coordenadas = explode(',', $value['coordenadas']);
                        $jsonDistancia = json_decode(file_get_contents('https://route.api.here.com/routing/7.2/calculateroute.json?app_id=Nkd7zJVtg6iaOyaQoEvK&app_code=HTkK8DlaV14bg6RDCA-pQA&waypoint0=geo!' . $usuarioLatitud . ',' . $usuarioLongitud . '&waypoint1=geo!' . $coordenadas[0] . ',' . $coordenadas[1] . '&mode=shortest;pedestrian'));
                        $distanciaActual = $jsonDistancia->response->route[0]->summary->distance;
                        $distanciaArray[$value['cod']] = $distanciaActual;
                    }else{
                        $distanciaArray[$value['cod']] = 9999999;
                    }
                }
                asort($distanciaArray);
                $i = 0;
                foreach ($distanciaArray as $key => $value) {
                    for ($j = 0; $j < count($empresaArray); $j++) {
                        if ($key == $empresaArray[$j]['cod']) {
                            $tempArray = $empresaArray[$j];
                            $empresaArray[$j] = $empresaArray[$i];
                            $empresaArray[$i] = $tempArray;
                        }
                    }
                    $i++;
                }
            }
            $i = 0;
            foreach ($empresaArray as $key => $value):
                echo '<div class="hidden-xs hidden-sm">';
                if ($i != 0 && $i % 4 == 0) {
                    shuffle($banIntercalado);
                    $imagenesBanners->set("cod", $banIntercalado[0]["cod"]);
                    $imagenesBannersData = $imagenesBanners->view();
                    echo '<a class="ban_intercalado" href="' . $banIntercalado[0]['link'] . '" target="_blank"><img width="100%" src="' . $imagenesBannersData['ruta'] . '" /></a><br/><br/>';
                }
                echo '</div>';
                $i++;
                $usuarioJefe->set("cod", $value['cod_usuario']);
                $usuarioJefeData = $usuarioJefe->view();

                $categorias->set("cod_empresa", $value['cod']);
                $categoriasMasUsadas = $categorias->categoriasMasUsadas(); ?>
                <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                    <!--<div class="ribbon_1">
                        Popular
                    </div>-->
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="#"><img src="<?= URL; ?>/<?= $value['logo']; ?>"
                                                     alt="<?= $value['titulo'] ?>"></a>
                                </div>
                                <div class="rating">

                                </div>
                                <h3 class="mt-10"><?= $value['titulo'] ?></h3>
                                <?php if (!empty($categoriasMasUsadas)) { ?>
                                    <div class="type mt-10">
                                        <i class="icon-food"></i>
                                        <?php
                                        if (count($categoriasMasUsadas) == 1) {
                                            echo mb_strtoupper($categoriasMasUsadas[0]['titulo']);
                                        } else {
                                            $cat_mostrar = '';
                                            foreach ($categoriasMasUsadas as $keyC => $valueC) {
                                                $cat_mostrar .= mb_strtoupper($valueC['titulo']) . ' / ';
                                            }
                                            echo substr($cat_mostrar, 0, -2);
                                        }
                                        ?>
                                    </div>
                                <?php } else {
                                    echo '<br/>';
                                } ?>
                                <div class="location">
                                    <i class="icon-location"></i> <?= $value['direccion'] ?> • <?= $value['ciudad'] ?>
                                    • <?= $value['provincia'] ?>
                                </div>
                                <div class="location">
                                    <i class="icon-phone"></i> <?= $value['telefono'] ?>
                                </div>
                                <?php if ($ubicacionUsuario != '' && $value['coordenadas'] != ''): ?>
                                    <div class="mt-5">
                                        <span class="info">Distancia: </span>
                                        <?= $distanciaArray[$value['cod']] ?> m
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL; ?>/restaurante/<?= str_replace(" ", "-", $value['titulo']); ?>/<?= $value['cod'] ?>"
                                       class="restaurantes-plan<?= $usuarioJefeData['plan'] ?> btn_1">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->
            <?php endforeach; ?>
            <div class="text_center">
                <ul class="pagination">
                    <?php $anidador = $funcion->anidador(CANONICAL, "pagina", count($_GET));
                    if (($pagina + 1) > 1): ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?= $url ?><?= $anidador ?>pagina=<?= $pagina ?>"><span
                                        aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Anterior</span></a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $numeroPaginas; $i++): ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?= $url ?><?= $anidador ?>pagina=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>

                    <?php if (($pagina + 2) <= $numeroPaginas): ?>
                        <li class="page-item"><a class="page-link"
                                                 href="<?= $url ?><?= $anidador ?>pagina=<?= ($pagina + 2) ?>"><span
                                        aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div><!-- End col-md-9-->

    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- banner mobile inferior -->
<div class="container hidden-md hidden-lg">
    <?php
    shuffle($banMobileInf);
    $imagenesBanners->set("cod", $banMobileInf[0]["cod"]);
    $imagenesBannersData = $imagenesBanners->view();
    echo '<a class="ban_mobile_inferior" href="' . $banMobileInf[0]['link'] . '" target="_blank"><img width="100%" src="' . $imagenesBannersData['ruta'] . '" /></a><br/><br/>';
    ?>
</div>

<?php $template->themeEnd() ?>

<!-- SPECIFIC SCRIPTS -->
<script src="js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="js/infobox.js"></script>

