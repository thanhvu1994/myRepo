<link rel="stylesheet" href="<?php echo base_url('themes/website/css/product_list.css')?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url('themes/website/css/block.css')?>" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url('themes/website/js/tools/treeManagement.js')?>"></script>

<?php if($category): ?>
    <div class="columns-container">
    <div id="columns" class="container" >
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="left_column" class="column col-xs-12 col-sm-3"><!-- Block categories module -->
                <div id="categories_block_left" class="block">
                    <h2 class="title_block">
                        <?php if ($this->session->userdata['languages'] == 'vn'): ?>
                            <?php echo $category->category_name; ?>
                        <?php else: ?>
                            <?php echo $category->category_name_en; ?>
                        <?php endif; ?>
                    </h2>
                    <div class="block_content">
                        <ul class="tree dhtml">
                            <li>
                                <a href="<?php echo base_url('cat.html'); ?>" title="<?php echo ($this->session->userdata['languages'] == 'vn')  ? 'Sản Phẩm' : 'Products'; ?>">
                                    <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Sản Phẩm' : 'Products'; ?>
                                </a>
                                <ul>
                                    <?php foreach($treeCategory as $cate): ?>
                                        <li>
                                            <?php
                                                if($this->session->userdata['languages'] == 'vn'){
                                                    $selected = ($cate['slug'] == $category->slug)? 'class="selected"': '';
                                                }else{
                                                    $selected = ($cate['slug'] == $category->slug_en)? 'class="selected"': '';
                                                }
                                            ?>
                                            <a href="<?php echo ($cate['slug'])? base_url('cat-'.$cate['slug'].'.html') : 'javascript:void(0)'; ?>" <?php echo $selected; ?> title="<?php echo $cate['title']; ?>">
                                                <?php echo $cate['title']; ?>
                                            </a>
                                            <?php if(!empty($cate['child'])): ?>
                                                <ul>
                                                    <?php foreach($cate['child'] as $childCate): ?>
                                                    <li>
                                                        <?php
                                                        if($this->session->userdata['languages'] == 'vn'){
                                                            $selected = ($childCate['slug'] == $category->slug)? 'class="selected"': '';
                                                        }else{
                                                            $selected = ($childCate['slug'] == $category->slug_en)? 'class="selected"': '';
                                                        }
                                                        ?>
                                                        <a href="<?php echo base_url('cat-'.$childCate['slug'].'.html'); ?>" <?php echo $selected; ?> title="<?php echo $childCate['title']; ?>">
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
                        <?php if($product): ?>
                        <li class="ajax_block_product col-xs-12 col-sm-6 col-md-4 first-item-of-tablet-line">
                            <div class="product-container" itemscope itemtype="http://schema.org/Product">
                                <div class="left-block">
                                    <div class="product-image-container">
                                        <a class="pro   duct_img_link"	href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>" title="<?php echo $product->title; ?>" itemprop="url">
                                            <img class="replace-2x img-responsive center-cropped" src="<?php echo $product->getFirstImage(); ?>" alt="<?php echo $product->title; ?>"  width="270" height="270" itemprop="image" />
                                        </a>
                                        <div class="quick-view-wrapper-mobile">
                                            <a class="quick-view-mobile" href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>" rel="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>">
                                                <i class="icon-eye-open"></i>
                                            </a>
                                        </div>
                                        <a class="quick-view" href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>" rel="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>">
                                            <span>Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 itemprop="name">
                                        <a class="product-name" href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>" title="<?php echo $product->title; ?>" itemprop="url" >
                                            <?php echo ($this->session->userdata['languages'] == 'vn') ? $product->product_name : $product->product_name_en; ?>
                                        </a>
                                    </h5>

                                    <p style="display:none;" class="product-desc" itemprop="description">
                                        <?php echo $product->title; ?>
                                    </p>
                                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price" style="display: none;">&nbsp;
                                        <?php echo $product->sale_price; ?>
                                    </div>
                                    <div class="button-container">
                                        <a itemprop="url" class="button lnk_view btn btn-default" href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>" title="View">
                                            <span>Add</span>
                                        </a>
                                    </div>
                                    <?php $attributes = $product->getAttributes(); ?>
                                    <?php foreach($attributes as $attribute): ?>
                                        <?php if($attribute->name == "Color" || $attribute->name == "color"): ?>
                                            <div class="color-list-container">
                                                <ul class="color_to_pick_list clearfix">
                                                    <?php $attributeValues = $attribute->getAttributeValues(); ?>
                                                    <?php foreach($attributeValues as $key => $value): ?>
                                                        <?php ?>
                                                            <li>
                                                                <a href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug.'.html'); ?>" id="color_<?php echo $key; ?>" style="background:<?php echo $value->name; ?>;">
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
                        <?php endif; ?>
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
