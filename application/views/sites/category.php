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
<?php if($category): ?>
    <div class="columns-container">
    <div id="columns" class="container" >
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="left_column" class="column col-xs-12 col-sm-3"><!-- Block categories module -->
                <div id="categories_block_left" class="block">
                    <h2 class="title_block">
                        <?php echo $category->category_name; ?>
                    </h2>
                    <div class="block_content">
                        <ul class="tree dhtml">
                            <li>
                                <a href="javascript:void(0)" title="<?php echo $category->title; ?>">
                                    Products
                                </a>
                                <ul>
                                    <?php foreach($treeCategory as $cate): ?>
                                        <li>
                                            <?php if(!empty($cate['child'])): ?>
                                                <span class="grower CLOSE"> </span>
                                            <?php endif; ?>
                                            <a href="<?php echo base_url('sites/category/'.$cate['slug']); ?>" <?php echo ($cate['slug'] == $category->slug)? 'class="selected"': ''; ?> title="<?php echo $cate['title']; ?>">
                                                <?php echo $cate['title']; ?>
                                            </a>
                                            <?php if(!empty($cate['child'])): ?>
                                                <ul>
                                                    <?php foreach($cate['child'] as $childCate): ?>
                                                    <li>
                                                        <a href="<?php echo base_url('sites/category/'.$childCate['slug']); ?>" title="<?php echo $childCate['title']; ?>">
                                                            <?php echo $childCate['title']; ?>
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Block categories module -->
            </div>
            <div id="center_column" class="center_column col-xs-12 col-sm-9">
                <!-- Products list -->
                <ul class="product_list grid row">
                    <?php foreach($products as $product): ?>
                        <li class="ajax_block_product col-xs-12 col-sm-6 col-md-4 first-item-of-tablet-line">
                            <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                <div class="left-block">
                                    <div class="product-image-container">
                                        <a class="product_img_link"	href="<?php echo base_url('sites/product/'.$product->slug); ?>" title="<?php echo $product->title; ?>" itemprop="url">
                                            <img class="replace-2x img-responsive center-cropped" src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->title; ?>"  width="270" height="270" itemprop="image" />
                                        </a>
                                        <div class="quick-view-wrapper-mobile">
                                            <a class="quick-view-mobile" href="<?php echo base_url('sites/product/'.$product->slug); ?>" rel="<?php echo base_url('sites/product/'.$product->slug); ?>">
                                                <i class="icon-eye-open"></i>
                                            </a>
                                        </div>
                                        <a class="quick-view" href="<?php echo base_url('sites/product/'.$product->slug); ?>" rel="<?php echo base_url('sites/product/'.$product->slug); ?>">
                                            <span>Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 itemprop="name">
                                        <a class="product-name" href="<?php echo base_url('sites/product/'.$product->slug); ?>" title="<?php echo $product->title; ?>" itemprop="url" >
                                            <?php echo $product->title; ?>
                                        </a>
                                    </h5>

                                    <p class="product-desc" itemprop="description">
                                        <?php echo $product->description; ?>
                                    </p>
                                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">&nbsp;
                                        <?php echo $product->sale_price; ?>
                                    </div>
                                    <div class="button-container">
                                        <a itemprop="url" class="button lnk_view btn btn-default" href="<?php echo base_url('sites/product/'.$product->slug); ?>" title="View">
                                            <span>Add</span>
                                        </a>
                                    </div>
                                    <?php $attributes = $product->getAttributes(); ?>
                                    <?php foreach($attributes as $attribute): ?>
                                        <?php if($attribute->name == "Color" || $attribute->name == "color"): ?>
                                            <div class="color-list-container">
                                                <ul class="color_to_pick_list clearfix">
                                                    <?php
                                                        $attributeValues = $attribute->getAttributeValues();
                                                        $values = array();
                                                        if(!empty($attributeValues)){
                                                            $values = explode(';', $attributeValues[0]->name);
                                                        }
                                                    ?>
                                                    <?php foreach($values as $key => $value): ?>
                                                        <?php ?>
                                                            <li>
                                                                <a href="<?php echo base_url('sites/product/'.$product->slug); ?>" id="color_<?php echo $key; ?>" class="color_pick" style="background:<?php echo $value; ?>;">
                                                                </a>
                                                            </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <div class="product-flags">
                                    </div>
                                </div>
                                <div class="functional-buttons clearfix">

                                    <div class="wishlist">
                                        <a class="addToWishlist wishlistProd_35" href="#" rel="35" onclick="WishlistCart('wishlist_block_list', 'add', '35', false, 1); return false;">
                                            Add to Wishlist
                                        </a>
                                    </div>
                                    <div class="compare">
                                        <a class="add_to_compare" href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html" data-id-product="35">Th&ecirc;m v&agrave;o so s&aacute;nh</a>
                                    </div>
                                </div>
                            </div><!-- .product-container> -->
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="content_sortPagiBar">
                    <div class="bottom-pagination-content clearfix">
                        <!-- Pagination -->
                        <div id="pagination_bottom" class="pagination clearfix">
                            <?php echo $links; ?>
                        </div>
                        <div class="product-count">
                        </div>
                        <!-- /Pagination -->
                    </div>
                </div>
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
<?php endif; ?>
<style>
    .center-cropped {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 249px;
        width: 249px;
    }
</style>
<script>
    jQuery(document).ready(function($) {
        var heights = $("ul.product_list li.ajax_block_product").map(function() {
                return $(this).height();
            }).get(),

            maxHeight = Math.max.apply(null, heights);

        $("ul.product_list li.ajax_block_product").height(maxHeight);
    });
</script>
