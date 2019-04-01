<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="https://www.facebook.com/Nococinoarg/"><i class="icon-facebook"></i></a></li> 
                        <li><a href="https://www.instagram.com/nococinoarg/?hl=es-la"><i class="icon-instagram"></i></a></li> 
                    </ul>
                    <p>
                        © Desarrollado por Estudio Rocha & Asociados - Derechos Reservados por <b><?=TITULO?></b> 2019
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer>

<!-- COMMON SCRIPTS -->
<script src="<?= URL ?>/assets/js/jquery-2.2.4.min.js"></script>
<script src="<?= URL ?>/assets/js/common_scripts_min.js"></script>
<script src="<?= URL ?>/assets/js/functions.js"></script>
<script src="<?= URL ?>/assets/js/validate.js"></script>
<script src="<?= URL ?>/assets/lightbox/js/lightbox.min.js"></script>


<script>
    $("#provincia").change(function () {
        $("#provincia option:selected").each(function () {
            elegido = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?=URL ?>/assets/inc/localidades.inc.php",
                data: "elegido=" + elegido,
                dataType: "html",
                success: function (data) {
                    $('#localidad option').remove();
                    var substr = data.split(';');
                    for (var i = 0; i < substr.length; i++) {
                        var value = substr[i];
                        $("#localidad").append(
                            $("<option></option>").attr("value", value).text(value)
                        );
                    }
                }
            });
        });
    })
</script>

<script>
    var plan = '<?=PLAN?>';
    if(plan == 1){
        $('.hidden-plan1').hide();
    }
    if(plan == 2){
        $('.hidden-plan2').hide();
    }
    if(plan == 3){
        $('.hidden-plan3').hide();
    }
</script>

<script>
    lightbox.option({
        'showImageNumberLabel': false
    })
</script>