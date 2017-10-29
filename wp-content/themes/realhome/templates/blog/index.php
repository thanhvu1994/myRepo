<div class="col-md-9 blog-head">
<?php
    $arr_month = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];
    $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
    global $wp_query;
    $slug_category = $slug_tag = $month = '';
    $home_url = home_url( '/blog' );
    if (isset($has_category) && $has_category == true) {
        $category = get_the_category($post->ID);
        if (isset($category[0])) {
            $slug_category = $category[0]->slug;
            $home_url = home_url( 'blog/category/'.$slug_category.'/?page=' );
        }
    } else {
        $tag = get_the_tags($post->ID);
        if (isset($tag[0])) {
            $slug_tag = $tag[0]->slug;
            $home_url = home_url( 'blog/tag/'.$slug_tag.'/?page=' );
        }
    }

    if (get_query_var( 'month' )) {
        $month = array_search(ucfirst(get_query_var( 'month' )), $arr_month);
        $slug_category = $slug_tag = '';
        $home_url = home_url( '/blog/month/'.ucfirst(get_query_var( 'month' )) );
    }

    $custom_args = array(
        'post_type' => 'post',
        'posts_per_page' => DEFAULT_PAGE_SIZE,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged,
    );
    if (!empty($slug_category)) {
        $custom_args['category_name'] = $slug_category;
    }

    if (!empty($slug_tag)) {
        $custom_args['tag'] = $slug_tag;
    }

    if ($month && is_numeric($month)) {
        $custom_args['date_query'] = [[
                                        'month' => $month,
                                    ]];
    }

    $custom_query = new WP_Query( $custom_args );
    $wp_query = $custom_query;
    // echo $custom_query->found_posts;
    ?>

    <?php if ( $custom_query->have_posts() ) : ?>
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <div class="blog-top">
                <a href="<?php echo home_url( '/blog/').get_post_field( 'post_name', get_post())?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo get_the_title() ?>"/></a>
                <h4><a href="<?php echo home_url( '/blog/').get_post_field( 'post_name', get_post())?>"><?php echo get_the_title() ?></a></h4>
                <h5>Date : <?php echo get_the_date('d-m-Y') ?></h5>
                <?php echo get_field('description') ?>
                <a class="hvr-sweep-to-right more" href="<?php echo home_url( '/blog/').get_post_field( 'post_name', get_post())?>">Read More</a>
            </div>
            <div class="links"><hr></div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
        <?php
            if (function_exists(custom_pagination)) {
                custom_pagination($custom_query->max_num_pages,"", $paged, esc_url( $home_url ) );
            }
        ?>
        <nav>
            <ul class="pagination">
                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
