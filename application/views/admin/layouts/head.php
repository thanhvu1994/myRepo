<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->settings->get_param('defaultPageTitle') ?></title>
    <link rel="icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url($this->settings->get_param('favicon')) ?>" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('themes/admin/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('themes/admin/plugins/bower_components/datatables/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="<?php echo base_url('themes/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('themes/admin/plugins/bower_components/dropify/dist/css/dropify.min.css')?>">
    <!-- animation CSS -->
    <link href="<?php echo base_url('themes/admin/css/animate.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('themes/admin/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('themes/admin/css/custom.css')?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url('themes/admin/css/colors/default.css')?>" id="theme" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url('themes/admin/plugins/bower_components/morrisjs/morris.css')?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link href="<?php echo base_url('themes/admin/plugins/bower_components/switchery/dist/switchery.min.css')?>" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url('themes/admin/plugins/tinymce/tinymce.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('themes/admin/plugins/ckeditor/ckeditor.js')?>"></script>
    <!--<script>
        tinymce.init({
            /* replace textarea having class .tinymce with tinymce editor */
            selector: ".editor-full",

            /* theme of the editor */
            theme: "modern",
            skin: "lightgray",

            /* width and height of the editor */
            width: "100%",
            height: 300,

            /* display statusbar */
            statubar: true,

            /* plugin */
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],

            /* toolbar */
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

            /* style */
            style_formats: [
                {title: "Headers", items: [
                    {title: "Header 1", format: "h1"},
                    {title: "Header 2", format: "h2"},
                    {title: "Header 3", format: "h3"},
                    {title: "Header 4", format: "h4"},
                    {title: "Header 5", format: "h5"},
                    {title: "Header 6", format: "h6"}
                ]},
                {title: "Inline", items: [
                    {title: "Bold", icon: "bold", format: "bold"},
                    {title: "Italic", icon: "italic", format: "italic"},
                    {title: "Underline", icon: "underline", format: "underline"},
                    {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                    {title: "Superscript", icon: "superscript", format: "superscript"},
                    {title: "Subscript", icon: "subscript", format: "subscript"},
                    {title: "Code", icon: "code", format: "code"}
                ]},
                {title: "Blocks", items: [
                    {title: "Paragraph", format: "p"},
                    {title: "Blockquote", format: "blockquote"},
                    {title: "Div", format: "div"},
                    {title: "Pre", format: "pre"}
                ]},
                {title: "Alignment", items: [
                    {title: "Left", icon: "alignleft", format: "alignleft"},
                    {title: "Center", icon: "aligncenter", format: "aligncenter"},
                    {title: "Right", icon: "alignright", format: "alignright"},
                    {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                ]}
            ]
        });
    </script>-->
</head>