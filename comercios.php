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
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_short.jpg"
             data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Comercios</h1>
                <p>Elegí a uno de todos estos comercios y realizá tu pedido</p>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-3">
                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false"
                       aria-controls="collapseFilters" id="filters_col_bt">Filtrar tu búsqueda <i
                                class="icon-plus-1 pull-right"></i></a>
                    <div class="collapse" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Tipo de comida</h6>
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar comercio..." />
                        </div>
                        <div class="filter_type">
                            <h6>Tipo de comida</h6>
                            <ul>
                                <li><label><input type="checkbox" checked class="icheck">All
                                        <small>(49)</small>
                                    </label></li>
                                <li><label><input type="checkbox" class="icheck">American
                                        <small>(12)</small>
                                    </label><i class="color_1"></i></li>
                                <li><label><input type="checkbox" class="icheck">Chinese
                                        <small>(5)</small>
                                    </label><i class="color_2"></i></li>
                                <li><label><input type="checkbox" class="icheck">Hamburger
                                        <small>(7)</small>
                                    </label><i class="color_3"></i></li>
                                <li><label><input type="checkbox" class="icheck">Fish
                                        <small>(1)</small>
                                    </label><i class="color_4"></i></li>
                                <li><label><input type="checkbox" class="icheck">Mexican
                                        <small>(49)</small>
                                    </label><i class="color_5"></i></li>
                                <li><label><input type="checkbox" class="icheck">Pizza
                                        <small>(22)</small>
                                    </label><i class="color_6"></i></li>
                                <li><label><input type="checkbox" class="icheck">Sushi
                                        <small>(43)</small>
                                    </label><i class="color_7"></i></li>
                            </ul>
                        </div>
                    </div><!--End collapse -->
                </div><!--End filters col-->
            </div><!--End col-md -->

            <div class="col-md-9">
                <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="<?= URL ?>/detail_page.html"><img src="img/thumb_restaurant.jpg" alt=""></a>
                                </div>
                                <h3>Taco Mexican</h3>
                                <div class="type">
                                    Mexican / American
                                </div>
                                <div class="location">
                                    135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00.</span>
                                    Minimum order: $15
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_check_alt2 no"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL ?>/detail_page.html" class="btn_1">ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->

                <div class="strip_list wow fadeIn" data-wow-delay="0.2s">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="<?= URL ?>/detail_page.html"><img src="img/thumb_restaurant_2.jpg" alt=""></a>
                                </div>
                                <h3>Naples Pizza</h3>
                                <div class="type">
                                    Italian / Pizza
                                </div>
                                <div class="location">
                                    135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00.</span>
                                    Minimum order: $15
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL ?>/detail_page.html" class="btn_1">ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->

                <div class="strip_list wow fadeIn" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="<?= URL ?>/detail_page.html"><img src="img/thumb_restaurant_3.jpg" alt=""></a>
                                </div>
                                <h3>Japan Food</h3>
                                <div class="type">
                                    Sushi / Japanese
                                </div>
                                <div class="location">
                                    135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00.</span>
                                    Minimum order: $15
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL ?>/detail_page.html" class="btn_1">ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->

                <div class="strip_list wow fadeIn" data-wow-delay="0.4s">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="<?= URL ?>/detail_page.html"><img src="img/thumb_restaurant_4.jpg" alt=""></a>
                                </div>
                                <h3>Sushi Gold</h3>
                                <div class="type">
                                    Sushi / Japanese
                                </div>
                                <div class="location">
                                    135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00.</span>
                                    Minimum order: $15
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL ?>/detail_page.html" class="btn_1">ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->

                <div class="strip_list wow fadeIn" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="<?= URL ?>/detail_page.html"><img src="img/thumb_restaurant_5.jpg" alt=""></a>
                                </div>
                                <h3>Dragon Tower</h3>
                                <div class="type">
                                    Chinese / Thai
                                </div>
                                <div class="location">
                                    135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00.</span>
                                    Minimum order: $15
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL ?>/detail_page.html" class="btn_1">ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->

                <div class="strip_list last wow fadeIn" data-wow-delay="0.6s">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <div class="desc">
                                <div class="thumb_strip">
                                    <a href="<?= URL ?>/detail_page.html"><img src="img/thumb_restaurant_6.jpg" alt=""></a>
                                </div>
                                <h3>China Food</h3>
                                <div class="type">
                                    Chinese / Vietnam
                                </div>
                                <div class="location">
                                    135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00.</span>
                                    Minimum order: $15
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="go_to">
                                <div>
                                    <a href="<?= URL ?>/detail_page.html" class="btn_1">ver más</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->
                </div>
            </div><!-- End col-md-9-->

        </div><!-- End row -->
    </div>
<?php $template->themeEnd() ?>