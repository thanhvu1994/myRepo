<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo (isset($title))? $title.' - '.$this->settings->get_param('defaultPageTitle') : $this->settings->get_param('defaultPageTitle'); ?></title>
        <meta name="description" content="<?php echo (isset($description))? $description.' - '.$this->settings->get_param('defaultPageTitle') : $this->settings->get_param('defaultPageTitle'); ?>">
		<link rel="icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
		<link rel="shortcut icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />

        <link rel="stylesheet" href="<?php echo base_url('themes/website/css/autoload/bootstrap.min.css')?>" type="text/css" media="all" />
        <!--<link rel="stylesheet" href="<?php /*echo base_url('themes/website/css/autoload/highdpi.css')*/?>" type="text/css" media="all" />-->
        <!--<link rel="stylesheet" href="<?php /*echo base_url('themes/website/css/autoload/responsive-tables.css')*/?>" type="text/css" media="all" />-->
        <!--<link rel="stylesheet" href="<?php /*echo base_url('themes/website/css/autoload/uniform.default.css')*/?>" type="text/css" media="all" />-->

		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/global.css')?>" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url('themes/website/css/block.css')?>" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url('themes/website/modules/themeconfigurator/css/hooks.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/fonts/stylesheet.css')?>" type="text/css" media="all" />

        <!--<link rel="stylesheet" href="<?php /*echo base_url('themes/website/js/jquery/plugins/autocomplete/jquery.autocomplete.css')*/?>" type="text/css" media="all" />-->

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/jquery-1.11.0.min.js')?>"></script>

        <script type="text/javascript" src="<?php echo base_url('themes/website/js/autoload/15-jquery.total-storage.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/jquery.serialScroll.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/flexslider/jquery.flexslider.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/bxslider/jquery.bxslider.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/fancybox/jquery.fancybox.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/autoload/10-bootstrap.min.js')?>"></script>

        <!-- home page js -->
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/global.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/tools.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/homeslider/js/homeslider.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocktopmenu/js/blocktopmenu.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/modules/ganalytics/views/js/GoogleAnalyticActionLib.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocktopmenu/js/hoverIntent.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocktopmenu/js/superfish-modified.js')?>"></script>

		<!--
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/jquery/jquery-migrate-1.2.1.min.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/jquery/plugins/jquery.easing.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/autoload/15-jquery.uniform-modified.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/contact-form.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/modules/blockcart/ajax-cart.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/modules/blocknewsletter/blocknewsletter.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/jquery/plugins/autocomplete/jquery.autocomplete.js')*/?>"></script>
        <script type="text/javascript" src="<?php /*echo base_url('themes/website/js/modules/blocksearch/blocksearch.js')*/?>"></script>
		<script type="text/javascript" src="<?php /*echo base_url('themes/website/js/modules/blockwishlist/js/ajax-wishlist.js')*/?>"></script>
        -->

		<script type="text/javascript">
			var contentOnly = false;
		</script>
        <script type="text/javascript">
            var CUSTOMIZE_TEXTFIELD = 1;
            var FancyboxI18nClose = 'đ&oacute;ng';
            var FancyboxI18nNext = 'Tiếp';
            var FancyboxI18nPrev = 'Về trước';
            var ajax_allowed = true;
            var ajaxsearch = true;
            var baseDir = 'http://namvietplastic.com/';
            var baseUri = 'http://namvietplastic.com/';
            var blocksearch_type = 'top';
            var comparator_max_item = 3;
            var comparedProductsIds = [];
            var contentOnly = false;
            var customizationIdMessage = 'Tùy biến';
            var delete_txt = 'Xóa';
            var displayList = false;
            var freeProductTranslation = 'Miễn phí!';
            var freeShippingTranslation = 'Miễn phí vận chuyển!';
            var generated_date = 1520761692;
            var id_lang = 2;
            var img_dir = 'http://namvietplastic.com/themes/default-bootstrap/img/';
            var instantsearch = false;
            var isGuest = 0;
            var isLogged = 1;
            var max_item = 'Bạn không thể thêm nhiều hơn 3 sản phẩm để so sánh';
            var min_item = 'Xin vui lòng chọn ít nhất một sản phẩm';
            var page_name = 'category';
            var priceDisplayMethod = 0;
            var priceDisplayPrecision = 2;
            var quickView = true;
            var removingLinkText = 'bỏ sản phẩm này từ giỏ hàng';
            var roundMode = 2;
            var search_url = 'http://namvietplastic.com/vn/search';
            var static_token = '9484a9d90328732a68a516fd6bb77a2f';
            var token = '8895b744db9860748466b57f29829dcb';
            var usingSecureMode = false;
        </script>
	</head>
	<body id="<?php echo $this->router->fetch_method(); ?>">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
		<div id="page">