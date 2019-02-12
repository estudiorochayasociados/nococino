<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$contenidos = new Clases\Contenidos();
$template->set("title", TITULO." | Nosotros");
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
$id = isset($_GET["id"]) ? $_GET["id"] : '';
$contenidos->set("cod", $id);
$contenido = $contenidos->view();
?>
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400" >
         <div id="subheader">
            <div id="sub_content">
                <h1><?= ucwords(strtolower($contenido["cod"])) ?></h1>
                <p>Queremos que tengas al instante toda la guía gastronómica de tu ciudad</p>
            </div>
        </div>
    </section>
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0"><p><?= $contenido["cod"] ?></p></a></li>
            </ul>
        </div>
    </div>
    <div class="container margin_60_35">
        <div class="row" id="contacts">
            <div class="col-md-12">
                <?= $contenido["contenido"] ?>
            </div>
        </div>
    </div>
<?php $template->themeEnd(); ?>