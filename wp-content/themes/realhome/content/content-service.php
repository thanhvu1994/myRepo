<div class="terms">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
        </ol>
        <h3><?php echo $post->post_title; ?></h3>
        <?php echo get_post_field('post_content', $post->ID) ?>
    </div>
</div>