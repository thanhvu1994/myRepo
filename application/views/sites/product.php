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
                                    Back
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
                                    Next
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
                                        Detail
                                    </a>
                                </li>
                                <li role="presentation" >
                                    <a href="#profile" role="tab" data-toggle="tab">
                                        Description
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
                            <form id="buy_block" action="http://namvietplastic.com/vn/cart" method="post">
                                <!-- hidden datas -->
                                <p class="hidden">
                                    <input type="hidden" name="token" value="8d00693119003431c3f67d6e75a922f0" />
                                    <input type="hidden" name="id_product" value="35" id="product_page_product_id" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="id_product_attribute" id="idCombination" value="" />
                                </p>
                                <!-- quantity wanted -->
                                <p id="quantity_wanted_p" style="display: none;">
                                    <label>Số lượng</label>
                                    <input type="text" name="qty" id="quantity_wanted" class="text" value="1" />
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down">
                                        <span><i class="icon-minus"></i></span>
                                    </a>
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up">
                                        <span><i class="icon-plus"></i></span>
                                    </a>
                                    <span class="clearfix"></span>
                                </p>
                                <!-- minimal quantity wanted -->
                                <p id="minimal_quantity_wanted_p" style="display: none;">
                                    This product is not sold individually. You must select at least <b id="minimal_quantity_label">1</b> số lượng của sản phẩm.
                                </p>
                                <!-- attributes -->
                                <div id="attributes">
                                    <div class="clearfix"></div>
                                    <fieldset class="attribute_fieldset">
                                            <?php $attributes = $product->getAttributes(); ?>
                                            <?php foreach($attributes as $key => $item): ?>
                                                <label class="attribute_label" ><?php echo $item->name; ?></label>
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

                                            <input type="hidden" class="color_pick_hidden" name="group_3" value="14" />
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
                                <div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a href="<?php echo base_url('sites/contact/dat-hang/'.$product->slug); ?>" title="" target="blank">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <span>Contact for Order</span>
                                                </button>
                                            </a>
                                        </p>
                                    </div>
                                    <div style="padding: 15px 15px 30px 0;float: left">
                                        <p class="buttons_bottom_block no-print">
                                            <a href="<?php echo base_url('sites/contact/bao-gia/'.$product->slug); ?>" title="" target="blank">
                                                <button type="button" class="exclusive ps_product_addcart">
                                                    <span>Contact for Prices</span>
                                                </button>
                                            </a>
                                        </p>
                                    </div>

                                    <span id="quantity_wanted" value="1" style="display: none"/></span>

                                </div>
                            </form>

                            <p class="socialsharing_product list-inline no-print">
                                <button type="button" class="btn btn-default btn-twitter" onclick="socialsharing_twitter_click('T%e1%ba%a5m%20l%e1%ba%a5y%20s%c3%a1ng%20Polycarbonate%20%c4%91%e1%ba%b7c%20Nice%20Light%20http_/namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html');">
                                    <i class="icon-twitter"></i> Tweet
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/twitter.gif" alt="Tweet" /> -->
                                </button>
                                <button type="button" class="btn btn-default btn-facebook" onclick="socialsharing_facebook_click();">
                                    <i class="icon-facebook"></i> Share
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/facebook.gif" alt="Facebook Like" /> -->
                                </button>
                                <button type="button" class="btn btn-default btn-google-plus" onclick="socialsharing_google_click();">
                                    <i class="icon-google-plus"></i> Google+
                                    <!-- <img src="http://namvietplastic.com/modules/socialsharing/img/google.gif" alt="Google Plus" /> -->
                                </button>
                                <button type="button" class="btn btn-default btn-pinterest" onclick="socialsharing_pinterest_click('../325-thickbox_default/tam-nhua-lay-sang-polycarbonate-dac-ruot.jpg');">
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