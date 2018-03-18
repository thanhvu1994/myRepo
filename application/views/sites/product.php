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
                                    <span class="span_link no-print">View larger</span>
                                </span>
                            </div> <!-- end image-block -->
                            <!-- thumbnails -->
                            <div id="views_block" class="clearfix ">
                                <span class="view_scroll_spacer">
                                <a id="view_scroll_left" class="" title="Back" href="javascript:{}">
                                    Trước
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
                                    Sau
                                </a>
                            </div> <!-- end views-block -->
                            <!-- end thumbnails -->
                        </div> <!-- end pb-left-column -->
                        <!-- end left infos-->
                        <!-- center infos -->
                        <div class="pb-center-column col-xs-12 col-sm-6 col-md-7">
                            <h1 itemprop="name" style="padding-bottom: 20px"><?php echo $product->title; ?></h1>
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
                                        Chi Tiết
                                    </a>
                                </li>
                                <li role="presentation" >
                                    <a href="#profile" role="tab" data-toggle="tab">
                                        Mô Tả
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <!-- More info -->
                                    <section class="page-product-box">
                                        <div  class="rte">
                                            <?php echo $product->content; ?>
                                        </div>
                                    </section>
                                    <!--end  More info -->
                                </div>
                                <div role="tabpanel" class="tab-pane " id="profile">
                                    <section class="page-product-box">
                                        <div  class="rte">
                                            <?php echo $product->description; ?>
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
                                <!-- quantity wanted -->
                                <p id="quantity_wanted_p">
                                    <label>Số lượng</label>
                                    <input type="text" name="Orders[quantity]" id="quantity_wanted" class="text" value="1" />
                                    <a class="btn btn-default button-minus">
                                        <span><i class="icon-minus"></i></span>
                                    </a>
                                    <a  class="btn btn-default button-plus">
                                        <span><i class="icon-plus"></i></span>
                                    </a>
                                    <span class="clearfix"></span>
                                </p>
                                <!-- attributes -->
                                <div id="attributes">
                                    <div class="clearfix"></div>
                                    <fieldset class="attribute_fieldset">
                                            <?php $attributes = $product->getAttributes(); ?>
                                            <?php foreach($attributes as $key => $item): ?>
                                                <?php
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
                                                            $title = $item->name;
                                                            break;
                                                    }
                                                ?>
                                                <label class="attribute_label" ><?php echo $title; ?></label>
                                                <div class="attribute_list">
                                                <?php if($item->name == "color" || $item->name == "Color"): ?>
                                                    <ul id="color_to_pick_list" class="clearfix">
                                                        <?php
                                                            $attributeValues = $item->getAttributeValues();
                                                            $values = array();
                                                            if(isset($attributeValues[0])){
                                                                $values = explode(';', $attributeValues[0]->name);
                                                            }
                                                        ?>
                                                        <?php foreach($values as $key1 => $value): ?>
                                                            <li>
                                                                <a href="#" id="color_<?php echo $key1; ?>" name="<?php echo $value; ?>" class="color_pick" style="background:<?php echo strtolower($value); ?>;" title="<?php echo $value; ?>">
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <select name="group_<?php echo $key; ?>" id="group_<?php echo $key; ?>" class="form-control attribute_select no-print">
                                                        <?php
                                                        $attributeValues = $item->getAttributeValues();
                                                        $values = array();
                                                        if(isset($attributeValues[0])){
                                                            $values = explode(';', $attributeValues[0]->name);
                                                        }
                                                        ?>
                                                        <?php foreach($values as $key1 => $value): ?>
                                                            <option value="<?php echo $value; ?>" title="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                         <!-- end attribute_list -->
                                    </fieldset>
                                </div> <!-- end attributes -->
                                <div class="unvisible">
                                    <p id="add_to_cart" class="buttons_bottom_block no-print">
                                        <button type="submit" name="Submit" class="exclusive ps_product_addcart">
                                            <span>Add to Cart</span>
                                        </button>
                                    </p>
                                </div>
                                <p id="add-success" style="display: none">Đã thêm vào giỏ hàng</p>
                                <?php if(isset($this->session->userdata['logged_in_FE'])){ ?>
                                <div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a title="" class="btn-add-cart">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <span>Thêm vào giỏ hàng</span>

                                                </button>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <?php } ?>
                                <div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a href="<?php echo base_url('sites/contact/dat-hang/'.$product->slug); ?>" title="" target="blank">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <span>Liên Hệ Đặt Hàng</span>
                                                </button>
                                            </a>
                                        </p>
                                    </div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a href="<?php echo base_url('sites/contact/bao-gia/'.$product->slug); ?>" title="" target="blank">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <span>Liên Hệ Báo Giá</span>
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
//                        $('.ajax_cart_no_product').css('display', 'none');
                    }
                }
            });
        });
    });
</script>