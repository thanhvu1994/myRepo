<?php if(!empty($categories)): ?>
    <div id="SanPham" style="clear: both; overflow: hidden">
        <div class="row">
            <div class="col-md-12 ps_block_title">
            <?php if ($this->session->userdata['languages'] == 'vn'): ?>
                Sản phẩm
            <?php else: ?>
                Products
            <?php endif ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="htmlcontent_SanPham">
                    <ul class="htmlcontent-home clearfix">
                        <?php foreach($categories as $key => $item): ?>
                            <li class="htmlcontent-item-<?php echo $key + 1; ?> col-xs-4" style="text-align: center">
                                <?php if ($this->session->userdata['languages'] == 'vn'): ?>
                                    <a href="<?php echo base_url('cat-'.$item->slug.'.html'); ?>" class="item-link" onclick="return !window.open(this.href);" title="<?php echo $item->title; ?>">
                                <?php else: ?>
                                    <a href="<?php echo base_url('cat-'.$item->slug_en.'.html'); ?>" class="item-link" onclick="return !window.open(this.href);" title="<?php echo $item->title; ?>">
                                <?php endif ?>
                                    <h3 class="item-title"><?php echo $item->getFieldFollowLanguage('title'); ?></h3>
                                    <img src="<?php echo $item->get_image(); ?>" class="center-cropped item-img img-responsive" title="<?php echo $item->title; ?>" alt="<?php echo $item->title; ?>" width="auto" height="auto" style="display: inline-block"/>
                                </a>
                                <div class="item-html"><?php echo $item->getFieldFollowLanguage('description'); ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<style>
    .center-cropped {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 140px;
        width: 140px;
    }
</style>
