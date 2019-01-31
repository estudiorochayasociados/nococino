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
$menu = new Clases\Productos();
$imagenes = new Clases\Imagenes();
$zebra = new Clases\Zebra_Image();
$categorias = new Clases\Categorias();
$seccion = new Clases\Secciones();

$filterCategoria = array("area = 'productos'");
$order = "titulo ASC";
$categoriasArray = $categorias->list($filterCategoria, $order, "");
$cod = isset($_GET["id"]) ? $_GET["id"] : '';
$menu->set("cod", $cod);
$menuData = $menu->view();

$filterSeccion = array("cod_empresa = '$menuData[cod_empresa]'");
$seccionesArray = $seccion->list($filterSeccion, $order, "");

$imagenes->set("cod", $menuData['cod']);
$imagenData = $imagenes->view();

$variantesExplotadas = explode('|||', $menuData['variantes']);
$variante1Explotada = explode(',', $variantesExplotadas[0]);
$variante2Explotada = explode(',', $variantesExplotadas[1]);

$adicionalesExplotadas = explode('|||', $menuData['adicionales']);
$adicional1Explotada = explode(',', $adicionalesExplotadas[0]);
$adicional2Explotada = explode(',', $adicionalesExplotadas[1]);
?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400" >

    <div id="subheader">
        <div id="sub_content">
            <h1>Sección de menús</h1>
            <p>Administre todos sus menús desde aquí</p>
            <p></p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Inicio</a></li>
            <li>Crear Menú</li>
        </ul>
    </div>
</div><!-- Position -->

<?php
if (isset($_POST["crear_menu"])):
    $categoria = $funcion->antihack_mysqli(!empty($_POST["categoriaMenu"]) ? $_POST["categoriaMenu"] : $menuData['categoria']);
    $seccion = $funcion->antihack_mysqli(!empty($_POST["seccionMenu"]) ? $_POST["seccionMenu"] : $menuData['seccion']);
    $titulo = $funcion->antihack_mysqli(!empty($_POST["tituloMenu"]) ? $_POST["tituloMenu"] : $menuData['titulo']);
    $precio = $funcion->antihack_mysqli(!empty($_POST["precioMenu"]) ? $_POST["precioMenu"] : $menuData['precio']);
    $desarrollo = $funcion->antihack_mysqli(!empty($_POST["desarrolloMenu"]) ? $_POST["desarrolloMenu"] : $menuData['desarrollo']);
    $stock = $funcion->antihack_mysqli(!empty($_POST["stockMenu"]) ? $_POST["stockMenu"] : $menuData['stock']);
    $variante1 = $funcion->antihack_mysqli(!empty($variante1) ? $variante1 : '');
    $variante2 = $funcion->antihack_mysqli(!empty($variante2) ? $variante2 : '');
    $adicional1 = $funcion->antihack_mysqli(!empty($adicional1) ? $adicional1 : '');
    $adicional2 = $funcion->antihack_mysqli(!empty($adicional2) ? $adicional2 : '');

    if ($variante1 == '' || $variante2 == ''):
        $variantes = $menuData['variantes'];
    else:
        $variante1 = implode(',', $_POST["variante1"]);
        $variante2 = implode(',', $_POST["variante2"]);
        $variantes = $variante1 . '|||' . $variante2;
    endif;

    if ($adicional1 == '' || $adicional2 == ''):
        $adicionales = $menuData['adicionales'];
    else:
        $adicional1 = implode(',', $_POST["adicional1"]);
        $adicional2 = implode(',', $_POST["adicional2"]);
        $adicionales = $adicional1 . '|||' . $adicional2;
    endif;

    $menu->set("cod", $menuData['cod']);
    $menu->set("cod_empresa", $menuData['cod_empresa']);
    $menu->set("categoria", $categoria);
    $menu->set("seccion", $seccion);
    $menu->set("titulo", $titulo);
    $menu->set("precio", $precio);
    $menu->set("desarrollo", $desarrollo);
    $menu->set("stock", $stock);
    $menu->set("variantes", $variantes);
    $menu->set("adicionales", $adicionales);
    $menu->set("fecha", $menuData['fecha']);

    if (isset($_FILES["files"]["name"])):
        //imagen
        $imgInicio = $_FILES["files"]["tmp_name"];
        $tucadena = $_FILES["files"]["name"];
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

            $imagenes->set("cod", $cod);
            $imagenes->set("ruta", str_replace("../", "", $destinoRecortado));
            $imagenes->add();
        }
        //imagen
    endif;

    $menu->edit();
    //$funcion->headerMove(URL.'/crear_empresa_paso3');
