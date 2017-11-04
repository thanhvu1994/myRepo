<div class="col-md-9 blog-head">
<?php
    // $arr_month = [
    //     1 => 'January',
    //     2 => 'February',
    //     3 => 'March',
    //     4 => 'April',
    //     5 => 'May',
    //     6 => 'June',
    //     7 => 'July',
    //     8 => 'August',
    //     9 => 'September',
    //     10 => 'October',
    //     11 => 'November',
    //     12 => 'December',
    // ];

    global $wp_query;
    // $slug_category = $slug_tag = $month = '';
    $slug_category = ( get_query_var( 'category' ) ) ? get_query_var( 'category' ) : '';

    // if (isset($has_category) && $has_category == true) {
    //     $category = get_the_category($post->ID);
    //     if (isset($category[0])) {
    //         $slug_category = $category[0]->slug;
    //         $home_url = home_url( 'blog/category/'.$slug_category.'/?page=' );
    //     }
    // }
    // if (!empty($slug_category) && $slug_category != 'all') {
    //     $home_url = home_url( 'blog/').$slug_category.'/page';
    // }
    $home_url = home_url( '/blog/' );

    // $cat = get_category_by_slug($slug_category);
    // $catId = 0;
    // if ($cat) {
    //     $catId = $cat->term_id;
    // }

    if (!empty($slug_category)) {
        // if ($catId == 0) {
            $slug_page = explode('-', $slug_category);

            if(count($slug_page) == 1) {
                $slug = $slug_page[0];
                $paged = 1;
            }else if(count($slug_page) >= 2 && isset($slug_page[count($slug_page) - 1]) && is_numeric($slug_page[count($slug_page) - 1])) {
                $paged = $slug_page[count($slug_page) - 1];
                unset($slug_page[count($slug_page) - 1]);
                $slug = implode('-', $slug_page);
            }else{
                $slug = $slug_category;
                $paged = 1;
            }

        // } else {
        //     $slug = $slug_category;
        //     $paged = 1;
        // }

        $home_url .= $slug;

    } else {
        $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
    }

    // else {
    //     $tag = get_the_tags($post->ID);
    //     if (isset($tag[0])) {
    //         $slug_tag = $tag[0]->slug;
    //         $home_url = home_url( 'blog/tag/'.$slug_tag.'/?page=' );
    //     }
    // }

    // if (get_query_var( 'month' )) {
    //     $month = array_search(ucfirst(get_query_var( 'month' )), $arr_month);
    //     $slug_category = $slug_tag = '';
    //     $home_url = home_url( '/blog/month/'.ucfirst(get_query_var( 'month' )) );
    // }

    $custom_args = array(
        'post_type' => 'post',
        'posts_per_page' => DEFAULT_PAGE_SIZE,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged,
    );
    if (!empty($slug_category)) {
        if ($slug != 'all') {
            $custom_args['category_name'] = $slug;
        }
    }

    // if (!empty($slug_tag)) {
    //     $custom_args['tag'] = $slug_tag;
    // }

    // if ($month && is_numeric($month)) {
    //     $custom_args['date_query'] = [[
    //                                     'month' => $month,
    //                                 ]];
    // }

    $custom_query = new WP_Query( $custom_args );
    $wp_query = $custom_query;
    ?>

    <?php if ( $custom_query->have_posts() ) : ?>
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <div class="blog-top">
                <?php $category = get_the_category();
                    if (isset($category[0])) {
                        $slug_category_detail = $category[0]->slug;
                        $detail_url = home_url( '/blog/').$slug_category_detail.'/'.get_post_field( 'post_name', get_post());
                    } ?>
                <a href="<?php echo $detail_url?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo get_the_title() ?>"/></a>
                <h4><a href="<?php echo $detail_url?>"><?php echo get_the_title() ?></a></h4>
                <h5>Date : <?php echo get_the_date('d-m-Y') ?></h5>
                <?php echo get_field('description') ?>
                <a class="hvr-sweep-to-right more" href="<?php echo $detail_url?>">Read More</a>
            </div>
            <div class="links"><hr></div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
        <?php
            // if (function_exists(custom_pagination)) {
            //     custom_pagination($custom_query->max_num_pages,"", $paged, esc_url( $home_url ) );
            // }
        ?>
        <?php
            $arrPages = array($paged-2 ,$paged-1 , (int)$paged, $paged+1, $paged+2);
            $max_page = ($custom_query->max_num_pages >= 1)? $custom_query->max_num_pages : 1;
            if ($max_page > 1) { ?>
                <nav>
                    <ul class="pagination">
                        <li <?php echo ($paged == 1)? 'class="disabled"' : ''; ?> ><a href="<?php echo $home_url.'/'; ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>

                        <?php foreach($arrPages as $page) : ?>
                            <?php
                                $class = '';
                                if($page == $paged){
                                    echo '<li class="active"><a href="javascript:void(0)">'.$page.'<span class="sr-only">(current)</span></a></li>';
                                }else if($page > 0 && $page <= $max_page){
                                    if($page == 1){
                                        echo '<li><a href="'.$home_url.'/'.'">'.$page.'</a></li>';
                                    }else{
                                        echo '<li><a href="'.$home_url.'-'.$page.'/'.'">'.$page.'</a></li>';
                                    }
                                }
                            ?>
                        <?php endforeach; ?>

                        <li <?php echo ($paged == $max_page)? 'class="disabled"' : ''; ?>><a href="<?php echo $home_url.'-'.$max_page.'/'; ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            <?php } ?>
    <?php else: ?>
        <div class="alert alert-danger" style="text-align: center">
            No Blog in this page, please try again another time!
        </div>
    <?php endif; ?>
</div>
