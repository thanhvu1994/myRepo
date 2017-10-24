<?php 
$args = array(
            'posts_per_page'   => 3,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true,
        );
$menuItem_array = get_posts( $args );
?>
<div class="col-md-9 blog-head">
    <?php if (!empty($menuItem_array)) { 
        foreach ($menuItem_array as $blog) { 
            $date_created = date_create($blog->post_date);
            $date_created =  date_format($date_created,"d-m-Y"); ?>
            <div class="blog-top">
                <a href="<?php echo get_permalink($blog)?>"><img src="<?php echo get_the_post_thumbnail_url($blog->ID); ?>" class="img-responsive" alt="<?php echo $blog->post_title ?>"/></a>
                <h4><a href="<?php echo get_permalink($blog)?>"><?php echo $blog->post_title ?></a></h4>
                <h5>Date : <?php echo $date_created ?></h5>
                <?php echo get_field('description',$blog->ID) ?>
                <a class="hvr-sweep-to-right more" href="<?php echo get_permalink($blog)?>">Read More</a>
            </div> 
            <hr>
    <?php }
    } ?>
</div>