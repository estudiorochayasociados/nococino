<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "CES | Inicio");
$template->set("description", "");
$template->set("keywords", "");
$template->set("favicon", LOGO);
$template->themeInit();
?>
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?= URL ?>/assets/img/bkg.jpg" data-natural-width="1400" >
        <div id="subheader">
            <div id="sub_content">
                <h1>Contacto</h1>
                <p>Envianos tus consultas</p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Contacto</a></li>
                <li>Enviar tu mensaje</li>
            </ul>
        </div>
    </div><!-- Position -->

    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row" id="contacts">
            <div class="col-md-6 col-sm-6">
                <div class="box_style_2">
                    <h2 class="inner">Customer service</h2>
                    <p class="add_bottom_30">Adipisci conclusionemque ea duo, quo id fuisset prodesset, vis ea agam
                        quas. <strong>Lorem iisque periculis</strong> id vis, no eum utinam interesset. Quis voluptaria
                        id per, an nibh atqui vix. Mei falli simul nusquam te.</p>
                    <p><a href="tel://004542344599" class="phone"><i class="icon-phone-circled"></i> +45 423 445 70</a>
                    </p>
                    <p class="nopadding"><a href="mailto:customercare@quickfood.com"><i class="icon-mail-3"></i>
                            customercare@quickfood.com</a></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="box_style_2">
                    <h2 class="inner">Restaurant Support</h2>
                    <p class="add_bottom_30">Quo ex rebum petentium, cum alia illud molestiae in, pro ea paulo
                        gubergren. Ne case constituto pro, ex vis delenit complectitur, per ad <strong>everti
                            timeam</strong> conclusionemque. Quis voluptaria id per, an nibh atqui vix.</p>
                    <p><a href="tel://004542344599" class="phone"><i class="icon-phone-circled"></i> +45 423 445 99</a>
                    </p>
                    <p class="nopadding"><a href="mailto:customercare@quickfood.com"><i class="icon-mail-3"></i>
                            support@quickfood.com</a></p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->


<?php $template->themeEnd(); ?>