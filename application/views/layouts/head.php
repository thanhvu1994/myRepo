<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo $this->settings->get_param('defaultPageTitle') ?></title>
		<link rel="icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
		<link rel="shortcut icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>

		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/global.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/fonts/stylesheet.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/autoload/bootstrap.min.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/autoload/highdpi.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/autoload/responsive-tables.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/autoload/uniform.default.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/js/jquery/plugins/fancybox/jquery.fancybox.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockbanner/blockbanner.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockcart/blockcart.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockcategories/blockcategories.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockcurrencies/blockcurrencies.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blocklanguages/blocklanguages.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blocknewsletter/blocknewsletter.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/js/jquery/plugins/autocomplete/jquery.autocomplete.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/product_list.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blocksearch/blocksearch.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blocktags/blocktags.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockuserinfo/blockuserinfo.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockviewed/blockviewed.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/modules/themeconfigurator/css/hooks.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blockwishlist/blockwishlist.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/productcomments/productcomments.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/modules/smartblog/css/smartblogstyle.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blocktopmenu/css/blocktopmenu.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/blocktopmenu/css/superfish-modified.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/homeslider/homeslider.css')?>" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url('themes/website/css/modules/homeslider/flexslider.css')?>" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,vietnamese' rel='stylesheet' type='text/css'>

        <script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/jquery-1.11.0.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/jquery-migrate-1.2.1.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/jquery.easing.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/tools.js')?>"></script>
		<!-- <script type="text/javascript" src="<?php echo base_url('themes/website/js/global.js')?>"></script> -->
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/autoload/10-bootstrap.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/autoload/15-jquery.total-storage.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/autoload/15-jquery.uniform-modified.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/fancybox/jquery.fancybox.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/products-comparison.js')?>"></script>
		<!-- <script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blockcart/ajax-cart.js')?>"></script> -->
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/jquery.scrollTo.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/jquery.serialScroll.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/bxslider/jquery.bxslider.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/tools/treeManagement.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocknewsletter/blocknewsletter.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/autocomplete/jquery.autocomplete.js')?>"></script>
		<!-- <script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocksearch/blocksearch.js')?>"></script> -->
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blockwishlist/js/ajax-wishlist.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/modules/ganalytics/views/js/GoogleAnalyticActionLib.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocktopmenu/js/hoverIntent.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocktopmenu/js/superfish-modified.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/blocktopmenu/js/blocktopmenu.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/modules/homeslider/js/homeslider.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/flexslider/jquery.flexslider.js')?>"></script>
	</head>
	<body>
		<div id="page">