<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
    <title><?php echo get_bloginfo( 'sitename' ) . ' - ' . get_bloginfo( 'description' ); ?></title>
    <link href="<?php echo THEME_URL; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <link href="<?php echo THEME_URL; ?>/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo THEME_URL; ?>/js/jquery.min.js"></script>
    <script src="<?php echo THEME_URL; ?>/js/numscroller-1.0.js"></script>
    <!-- Custom Theme files -->
    <!--menu-->
    <script src="<?php echo THEME_URL; ?>/js/scripts.js"></script>
    <link href="<?php echo THEME_URL; ?>/css/styles.css" rel="stylesheet">
    <!--//menu-->
    <!--theme-style-->
    <link href="<?php echo THEME_URL; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo THEME_URL; ?>/css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo THEME_URL; ?>/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    <script src="<?php echo THEME_URL; ?>/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Real Home Website, a real estate website that provide home, apartment, room for rent ...." />
    <!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
    <!-- slide -->
    <script src="<?php echo THEME_URL; ?>/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/js/jquery.flexisel.js"></script>
    <script type="text/javascript" src="<?php echo THEME_URL; ?>/js/jquery.flexslider.js"></script>
</head>