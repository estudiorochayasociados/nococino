<?php $filterCrearEmpresa = array("cod_usuario = '" . $_SESSION['usuarios']['cod'] . "'");
$existeEmpresa = $empresa->list($filterCrearEmpresa, "", "");
$borrarImg = $funcion->antihack_mysqli(isset($_GET["borrarImg"]) ? $_GET["borrarImg"] : '');
if ($borrarImg != '') {
    $imagenes->set("id", $borrarImg);
    $imagenes->delete();
    $funcion->headerMove(URL . "/panel");
}
if (!empty($existeEmpresa)):
    $mostrardivEmpresa = 'style = "display: none;"';
    $mostrardivEmpresa2 = '';
else:
    $mostrardivEmpresa = '';
    $mostrardivEmpresa2 = 'style = "display: none;"';
endif;
$horariosArray = unserialize($empresaData["horarios"]);
?>
<div class="col-md-offset-3 col-md-6" <?= $mostrardivEmpresa ?>>
    <div class="box_style_2">
        <div id="confirm">
            <i class="icon-shop-1"></i>
            <h3>¡Completá los datos de tu empresa y empezá a vender!</h3>
        </div>
        <a href="<?= URL ?>/panel?op=crearEmpresaPaso1" class="btn_full">Crear Empresa</a>
    </div>
</div>