endif;
?>

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-12">
            <section id="section-2">
                <div class="indent_title_in">
                    <i class="icon_document_alt"></i>
                    <h3>Modificar Menú</h3>
                    <p>Especifique a continuación los detalles del menú.</p>
                </div>
                <input id="val1"/>
                <span id="Display"></span>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select class="form-control" name="categoriaMenu" id="categoriaMenu">
                            <option value="" disabled>Seleccionar Categoría</option>
                            <?php foreach ($categoriasArray as $key => $value): ?>
                                <option value="<?= $value['cod'] ?>" <?php if ($menuData['categoria'] == $value['cod']) {
                                    echo 'selected';
                                } ?>><?= $value['titulo'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a class="MasCampos col-md-12" href="#" onclick="agregarOption('val1','masSecciones')"><i
                                    class="icon_plus_alt"></i> Agregar más secciones</a>
                    </div>

                    <div class="form-group">
                        <label>Sección</label>
                        <select class="form-control" name="seccionMenu" id="masSecciones">
                            <option value="" disabled>Seleccionar Sección</option>
                            <?php foreach ($seccionesArray as $key => $value): ?>
                                <option value="<?= $value['cod'] ?>" <?php if ($menuData['seccion'] == $value['cod']) {
                                    echo 'selected';
                                } ?>><?= $value['titulo'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="strip_menu_items">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Subir foto del menú</label><br/>
                                <div id="dropContainer" class="drop_file">
                                    <span id="spanDrop" style="display: none;">Arrastrar aquí</span>
                                    <img id="imgSalida" src="<?= URL; ?>/<?= $imagenData['ruta'] ?>" width="100%"
                                         src=""/>
                                </div>
                                <label class="btn_full btn btn-primary">
                                    Seleccionar foto<i class="icon-camera"></i>
                                    <input type="file" id="fileInput" name="files" class="form-control">
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Nombre del menú</label>
                                            <input type="text" value="<?= $menuData['titulo'] ?>" name="tituloMenu"
                                                   class="form-control"
                                                   placeholder="Ej. Pizza Napolitana">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="text" value="<?= $menuData['precio'] ?>" name="precioMenu"
                                                   class="form-control"
                                                   placeholder="Ej. 180">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Breve descripción</label>
                                    <input type="text" value="<?= $menuData['desarrollo'] ?>" name="desarrolloMenu"
                                           class="form-control"
                                           placeholder="Ej. Pizza cocinada a la piedra de masa casera">
                                </div>
                                <div class="row">
                                    <label class="col-md-12">Variantes</label>
                                    <?php for ($i = 0; $i < count($variante1Explotada); $i++): ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" value="<?= $variante1Explotada[$i]; ?>"
                                                       name="variante1[]" class="form-control"
                                                       placeholder="20.00">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" value="<?= $variante2Explotada[$i]; ?>"
                                                       name="variante2[]" class="form-control"
                                                       placeholder="Extra queso">
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <a class="MasCampos col-md-12" href="#" id="mascamposVariante"><i
                                                class="icon_plus_alt"></i> Agregar más campos</a>
                                </div>
                                <hr/>
                                <div class="row">
                                    <label class="col-md-12">Adicionales</label>
                                    <?php for ($i = 0; $i < count($adicional1Explotada); $i++): ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" value="<?= $adicional1Explotada[$i]; ?>"
                                                       name="adicional1[]" class="form-control"
                                                       placeholder="40.00">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" value="<?= $adicional2Explotada[$i]; ?>"
                                                       name="adicional2[]" class="form-control"
                                                       placeholder="x1 Coca-cola 500cc">
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <a class="MasCampos col-md-12" href="#" id="mascamposAdicional"><i
                                                class="icon_plus_alt"></i> Agregar más campos</a>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Stock</label>
                                        <input type="text" value="<?= $menuData['stock'] ?>" name="stockMenu"
                                               class="form-control" placeholder="Ej. 24">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End row -->
                    </div><!-- End strip_menu_items -->
        </div><!-- End wrapper_indent -->
        <hr class="styled_2">
        <div class="wrapper_indent">
            <div class="add_more_cat text_align_right">
                <button type="submit" name="crear_menu" class="btn_1">Crear</button>
            </div>
        </div><!-- End wrapper_indent -->
        </form>
        </section><!-- End section 2 -->
    </div><!-- End col-md-6 -->
</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<?php $template->themeEnd() ?>

<!-- SPECIFIC SCRIPTS -->
<script src="<?= URL ?>/assets/js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
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
                texto_insertar = '<div class="col-md-4"><div class="form-group"><input type="text" name="' + nombreCampo1 + '" class="form-control" /></div></div><div class="col-md-8"><div class="form-group"><input type="text" name="' + nombreCampo2 + '" class="form-control" /></div></div>';
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
</script>

<script>
    $(document).ready(function () {
        function agregarOption(val,id) {
            var valor = $('#'+val);
            var id = $('#'+id);
            var option = "<option value='"+valor.val()+"' selected>"+valor.val()+"</option>";
            id.append(option);
            valor.val("");
        });
    });
</script>
