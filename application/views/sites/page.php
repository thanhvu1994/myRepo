<link rel="stylesheet" href="<?php echo base_url('themes/website/css/cms.css')?>" type="text/css" media="all" />

<div class="columns-container">
    <div id="columns" class="container" >
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="left_column" class="column col-xs-12 col-sm-2"><!-- Block categories module -->
            </div>

            <div id="center_column" class="center_column col-xs-12 col-sm-12">
                <div class="block-cms">
                    <h1><?php //echo ($this->session->userdata['languages'] == 'vn') ? $page->title : $page->title_en; ?></h1>

                    <?php echo ($this->session->userdata['languages'] == 'vn') ? $page->content : $page->content_en; ?>
                </div>

                <div class="content_sortPagiBar">
                    <div class="bottom-pagination-content clearfix">


                        <!-- Pagination -->
                        <div id="pagination_bottom" class="pagination clearfix">
                        </div>
                        <div class="product-count">

                        </div>
                        <!-- /Pagination -->

                    </div>
                </div>

                <br>
            </div>

            <div id="right_column" class="column col-xs-12 col-sm-2"><!-- Block categories module -->
            </div>
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
<style>
    .center-cropped-new {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 266px;
        width: 522px;
    }
</style>