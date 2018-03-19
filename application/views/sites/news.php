<div class="columns-container">
    <div id="columns" class="container" >
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="left_column" class="center_column col-xs-12 col-sm-2">
            </div>
            <div id="center_column" class="center_column col-xs-12 col-sm-8">
                <div id="smartblogcat" class="block">
                    <?php foreach($news as $new): ?>
                    <div itemtype="#" itemscope="" class="sdsarticleCat clearfix">
                        <div id="smartblogpost-<?php echo $new->id; ?>">
                            <div class="sdsarticleHeader">
                                <p class='sdstitle_block'><a title="<?php echo $new->title; ?>" href='<?php echo base_url('sites/newDetail/'.$new->slug); ?>'><?php echo $new->title; ?></a></p>
                                <span>Đăng bởi
                                    <span itemprop="author">&nbsp;<i class="icon icon-user"></i>&nbsp; Admin</span> &nbsp;&nbsp;
                                    <span class="comment"> &nbsp;<i class="icon icon-comments"></i>&nbsp; <div style="display: inline-block;" class="fb-comments-count" data-href="<?php echo base_url('sites/newDetail/'. $new->slug); ?>">0</div> Bình Luận</span>&nbsp;
                                    <i class="icon icon-eye-open"></i> lượt xem (<?php echo $new->views; ?>)</span>
                            </div>
                            <div class="articleContent">
                                <a  href='<?php echo base_url('sites/newDetail/'.$new->slug); ?>' itemprop="url" title="<?php echo $new->title; ?>" class="imageFeaturedLink">
                                    <img class="center-cropped-new" itemprop="image" alt="<?php echo $new->title; ?>" src="<?php echo base_url($new->featured_image); ?>" class="imageFeatured">
                                </a>
                            </div>
                            <div class="sdsarticle-des">
                                <span itemprop="description" class="clearfix">
                                    <div id="lipsum">
                                        <?php echo $new->short_content; ?>
                                    </div>
                                <div class="sdsreadMore">
                                    <span class="more"><a title="<?php echo $new->title; ?>" href="<?php echo base_url('sites/newDetail/'.$new->slug); ?>" class="r_more button-medium">Xem thêm</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="post-page col-md-12">
                        <div class="col-md-6">
                            <div id="pagination_bottom" class="pagination clearfix">
                                <?php echo $links; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #center_column -->
            <div id="right_column" class="center_column col-xs-12 col-sm-2">
            </div>
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
<style>
    .center-cropped-new {
        object-position: center; /* Center the image within the element */
        height: 266px;
        width: 522px;
    }
</style>