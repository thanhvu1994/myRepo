<link rel="stylesheet" href="<?php echo base_url('themes/website/modules/smartblog/css/smartblogstyle.css')?>" type="text/css" media="all" />

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
                                <a href="<?php echo base_url('new.html'); ?>" title="<?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tin Tức' : 'News'; ?>">
                                    <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tin Tức' : 'News'; ?>
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
                                            <a href="<?php echo ($cate['slug'])? base_url('new-'.$cate['slug'].'.html') : 'javascript:void(0)'; ?>" <?php echo $selected; ?> title="<?php echo $cate['title']; ?>">
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
                                                            <a href="<?php echo base_url('new-'.$childCate['slug'].'.html'); ?>" <?php echo $selected; ?> title="<?php echo $childCate['title']; ?>">
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
            <div id="center_column" class="center_column col-xs-12 col-sm-8">
                <div id="smartblogcat" class="block">
                    <?php foreach($news as $new): ?>
                        <div itemtype="#" itemscope="" class="sdsarticleCat clearfix">
                            <div id="smartblogpost-<?php echo $new->id; ?>">
                                <div class="sdsarticleHeader">
                                    <p class='sdstitle_block'><a title="<?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?>" href='<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>'><?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?></a></p>
                                    <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Đăng Bởi' : 'Posted By'; ?>
                                    <span itemprop="author">&nbsp;<i class="icon icon-user"></i>&nbsp; Admin</span>
                                    <span itemprop="articleSection">  <i class="icon icon-tags"></i> <?php echo $new->getCategoryLink(); ?></span>
                                    <span class="comment"> &nbsp;<i class="icon icon-comments"></i>&nbsp; <div style="display: inline-block;" class="fb-comments-count" data-href="<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>">0</div> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Bình Luận' : 'Comments'; ?></span>&nbsp;
                                    <i class="icon icon-eye-open"></i> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Lượt Xem' : 'Views'; ?> (<?php echo $new->views; ?>)</span>
                                </div>
                                <div class="articleContent">
                                    <a  href='<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>' itemprop="url" title="<?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?>" class="imageFeaturedLink">
                                        <img class="center-cropped-new" itemprop="image" alt="<?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?>" src="<?php echo base_url($new->featured_image); ?>" class="imageFeatured">
                                    </a>
                                </div>
                                <div class="sdsarticle-des">
                                <span itemprop="description" class="clearfix">
                                    <div id="lipsum">
                                        <?php echo ($this->session->userdata['languages'] == 'vn') ? $new->short_content : $new->short_content_en; ?>
                                    </div>
                                <div class="sdsreadMore">
                                    <span class="more"><a title="<?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?>" href="<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>" class="r_more button-medium"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Xem Thêm' : 'Read More'; ?></a></span>
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