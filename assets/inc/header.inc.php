<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- GOOGLE WEB FONT -->
<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet'
type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>

<!-- BASE CSS -->
<link href="<?= URL ?>/assets/css/base.css" rel="stylesheet">
<link href="<?= URL ?>/assets/css/estilos.css" rel="stylesheet">
<!-- BASE CSS -->

<!-- Modernizr -->
<script src="<?= URL ?>/assets/js/modernizr.js"></script>

<!-- SPECIFIC CSS -->
<link href="<?= URL ?>/assets/css/skins/square/grey.css" rel="stylesheet">
<link href="<?= URL ?>/assets/css/admin.css" rel="stylesheet">
<link href="<?= URL ?>/assets/css/bootstrap3-wysihtml5.min.css" rel="stylesheet">
<link href="<?= URL ?>/assets/css/dropzone.css" rel="stylesheet">

<!-- Radio and check inputs -->
<link href="<?= URL ?>/assets/css/skins/square/grey.css" rel="stylesheet">

<!-- slider restaurante -->
<link href="<?= URL ?>/assets/css/owl.css" rel="stylesheet">
<link href="<?= URL ?>/assets/css/jquery.fancybox.css" rel="stylesheet">

<!-- lightbox -->
<link href="<?= URL ?>/assets/lightbox/css/lightbox.min.css" rel="stylesheet">


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127300251-21"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127300251-21');
</script>


<!--[if lt IE 9]>
<script src="<?= URL ?>/assets/js/html5shiv.min.js"></script>
<script src="<?= URL ?>/assets/js/respond.min.js"></script>
<![endif]-->
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

<link rel="manifest" href="/manifest.json" />
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "0302c572-d312-49e1-920f-0f8ee7619c95",
            autoRegister: true,
            notifyButton: {
                enable: true,
            },
        });
    });
</script>