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
                        <li class="ajax_block_product col-xs-12 col-sm-6 col-md-4 first-in-line last-line first-item-of-tablet-line first-item-of-mobile-line last-mobile-line">
                            <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                <div class="left-block">
                                    <div class="product-image-container">
                                        <a class="product_img_link"	href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html" title="Tấm lấy sáng Polycarbonate  Nice Light" itemprop="url">
                                            <img class="replace-2x img-responsive" src="http://namvietplastic.com/325-home_default/tam-nhua-lay-sang-polycarbonate-dac-ruot.jpg" alt="Tấm lấy sáng Polycarbonate  Nice Light" title="Tấm lấy sáng Polycarbonate  Nice Light"  width="270" height="270" itemprop="image" />
                                        </a>
                                        <div class="quick-view-wrapper-mobile">
                                            <a class="quick-view-mobile" href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html" rel="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html">
                                                <i class="icon-eye-open"></i>
                                            </a>
                                        </div>
                                        <a class="quick-view" href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html" rel="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html">
                                            <span>Xem nhanh</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 itemprop="name">
                                        <a class="product-name" href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html" title="Tấm lấy sáng Polycarbonate  Nice Light" itemprop="url" >
                                            Tấm lấy sáng Polycarbonate  Nice Light
                                        </a>
                                    </h5>

                                    <p class="product-desc" itemprop="description">
                                        Quy c&aacute;ch th&ocirc;ng dụng
                                        Độ d&agrave;y: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Bề d&agrave;y tấm theo y&ecirc;u cầu của kh&aacute;ch h&agrave;ng
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (từ 1mm đến 6mm).
                                        Chiều rộng: &nbsp; &nbsp; &nbsp; &nbsp;1.22m; 1.52m
                                        M&agrave;u sắc: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sản phẩm tấm lấy s&aacute;ng polycarbonate gồm c&oacute; 6 m&agrave;u cơ bản:

                                        ĐỘ TRUYỀN S&Aacute;NG

                                        TH&Ocirc;NG SỐ KỸ THUẬT
                                    </p>
                                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">&nbsp;

                                    </div>
                                    <div class="button-container">
                                        <a itemprop="url" class="button lnk_view btn btn-default" href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html" title="Xem">
                                            <span>Th&ecirc;m</span>
                                        </a>
                                    </div>
                                    <div class="color-list-container"><ul class="color_to_pick_list clearfix">
                                            <li>
                                                <a href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html#/-" id="color_65" class="color_pick" style="background:#ffffff;">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html#/-" id="color_67" class="color_pick" style="background:#c19a6b;">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html#/-" id="color_68" class="color_pick" style="background:#007aff;">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html#/-" id="color_69" class="color_pick" style="background:#00b326;">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html#/-" id="color_66" class="color_pick" style="background:#e2e0ff;">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://namvietplastic.com/vn/35-tam-nhua-lay-sang-polycarbonate-dac-ruot.html#/-" id="color_70" class="color_pick" style="background:#00cb9e;">
                                                </a>
                                            </li>
                                        </ul></div>
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