<div <?= $mostrardivEmpresa2 ?>>
    <?php
    $horariosEmpresa = unserialize($empresaData['horarios']);

    if (isset($_POST["modificarEmpresa"])):

        $titulo = $funcion->antihack_mysqli(!empty($_POST["tituloEmpresa"]) ? $_POST["tituloEmpresa"] : $empresaData['titulo']);
        $desarrollo = $funcion->antihack_mysqli(!empty($_POST["desarrolloEmpresa"]) ? $_POST["desarrolloEmpresa"] : $empresaData['desarrollo']);
        $telefono = $funcion->antihack_mysqli(!empty($_POST["telefonoEmpresa"]) ? $_POST["telefonoEmpresa"] : $empresaData['telefono']);
        $email = $funcion->antihack_mysqli(!empty($_POST["emailEmpresa"]) ? $_POST["emailEmpresa"] : $empresaData['email']);
        $provincia = $funcion->antihack_mysqli(!empty($_POST["provinciaEmpresa"]) ? $_POST["provinciaEmpresa"] : $empresaData['provincia']);
        $ciudad = $funcion->antihack_mysqli(!empty($_POST["ciudadEmpresa"]) ? $_POST["ciudadEmpresa"] : $empresaData['ciudad']);
        $barrio = $funcion->antihack_mysqli(!empty($_POST["barrioEmpresa"]) ? $_POST["barrioEmpresa"] : $empresaData['barrio']);
        $direccion = $funcion->antihack_mysqli(!empty($_POST["direccionEmpresa"]) ? $_POST["direccionEmpresa"] : $empresaData['direccion']);
        $postal = $funcion->antihack_mysqli(!empty($_POST["postalEmpresa"]) ? $_POST["postalEmpresa"] : $empresaData['postal']);
        $delivery = $funcion->antihack_mysqli(isset($_POST["deliveryEmpresa"]) ? $_POST["deliveryEmpresa"] : $empresaData['delivery']);
        $tiempoEntrega = $funcion->antihack_mysqli(isset($_POST["tiempoEntregaEmpresa"]) ? $_POST["tiempoEntregaEmpresa"] : $empresaData['tiempoEntrega']);

        if ($direccion != $empresaData['direccion'] || $ciudad != $empresaData['ciudad'] || $provincia != $empresaData['provincia']):
            $ubicacionEmpresa = $direccion . '+' . $ciudad . '+' . $provincia;
            $ubicacionEmpresa = str_replace("-", "+", $funcion->normalizar_link($ubicacionEmpresa));

            $jsonEmpresa = json_decode(file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=Nkd7zJVtg6iaOyaQoEvK&app_code=HTkK8DlaV14bg6RDCA-pQA&searchtext=' . $ubicacionEmpresa));
            $empresaLongitud = $jsonEmpresa->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;
            $empresaLatitud = $jsonEmpresa->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
            $coordenadas = $empresaLatitud . ',' . $empresaLongitud;
        else:
            $coordenadas = $empresaData['coordenadas'];
        endif;

        //Horarios
        if ($horariosEmpresa["Lunes"]["Manana"][0] && $_POST["Lunes"][0] === NULL) {
            $lunes[0] = $horariosEmpresa["Lunes"]["Manana"][0];
            $lunes[1] = $horariosEmpresa["Lunes"]["Manana"][1];
        }else{
            $lunes[0] = $_POST["Lunes"][0];
            $lunes[1] = $_POST["Lunes"][1];
        }
        if ($horariosEmpresa["Lunes"]["Tarde"][0] && $_POST["Lunes"][2] === NULL) {
            $lunes[2] = $horariosEmpresa["Lunes"]["Tarde"][0];
            $lunes[3] = $horariosEmpresa["Lunes"]["Tarde"][1];
        } else {
            $lunes[2] = $_POST["Lunes"][2];
            $lunes[3] = $_POST["Lunes"][3];
        }

        if ($horariosEmpresa["Martes"]["Manana"][0] && $_POST["Martes"][0] === NULL) {
            $martes[0] = $horariosEmpresa["Martes"]["Manana"][0];
            $martes[1] = $horariosEmpresa["Martes"]["Manana"][1];
        }else{
            $martes[0] = $_POST["Martes"][0];
            $martes[1] = $_POST["Martes"][1];
        }
        if ($horariosEmpresa["Martes"]["Tarde"][0] && $_POST["Martes"][2] === NULL) {
            $martes[2] = $horariosEmpresa["Martes"]["Tarde"][0];
            $martes[3] = $horariosEmpresa["Martes"]["Tarde"][1];
        } else {
            $martes[2] = $_POST["Martes"][2];
            $martes[3] = $_POST["Martes"][3];
        }

        if ($horariosEmpresa["Miercoles"]["Manana"][0] && $_POST["Miercoles"][0] === NULL) {
            $miercoles[0] = $horariosEmpresa["Miercoles"]["Manana"][0];
            $miercoles[1] = $horariosEmpresa["Miercoles"]["Manana"][1];
        }else{
            $miercoles[0] = $_POST["Miercoles"][0];
            $miercoles[1] = $_POST["Miercoles"][1];
        }
        if ($horariosEmpresa["Miercoles"]["Tarde"][0] && $_POST["Miercoles"][2] === NULL) {
            $miercoles[2] = $horariosEmpresa["Miercoles"]["Tarde"][0];
            $miercoles[3] = $horariosEmpresa["Miercoles"]["Tarde"][1];
        } else {
            $miercoles[2] = $_POST["Miercoles"][2];
            $miercoles[3] = $_POST["Miercoles"][3];
        }

        if ($horariosEmpresa["Jueves"]["Manana"][0] && $_POST["Jueves"][0] === NULL) {
            $jueves[0] = $horariosEmpresa["Jueves"]["Manana"][0];
            $jueves[1] = $horariosEmpresa["Jueves"]["Manana"][1];
        }else{
            $jueves[0] = $_POST["Jueves"][0];
            $jueves[1] = $_POST["Jueves"][1];
        }
        if ($horariosEmpresa["Jueves"]["Tarde"][0] && $_POST["Jueves"][2] === NULL) {
            $jueves[2] = $horariosEmpresa["Jueves"]["Tarde"][0];
            $jueves[3] = $horariosEmpresa["Jueves"]["Tarde"][1];
        } else {
            $jueves[2] = $_POST["Jueves"][2];
            $jueves[3] = $_POST["Jueves"][3];
        }

        if ($horariosEmpresa["Viernes"]["Manana"][0] && $_POST["Viernes"][0] === NULL) {
            $viernes[0] = $horariosEmpresa["Viernes"]["Manana"][0];
            $viernes[1] = $horariosEmpresa["Viernes"]["Manana"][1];
        }else{
            $viernes[0] = $_POST["Viernes"][0];
            $viernes[1] = $_POST["Viernes"][1];
        }
        if ($horariosEmpresa["Viernes"]["Tarde"][0] && $_POST["Viernes"][2] === NULL) {
            $viernes[2] = $horariosEmpresa["Viernes"]["Tarde"][0];
            $viernes[3] = $horariosEmpresa["Viernes"]["Tarde"][1];
        } else {
            $viernes[2] = $_POST["Viernes"][2];
            $viernes[3] = $_POST["Viernes"][3];
        }

        if ($horariosEmpresa["Sabado"]["Manana"][0] && $_POST["Sabado"][0] === NULL) {
            $sabado[0] = $horariosEmpresa["Sabado"]["Manana"][0];
            $sabado[1] = $horariosEmpresa["Sabado"]["Manana"][1];
        }else{
            $sabado[0] = $_POST["Sabado"][0];
            $sabado[1] = $_POST["Sabado"][1];
        }
        if ($horariosEmpresa["Sabado"]["Tarde"][0] && $_POST["Sabado"][2] === NULL) {
            $sabado[2] = $horariosEmpresa["Sabado"]["Tarde"][0];
            $sabado[3] = $horariosEmpresa["Sabado"]["Tarde"][1];
        } else {
            $sabado[2] = $_POST["Sabado"][2];
            $sabado[3] = $_POST["Sabado"][3];
        }

        if ($horariosEmpresa["Domingo"]["Manana"][0] && $_POST["Domingo"][0] === NULL) {
            $domingo[0] = $horariosEmpresa["Domingo"]["Manana"][0];
            $domingo[1] = $horariosEmpresa["Domingo"]["Manana"][1];
        }else{
            $domingo[0] = $_POST["Domingo"][0];
            $domingo[1] = $_POST["Domingo"][1];
        }
        if ($horariosEmpresa["Domingo"]["Tarde"][0] && $_POST["Domingo"][2] === NULL) {
            $domingo[2] = $horariosEmpresa["Domingo"]["Tarde"][0];
            $domingo[3] = $horariosEmpresa["Domingo"]["Tarde"][1];
        } else {
            $domingo[2] = $_POST["Domingo"][2];
            $domingo[3] = $_POST["Domingo"][3];
        }
        $horarios = array(
            "Lunes" => array(
                "Manana" => array(
                    $lunes[0],
                    $lunes[1],
                ),
                "Tarde" => array(
                    $lunes[2],
                    $lunes[3],
                )
            ),
            "Martes" => array(
                "Manana" => array(
                    $martes[0],
                    $martes[1],
                ),
                "Tarde" => array(
                    $martes[2],
                    $martes[3],
                )
            ),
            "Miercoles" => array(
                "Manana" => array(
                    $miercoles[0],
                    $miercoles[1],
                ),
                "Tarde" => array(
                    $miercoles[2],
                    $miercoles[3],
                )
            ),
            "Jueves" => array(
                "Manana" => array(
                    $jueves[0],
                    $jueves[1],
                ),
                "Tarde" => array(
                    $jueves[2],
                    $jueves[3],
                )
            ),
            "Viernes" => array(
                "Manana" => array(
                    $viernes[0],
                    $viernes[1],
                ),
                "Tarde" => array(
                    $viernes[2],
                    $viernes[3],
                )
            ),
            "Sabado" => array(
                "Manana" => array(
                    $sabado[0],
                    $sabado[1],
                ),
                "Tarde" => array(
                    $sabado[2],
                    $sabado[3],
                )
            ),
            "Domingo" => array(
                "Manana" => array(
                    $domingo[0],
                    $domingo[1],
                ),
                "Tarde" => array(
                    $domingo[2],
                    $domingo[3],
                )
            ),
        );
        $horarios = serialize($horarios);

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
        $empresa->set("delivery", $delivery);
        $empresa->set("horarios", $horarios);
        $empresa->set("tiempoEntrega", $tiempoEntrega);
        $empresa->set("coordenadas", $coordenadas);

        $senalEnvio = 0;
        foreach ($_POST["enviosEmpresa1"] as $item){
            if($item){
                $senalEnvio = 1;
            }
        }

        if ($senalEnvio == 1) {
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
        } elseif($_POST["enviosEmpresa1"] != NULL) {
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

    <div class="indent_title_in">
        <i class="icon-clock"></i>
        <h3>Horarios de atención</h3>
        <p>
            Completa los datos sobre los horarios de atención.
        </p>
        <div class="row">
            <div class="col-md-3"><br/>
                <button class="btn_full" id="link0" href="#">Modificar</button>
            </div>
        </div>
    </div>
    <div class="wrapper_indent" id="horariosEmpresa" style="display: none;">
        <form method="post">
            <div class="row">
                <div class="clearfix"></div>
                <?php
                $diasArray = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
                foreach ($diasArray as $item) { ?>
                    <div class="col-sm-1">
                        <h5><b><?= $item ?></b></h5>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="<?= $item ?>[]" value="<?= $horariosArray[$item]['Manana'][0] ?>"
                                   class="form-control"
                                   placeholder="09:00">
                        </div>
                    </div>
                    <div class="col-sm-1 text-center"><h5>Hasta</h5></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="<?= $item ?>[]" value="<?= $horariosArray[$item]['Manana'][1] ?>"
                                   class="form-control"
                                   placeholder="14:00">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="<?= $item ?>[]" value="<?= $horariosArray[$item]['Tarde'][0] ?>"
                                   class="form-control"
                                   placeholder="19:00">
                        </div>
                    </div>
                    <div class="col-sm-1 text-center"><h5>Hasta</h5></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="<?= $item ?>[]" value="<?= $horariosArray[$item]['Tarde'][1] ?>"
                                   class="form-control"
                                   placeholder="00:00">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php } ?>
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

    <hr class="styled_2">

    <div class="indent_title_in">
        <i class="icon-truck"></i>
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
    <div class="wrapper_indent" id="enviosEmpresa" style="display: none;">
        <form method="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <h4>¿Cuentan con delivery?</h4>
                        <select name="deliveryEmpresa" class="form-control">
                            <option selected disabled>Seleccionar</option>
                            <option value="1" <?php if ($empresaData['delivery'] == 1) {
                                echo 'selected';
                            } ?>>Si
                            </option>
                            <option value="0" <?php if ($empresaData['delivery'] == 0) {
                                echo 'selected';
                            } ?>>No
                            </option>
                        </select>
                    </div>
                </div>
                <div class="hidden-plan1 hidden-plan2 col-md-3">
                    <div class="form-group">
                        <h4>Tiempo de entrega</h4>
                        <input type="text" value="<?= $empresaData['tiempoEntrega'] ?>" id="tiempoEntregaEmpresa"
                               name="tiempoEntregaEmpresa" class="form-control"
                               placeholder="Ej. 35">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="hidden-plan1 hidden-plan2">
                    <?php foreach ($enviosArray as $key => $value) { ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" value="<?= $value['titulo'] ?>" id="enviosEmpresa1"
                                       name="enviosEmpresa1[]" class="form-control"
                                       placeholder="Ej. Envío zona centro">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Costo</label>
                                <input type="number" value="<?= $value['precio'] ?>" id="enviosEmpresa2"
                                       name="enviosEmpresa2[]" class="form-control"
                                       placeholder="Ej. 50">
                            </div>
                        </div>
                    <?php } ?>
                    <a class="MasCampos col-md-12" href="#" id="mascamposEnvios"><i
                                class="icon_plus_alt"></i> Agregar más campos</a>
                </div>
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

    <hr class="styled_2">

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
                            foreach ($imagenesArrayEmpresa as $key => $value):
                                echo "<div class='col-md-2 mb-20 mt-20'>";
                                echo "<div style='height: 160px;background: url(" . URL . "/" . $value['ruta'] . ")center/contain no-repeat;'></div>";
                                echo "<a href='" . URL . "/panel?op=empresa&borrarImg=" . $value["id"] . "' class='mt-5 btn btn-primary'>BORRAR IMAGEN</a>";
                                echo "<div class='clearfix'></div>";
                                echo "</div>";
                            endforeach;
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