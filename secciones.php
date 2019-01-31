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
$seccion = new Clases\Secciones();
$usuario = new Clases\Usuarios();
$producto = new Clases\Productos();

$cod_usuario = $_SESSION['usuarios']['cod'];

$empresa->set("cod_usuario", $cod_usuario);
$empresaData = $empresa->view();
$cod_empresa = $empresaData['cod'];

$filterSeccion = array("cod_empresa = '" . $cod_empresa . "'");
$seccionArray = $seccion->list($filterSeccion, "", "");

$filterProducto = array("cod_empresa = '" . $cod_empresa . "'");
$productoArray = $producto->list($filterProducto, "", "");
?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400">

    <div id="subheader">
        <div id="sub_content">
            <h1>Sección de menús</h1>
            <p>Administre todas sus secciones desde aquí</p>
            <p></p>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Inicio</a></li>
            <li>Crear Sección</li>
        </ul>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-2">
            <a href="<?= URL ?>/panel#seccion-2" class="btn_full"><i class="icon-reply"></i> Ir al panel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section id="section-2">
                <div class="indent_title_in">
                    <i class="icon_document_alt"></i>
                    <h3>Secciones</h3>
                    <p>A continuación se listan todas sus secciones creadas.</p>
                </div>

                <?php
                if (isset($_POST["aplicar"])) {
                    $titulo = $_POST["titulo"];
                    $cod = $_POST["cod"];

                    for ($i = 0; $i < count($titulo); $i++) {
                        $seccion->set("cod", $cod[$i]);
                        $seccion->set("titulo", $titulo[$i]);
                        $seccion->set("cod_empresa", $cod_empresa);

                        if ($titulo[$i] == "eliminado") {
                            echo "si";
                            $seccion->delete();
                            foreach ($productoArray as $key => $value) {
                                if ($value['seccion'] == $cod[$i]) {
                                    $producto->set("cod", $value['cod']);
                                    $producto->editUnico("seccion", "sin-clasificar");
                                }
                            }
                        } else {
                            if (!$seccionArray) {
                                $seccionArray = array(0 => array("cod" => "vacio"));
                            }
                            foreach ($seccionArray as $key => $value):
                                $seccionValores[] = $value['cod'];
                            endforeach;
                            if (array_search($cod[$i], $seccionValores) === false) {
                                $seccion->add();
                            } else {
                                $seccion->edit();
                            }
                        }
                    }
                    $funcion->headerMove(CANONICAL);
                }
                ?>
                <form method="post">
                    <button class="btn_1" type="submit" name="aplicar">Aplicar</button>
                    <br><br>
                    <div class="row">
                        <?php foreach ($seccionArray as $key => $value) { ?>
                            <div id="<?= $value['cod'] ?>">
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="titulo[]" value="<?= $value['titulo'] ?>">
                                    <input type="hidden" name="cod[]" value="<?= $value['cod'] ?>">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" onclick="eliminar('<?= $value['cod'] ?>')" class="btn_1"><i class="icon-cancel-6"></i></button>
                                </div>
                                <div class="clearfix"></div>
                                <br/>
                            </div>
                        <?php } ?>
                        <a class="MasCampos col-md-12" href="#" id="mascamposSeccion"><i
                                    class="icon_plus_alt"></i> Agregar más campos</a>
                    </div>
                </form>
            </section><!-- End section 2 -->
        </div><!-- End col-md-6 -->
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<?php $template->themeEnd() ?>
<script>
    function eliminar(id) {
        $('#' + id + ' input:first').attr('type', 'hidden');
        $('#' + id + ' input:first').attr('value', 'eliminado');
        $('#' + id + ' .col-md-10').append('<h5 class="alert alert-danger" style="margin-top: 0;padding: 10px;margin-bottom: 0;">Eliminado</h5>');
        $('#' + id + ' button').hide();
    }
</script>

<script>//Script para que el usuario genere nuevos campos
    jQuery.fn.generaNuevosCampos = function (cod, nombreCampo) {
        $(this).each(function () {
            elem = $(this);
            elem.data("cod", cod);
            elem.data("nombreCampo", nombreCampo);

            setInterval(function () {
                var num = 1 + Math.floor(Math.random() * 6);
                return num;
            }, 1000);

            elem.click(function (e) {
                e.preventDefault();
                elem = $(this);
                cod = (elem.data("cod")) + setInterval(1);
                nombreCampo = elem.data("nombreCampo");
                texto_insertar = '<div id="' + cod + '"><div class="col-md-10"><input class="form-control" type="text" name="' + nombreCampo + '" /><input type="hidden" name="cod[]" value="' + cod + '"></div><div class="col-md-2"><button type="button" onclick="eliminar(\'' + cod + '\')" class="btn_1"><i class="icon-cancel-6"></i></button></div><div class="clearfix"></div><br/></div>';
                nuevo_campo = $(texto_insertar);
                elem.before(nuevo_campo);
            });
        });
        return this;
    }

    $(document).ready(function () {
        $("#mascamposSeccion").generaNuevosCampos("<?= substr(md5(uniqid(rand())), 0, 10);?>", "titulo[]");
    });
</script>