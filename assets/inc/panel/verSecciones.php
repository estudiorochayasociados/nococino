<?php
$cod_usuario = $_SESSION['usuarios']['cod'];

$empresa->set("cod_usuario", $cod_usuario);
$empresaData = $empresa->view();
$cod_empresa = $empresaData['cod'];

$filterSeccion = array("cod_empresa = '" . $cod_empresa . "'");
$seccionArray = $seccion->list($filterSeccion, "", "");

$filterProducto = array("cod_empresa = '" . $cod_empresa . "'");
$productoArray = $producto->list($filterProducto, "", "");
?>

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
                                <button type="button" onclick="eliminarSeccion('<?= $value['cod'] ?>')" class="btn_1"><i class="icon-cancel-6"></i></button>
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