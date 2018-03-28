<script type="text/javascript" src="<?php echo base_url('themes/website/js/product.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('themes/website/js/jquery/plugins/jquery.scrollTo.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('themes/website/js/products-comparison.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('themes/website/modules/socialsharing/js/socialsharing.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('themes/website/css/product.css')?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url('themes/website/js/jquery/plugins/fancybox/jquery.fancybox.css')?>" type="text/css" media="all" />


<div class="columns-container">
    <div id="columns" class="container" >
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
                <div itemscope itemtype="http://schema.org/Product">
                    <div class="primary_block row">
                        <!-- left infos-->
                        <div class="pb-left-column col-xs-12 col-sm-6 col-md-5">
                            <!-- product img-->
                            <div id="image-block" class="clearfix">
                                <span id="view_full_size">
                                    <img id="bigpic" itemprop="image" src="<?php echo $product->getFirstImage(); ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->title; ?>" width="458" height="458"/>
                                    <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        <span class="span_link no-print">Phóng To</span>
                                    <?php else: ?>
                                        <span class="span_link no-print">View larger</span>
                                    <?php endif; ?>
                                </span>
                            </div> <!-- end image-block -->
                            <!-- thumbnails -->
                            <div id="views_block" class="clearfix ">
                                <span class="view_scroll_spacer">
                                <a id="view_scroll_left" class="" title="Back" href="javascript:{}">
                                    <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Trước
                                    <?php else: ?>
                                        Previous
                                    <?php endif; ?>
                                </a>
                                </span>
                                <div id="thumbs_list">
                                    <ul id="thumbs_list_frame">
                                        <?php $images = $product->getImages(); ?>
                                        <?php foreach($images as $key => $image): ?>
                                            <li id="thumbnail_<?php echo $image->id; ?>">
                                                <a href="<?php echo base_url($image->image); ?>" data-fancybox-group="other-views" class="fancybox" title="<?php echo $product->title; ?>">
                                                    <img class="img-responsive" id="thumb_<?php echo $image->id; ?>" src="<?php echo base_url($image->image); ?>" alt="<?php echo $product->title; ?>" title="<?php echo $product->title; ?>" height="80" width="80" itemprop="image" />
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div> <!-- end thumbs_list -->
                                <a id="view_scroll_right" title="Next" href="javascript:{}">
                                    <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Sau
                                    <?php else: ?>
                                        Next
                                    <?php endif; ?>
                                </a>
                            </div> <!-- end views-block -->
                            <!-- end thumbnails -->
                        </div> <!-- end pb-left-column -->
                        <!-- end left infos-->
                        <!-- center infos -->
                        <div class="pb-center-column col-xs-12 col-sm-6 col-md-7">
                            <h1 itemprop="name" style="padding-bottom: 20px"><?php echo ($this->session->userdata['languages'] == 'vn') ? $product->product_name : $product->product_name_en; ?></h1>
                            <div class="content_prices clearfix" style="display: none">
                                <!-- prices -->
                                <div class="price">
                                    <p class="our_price_display" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <link itemprop="availability" href="http://schema.org/InStock"/>
                                        <span id="our_price_display" itemprop="price"><?php echo number_format($product->sale_price); ?> ₫</span>
                                        <meta itemprop="priceCurrency" content="VND" />
                                    </p>
                                    <p id="old_price" class="hidden">
                                        <span id="old_price_display"><?php echo number_format($product->price); ?></span>
                                    </p>
                                </div>
                                <!-- end prices -->
                                <div class="clear"></div>
                            </div> <!-- end content_prices -->

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" role="tab" data-toggle="tab">
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Chi Tiết
                                        <?php else: ?>
                                            Detail
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li role="presentation" >
                                    <a href="#profile" role="tab" data-toggle="tab">
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Mô Tả
                                        <?php else: ?>
                                            Description
                                        <?php endif; ?>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <!-- More info -->
                                    <section class="page-product-box">
                                        <div  class="rte">
                                            <?php echo ($this->session->userdata['languages'] == 'vn') ? $product->content : $product->content_en; ?>
                                        </div>
                                    </section>
                                    <!--end  More info -->
                                </div>
                                <div role="tabpanel" class="tab-pane " id="profile">
                                    <section class="page-product-box">
                                        <div  class="rte">
                                            <?php echo ($this->session->userdata['languages'] == 'vn') ? $product->description : $product->description_en; ?>
                                        </div>
                                    </section>
                                </div>
                            </div>



                            <!-- add to cart form-->
                            <form id="buy_block" action="" method="post">
                                <!-- hidden datas -->
                                <p class="hidden">
                                    <input type="hidden" name="Orders[product_id]" value="<?php echo $product->id?>" id="product_page_product_id" />
                                 </p>

                                <?php if(isset($this->session->userdata['logged_in_FE'])): ?>
                                <!-- quantity wanted -->
                                <p id="quantity_wanted_p">
                                    <a href="#profile" role="tab" data-toggle="tab">
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            <label>Số lượng</label>
                                        <?php else: ?>
                                            <label>Quantity</label>
                                        <?php endif; ?>
                                    </a>

                                    <input type="text" name="Orders[quantity]" id="quantity_wanted" class="text" value="1" />
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down">
                                        <span><i class="icon-minus"></i></span>
                                    </a>
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up">
                                        <span><i class="icon-plus"></i></span>
                                    </a>
                                    <span class="clearfix"></span>
                                </p>
                                <?php endif; ?>
                                <!-- attributes -->
                                <div id="attributes">
                                    <div class="clearfix"></div>
                                    <fieldset class="attribute_fieldset">
                                            <?php $attributes = $product->getAttributes(); ?>
                                            <?php foreach($attributes as $key => $item): ?>
                                                <?php
                                                    if($this->session->userdata['languages'] == 'vn'){
                                                        switch($item->name){
                                                            case 'Color':
                                                                $title = 'Màu Sắc';
                                                                break;
                                                            case 'Size':
                                                                $title = 'Kích Thước';
                                                                break;
                                                            case 'Material':
                                                                $title = 'Chất Liệu';
                                                                break;
                                                            default:
                                                                $temp = explode(':', $item->name);

                                                                if(count($temp) > 1){
                                                                    $title = $temp[0];
                                                                }else{
                                                                    $title = $item->name;
                                                                }
                                                                break;
                                                        }
                                                    }else{
                                                        $temp = explode(':', $item->name);

                                                        if(count($temp) > 1){
                                                            $title = $temp[1];
                                                        }else{
                                                            $title = $item->name;
                                                        }
                                                    }
                                                ?>
                                                <label class="attribute_label" ><?php echo $title; ?></label>
                                                <div class="attribute_list">
                                                <?php if($item->name == "color" || $item->name == "Color"): ?>
                                                    <ul id="color_to_pick_list" class="clearfix">
                                                        <?php $attributeValues = $item->getAttributeValues(); ?>
                                                        <?php foreach($attributeValues as $key1 => $value): ?>
                                                            <li>
                                                                <a href="#" id="color_<?php echo $key1; ?>" name="<?php echo $value->name; ?>" class="color_pick" style="background:<?php echo $value->name; ?>;" title="<?php echo $value->name; ?>">
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <select name="group_<?php echo $key; ?>" id="group_<?php echo $key; ?>" class="form-control attribute_select no-print">
                                                        <?php $attributeValues = $item->getAttributeValues(); ?>
                                                        <?php foreach($attributeValues   as $key1 => $value): ?>
                                                            <option value="<?php echo $value->name; ?>" title="<?php echo $value->name; ?>"><?php echo $value->name ; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                         <!-- end attribute_list -->
                                    </fieldset>
                                </div> <!-- end attributes -->
                                <?php if(isset($this->session->userdata['logged_in_FE'])){ ?>
                                <div class="">
                                    <p class="buttons_bottom_block no-print">
                                        <button type="button" class="exclusive ps_product_addcart btn-add-cart">
                                            <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                                <span>Thêm vào giỏ hàng</span>
                                            <?php else: ?>
                                                <span>Add To Cart</span>
                                            <?php endif; ?>
                                        </button>
                                    </p>
                                    <p id="add-success" style="display: none">
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            <span>Đã thêm vào giỏ hàng</span>
                                        <?php else: ?>
                                            <span>Added To Cart</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a href="<?php echo base_url('sites/contact/dat-hang/'.$product->slug); ?>" title="" target="blank">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                                        <span>Liên Hệ Đặt Hàng</span>
                                                    <?php else: ?>
                                                        <span>Contact For Order</span>
                                                    <?php endif; ?>
                                                </button>
                                            </a>
                                        </p>
                                    </div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a href="<?php echo base_url('sites/contact/bao-gia/'.$product->slug); ?>" title="" target="blank">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                                        <span>Liên Hệ Báo Giá</span>
                                                    <?php else: ?>
                                                        <span>Contact For Price</span>
                                                    <?php endif; ?>
                                                </button>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>

                            <p class="socialsharing_product list-inline no-print">
                                <button type="button" class="btn btn-default btn-twitter" onclick="socialsharing_twitter_click('<?php echo $this->settings->get_param('defaultPageTitle').' Sản Phẩm : '.$product->title; ?>')">
                                    <i class="icon-twitter"></i> Tweet
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/twitter.gif" alt="Tweet" /> -->
                                </button>
                                <button type="button" class="btn btn-default btn-facebook" onclick="socialsharing_facebook_click('<?php echo $this->settings->get_param('defaultPageTitle').' Sản Phẩm : '.$product->title; ?>');">
                                    <i class="icon-facebook"></i> Share
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/facebook.gif" alt="Facebook Like" /> -->
                                </button>
                                <button type="button" class="btn btn-default btn-google-plus" onclick="socialsharing_google_click('<?php echo $this->settings->get_param('defaultPageTitle').' Sản Phẩm : '.$product->title; ?>');">
                                    <i class="icon-google-plus"></i> Google+
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/google.gif" alt="Google Plus" /> -->
                                </button>
                                <button type="button" class="btn btn-default btn-pinterest" onclick="socialsharing_pinterest_click('<?php echo $product->getFirstImage(); ?>');">
                                    <i class="icon-pinterest"></i> Pinterest
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/pinterest.gif" alt="Pinterest" /> -->
                                </button>
                            </p>

                        </div>
                        <!-- end center infos-->
                        <!-- pb-right-column-->
                        <div class="pb-right-column col-xs-12 col-sm-4 col-md-3">

                        </div> <!-- end pb-right-column-->
                    </div> <!-- end primary_block -->
                    <!--HOOK_PRODUCT_TAB -->

                    <!--end HOOK_PRODUCT_TAB -->


                    <!--<script type="text/javascript">
                        jQuery(document).ready(function(){
                            var MBG = GoogleAnalyticEnhancedECommerce;
                            MBG.setCurrency('VND');
                            MBG.addProductDetailView({"id":35,"name":"\"T\\u1ea5m l\\u1ea5y s\\u00e1ng Polycarbonate  Nice Light\"","category":"\"tam-lop-lay-sang-polycarbonate-dac-ruot\"","brand":"\"Nam Viet Plastic Production-Service-Trading Co., Ltd.\"","variant":"null","type":"typical","position":"0","quantity":1,"list":"product","url":"","price":"0.00"});MBG.addProductClickByHttpReferal({"id":35,"name":"\"T\\u1ea5m l\\u1ea5y s\\u00e1ng Polycarbonate  Nice Light\"","category":"\"tam-lop-lay-sang-polycarbonate-dac-ruot\"","brand":"\"Nam Viet Plastic Production-Service-Trading Co., Ltd.\"","variant":"null","type":"typical","position":"0","quantity":1,"list":"product","url":"","price":"0.00"});
                        });
                    </script><!-- description & features -->
                </div> <!-- itemscope product wrapper -->

            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div>
<style>
    .center-cropped {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 458px;
        width: 458px;
    }

    #thumbs_list_frame > li {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 82px;
        width: 82px;
    }
</style>

<script>
    $(document).ready(function () {
        $('.button-minus').click(function () {
            var qty = parseInt($('#quantity_wanted').val());
            if (qty > 1) {
                qty = qty - 1;
                $('#quantity_wanted').val(qty);
            }
        });
        $('.button-plus').click(function () {
            var qty = parseInt($('#quantity_wanted').val());
            qty = qty + 1;
            $('#quantity_wanted').val(qty);
        });

        $('.btn-add-cart').click(function () {
            var form = $('#buy_block').serialize();
            $.ajax({
                url: '<?php echo base_url('sites/addCart')?>',
                type: 'POST',
                data: form,
                success: function (returndata) {
                    if (returndata == 1) {
                        $('#add-success').show();
                    }
                }
            });
        });
    });
</script>