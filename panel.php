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
$imagenes = new Clases\Imagenes();
$zebra = new Clases\Zebra_Image();
$empresa = new Clases\Empresas();
$menu = new Clases\Productos();
$producto = new Clases\Productos();
$categoria = new Clases\Categorias();
$pedido = new Clases\Pedidos();
$seccion = new Clases\Secciones();
$envio = new Clases\Envios();

$op = isset($_GET["op"]) ? $_GET["op"] : '';

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

if (isset($_GET['pagina'])) {
    $url = $funcion->eliminar_get(CANONICAL, 'pagina');
} else {
    $url = CANONICAL;
}

$filterMenu = array("cod_empresa = '" . $empresaData['cod'] . "'");
$menuArray = $menu->list($filterMenu, "", $cantidad * $pagina . ',' . $cantidad);
$numeroPaginas = $menu->paginador($filterMenu, $cantidad);

if (isset($_GET['pagina'])) {
    $funcion->headerMove(CANONICAL . '#seccion-2');
}
?>

<?php
if ($_SESSION["usuarios"]["vendedor"] == 0) {
    $displaySeccion = "style=\"display: none\"";
    $displayTab = "style=\"display: none\"";
    $classSeccion = "class=\"content-current\"";
    $classTab = "class=\"tab-current\"";
} else {
    $displaySeccion = "";
    $displayTab = "";
    $classSeccion = "";
    $classTab = "";
}
?>

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
    <?php
    if ($op == "loginEmpresa") {
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '';
        unset($_SESSION["usuarios"]);
        $usuario->set("email", $email);
        $usuario->set("password", $password);
        $usuario->login_hash();
        $funcion->headerMove(URL . '/panel#seccion-1');
    } else {
        if (count($usuarioData) != 0) {
            switch ($op) {
                case "crearEmpresaPaso1":
                    include("assets/inc/panel/crearEmpresaPaso1.php");
                    break;
                case "crearEmpresaPaso2":
                    include("assets/inc/panel/crearEmpresaPaso2.php");
                    break;
                case "crearEmpresaPaso3":
                    include("assets/inc/panel/crearEmpresaPaso3.php");
                    break;
                case "crearMenu":
                    include("assets/inc/panel/crearMenu.php");
                    break;
                case "modificarMenu":
                    include("assets/inc/panel/modificarMenu.php");
                    break;
                case "verSecciones":
                    include("assets/inc/panel/verSecciones.php");
                    break;
                case "verPedidosEmpresa":
                    include("assets/inc/panel/verPedidosEmpresa.php");
                    break;
                case "verPedidosUsuario":
                    include("assets/inc/panel/verPedidosUsuario.php");
                    break;
                case "logout":
                    $usuario->logout();
                    break;
                default:
                    include("assets/inc/panel/tabs.php");
                    break;
            }
        } else {
            $funcion->headerMove(URL . '/index');
        }
    }
    ?>
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
    document.getElementById('link0').addEventListener('click', function () {
        document.getElementById('horariosEmpresa').style.display = 'block';
        document.getElementById('link0').style.display = 'none';
    }, false);
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
        $("#mascamposEnvios").generaNuevosCampos("enviosEmpresa1[]", "enviosEmpresa2[]");
    });
</script>

<script>
    function eliminarSeccion(id) {
        $('#' + id + ' input:first').attr('type', 'hidden');
        $('#' + id + ' input:first').attr('value', 'eliminado');
        $('#' + id + ' .col-md-10').append('<h5 class="alert alert-danger" style="margin-top: 0;padding: 10px;margin-bottom: 0;">Eliminado</h5>');
        $('#' + id + ' button').hide();
    }
</script>

<script>//Script para que el usuario genere nuevos campos en """seccion"""
    jQuery.fn.generaNuevosCamposSeccion = function (cod, nombreCampo) {
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
        $("#mascamposSeccion").generaNuevosCamposSeccion("<?= substr(md5(uniqid(rand())), 0, 10);?>", "titulo[]");
    });
</script>

<!-- SPECIFIC SCRIPTS -->
<script src="<?= URL ?>/assets/js/theia-sticky-sidebar.js"></script>
<script>
    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 80
    });
</script>

<script>//Script para que el usuario genere nuevos campos """VarianteAdicional"""
    jQuery.fn.generaNuevosCamposVarianteAdicional = function (nombreCampo1, nombreCampo2) {
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
        $("#mascamposVariante").generaNuevosCamposVarianteAdicional("variante1[]", "variante2[]");
    });

    $(document).ready(function () {
        $("#mascamposAdicional").generaNuevosCamposVarianteAdicional("adicional1[]", "adicional2[]");
    });
</script>

<script>//agregar seccion
    document.getElementById('btnSecciones').addEventListener('click', function () {
        document.getElementById('val1').style.display = 'block';
        document.getElementById('masSecciones').style.display = 'block';
    }, false);

    $(document).ready(function () {
        $("#masSecciones").click(function () {
            var resultado = $("#val1").val();
            var option = "<option value='" + resultado + "' selected>" + resultado + "</option>";
            $("#seccionMenu").append(option);
            $("#val1").val("");
        });
    });
</script>