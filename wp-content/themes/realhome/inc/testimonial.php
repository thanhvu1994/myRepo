<?php
$args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => 3,
    'orderby' => 'rand'
);

$testimonials = get_posts($args);
?>

<!--test-->
<div class="content-bottom">
    <div class="container">
        <h3>Testimonials</h3>
        <div class="col-md-6 name-in">
            <?php for($i = 0; $i < 2 ; $i++): ?>
                <?php if(!empty(get_field('comment',$testimonials[$i]))): ?>
                    <div class=" bottom-in">
                        <p class="para-in"><?php echo get_field('comment',$testimonials[$i]); ?></p>
                        <i class="dolor"></i>
                        <div class="men-grid">
                            <a href="#" class="men-top"><img class="img-responsive men-top" src="<?php echo get_field('avatar',$testimonials[$i]); ?>" alt=""></a>
                            <div class="men">
                                <span><?php echo get_field('username',$testimonials[$i]); ?></span>
                                <p><?php echo get_field('description',$testimonials[$i]); ?></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="col-md-6  name-on">
            <?php for($i = 2; $i < 3 ; $i++): ?>
                <?php if(!empty(get_field('comment',$testimonials[$i]))): ?>
                    <div class=" bottom-in">
                        <p class="para-in"><?php echo get_field('comment',$testimonials[$i]); ?></p>
                        <i class="dolor"></i>
                        <div class="men-grid">
                            <a href="#" class="men-top"><img class="img-responsive men-top" src="<?php echo get_field('avatar',$testimonials[$i]); ?>" alt=""></a>
                            <div class="men">
                                <span><?php echo get_field('username',$testimonials[$i]); ?></span>
                                <p><?php echo get_field('description',$testimonials[$i]); ?></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--//test-->