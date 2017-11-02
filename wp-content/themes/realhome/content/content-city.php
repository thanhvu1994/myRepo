<?php
$type_page = explode('-', get_query_var('type'));

if(count($type_page) == 1) {
    $typed = $type_page[0];
    $paged = 1;
}else if(count($type_page) == 2) {
    $typed = $type_page[0];
    $paged = $type_page[1];
}else{
    $typed = 'buy';
    $paged = 1;
}
?>

<div class="single">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(get_page_by_title($typed)); ?>"><?php echo ucfirst($typed); ?></a></li>
            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
        </ol>


        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
            <div class="single-buy">
                <div class="col-sm-3 check-top-single">
                    <div class="single-bottom">
                        <h4>Area</h4>
                        <ul>
                            <li>
                                <input name="area" type="radio"  id="brand" value="0-50">
                                <label for="brand"><span></span> 0 - 50 m<sup>2</sup></label>
                            </li>
                            <li>
                                <input name="area" type="radio"  id="brand1" value="51-101">
                                <label for="brand1"><span></span> 51 - 100 m<sup>2</sup></label>
                            </li>
                            <li>
                                <input name="area" type="radio"  id="brand2" value="101-200">
                                <label for="brand2"><span></span> 101 - 200 m<sup>2</sup></label>
                            </li>
                            <li>
                                <input name="area" type="radio"  id="brand3" value="201">
                                <label for="brand3"><span></span> 201 m<sup>2</sup> <</label>
                            </li>
                            <li>
                                <button style="background-color: white; color:#27da93; border-color: #27da93;" class="btn btn-success apply">Apply filter</button>
                                <button onclick="clearFilter()" style="background-color: white; color:#27da93; border-color: #27da93;" class="btn btn-success clear">Clear filter</button>
                                <input type="hidden" name="action" value="myfilter">
                                <input type="hidden" name="type" value="<?php echo $typed; ?>">
                                <input type="hidden" name="page" value="<?php echo $paged; ?>">
                                <input type="hidden" name="city" value="<?php echo $post->post_name; ?>">
                            </li>
                        </ul>
                    </div>
                </div>
                <script>
                    function clearFilter(){
                        jQuery('input').attr('checked',false);
                    }
                </script>
                <div class="col-sm-3 check-top-single">
                    <div class="single-bottom">
                        <h4>Floors</h4>
                        <ul>
                            <li>
                                <input name="floor" type="radio"  id="brand5" value="1-2">
                                <label for="brand5"><span></span> 1 - 2 Floor(s)</label>
                            </li>
                            <li>
                                <input name="floor" type="radio"  id="brand6" value="3-4">
                                <label for="brand6"><span></span> 3 - 4 Floors</label>
                            </li>
                            <li>
                                <input name="floor" type="radio"  id="brand7" value="5-6">
                                <label for="brand7"><span></span> 5 - 6 Floors</label>
                            </li>
                            <li>
                                <input name="floor" type="radio"  id="brand8" value="7">
                                <label for="brand8"><span></span> 7+ Floors</label>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 check-top-single">
                    <div class="single-bottom">
                        <h4>Bedrooms</h4>
                        <ul>
                            <li>
                                <input name="bedroom" type="radio"  id="brand9" value="1-4">
                                <label for="brand9"><span></span> 1-4 Bedroom(s) </label>
                            </li>
                            <li>
                                <input name="bedroom" type="radio"  id="brand10" value="5-8">
                                <label for="brand10"><span></span> 5-8 Bedrooms </label>
                            </li>
                            <li>
                                <input name="bedroom" type="radio"  id="brand11" value="9-13">
                                <label for="brand11"><span></span> 9-13 Bedrooms</label>
                            </li>
                            <li>
                                <input name="bedroom" type="radio"  id="brand12" value="14">
                                <label for="brand12"><span></span> 14+ Bedrooms</label>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 check-top-single">
                    <div class="single-bottom">
                        <h4>Price</h4>
                        <ul>
                            <li>
                                <input name="price" type="radio"  id="brand13" value="0-1000000000">
                                <label for="brand13"><span></span> Under 1.000.000.000 VND </label>
                            </li>
                            <li>
                                <input name="price" type="radio"  id="brand14" value="1000000000-2000000000">
                                <label for="brand14"><span></span> 1 - 2.000.000.000 VND</label>
                            </li>
                            <li>
                                <input name="price" type="radio"  id="brand15" value="2000000000-4000000000">
                                <label for="brand15"><span></span> 2 - 4.000.000.000 VND</label>
                            </li>
                            <li>
                                <input name="price" type="radio"  id="brand16" value="4000000000-8000000000">
                                <label for="brand16"><span></span> 4 - 8.000.000.000 VND</label>
                            </li>
                            <li>
                                <input name="price" type="radio"  id="brand17" value="8000000000">
                                <label for="brand17"><span></span> 8.000.000.000 VND < </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </form>

        <script>
            jQuery(function($){
                $('#filter').submit(function(){
                    var filter = $('#filter');
                    $.ajax({
                        url:filter.attr('action'),
                        data:filter.serialize(), // form data
                        type:filter.attr('method'), // POST
                        beforeSend:function(xhr){
                            filter.find('button.apply').text('Processing...'); // changing the button label
                        },
                        success:function(data){
                            filter.find('button.apply').text('Apply filter'); // changing the button label back
                            $('#response').html(data); // insert data
                        }
                    });
                    return false;
                });
            });
        </script>
    </div>

    <!---->
    <div class="container">

        <div class="buy-single">
            <?php
            switch($typed){
                case 'buy':
                    $title = 'Houses for sale';
                    $type = 'sell';
                    break;
                case 'rent':
                    $title = 'Houses, Apartments for Rent';
                    $type = 'rent';
                    break;
                case 'apartment':
                    $title = 'Apartments for Sale';
                    $type = 'apartment';
                    break;
                case 'hotel':
                    $title = 'Hotels for Sale';
                    $type = 'hotel';
                    break;
                default:
                    $title = 'Houses for Sale';
                    $type = 'sell';
                    break;
            }
            ?>
            <h3><?php echo $title; ?></h3>

            <div id="response" class="box-sin">
                <div class="col-md-9 single-box">
                    <?php

                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => 2,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'meta_query' => array(
                            'relation' => 'AND', // Optional, defaults to "AND"
                            array(
                                'key'     => 'type',
                                'value'   => $type,
                                'compare' => '='
                            ),
                            array(
                                'key'     => 'city',
                                'value'   => $post->post_name,
                                'compare' => '='
                            )
                        ),
                        'paged' => $paged,
                    );

                    $custom_query = new WP_Query( $args );
                    ?>
                    <?php if ( $custom_query->have_posts() ) : ?>
                        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                            <div class="box-col">
                                <div class=" col-sm-7 left-side ">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), '498.755x349.16' );
                                        ?>
                                        <img class="img-responsive" src="<?php echo $image[0]; ?>" alt="">
                                    </a>
                                </div>
                                <div class="  col-sm-5 middle-side">
                                    <h4>Project Detail</h4>
                                    <p><span class="bath">Location </span>: <span class="two"><?php echo get_field('location'); ?></span></p>
                                    <p><span class="bath1">Area </span>: <span class="two"><?php echo get_field('area'); ?> m<sup>2</sup></span></p>
                                    <p><span class="bath2">Floors </span>: <span class="two"><?php echo get_field('floor'); ?></span></p>
                                    <p><span class="bath3">Bedrooms </span>: <span class="two"><?php echo get_field('bedroom'); ?></span></p>
                                    <p><span class="bath4">Price </span> : <span class="two"><?php echo get_field('price'); ?></span></p>
                                    <div class="   right-side">
                                        <a href="<?php echo get_permalink(get_page_by_title('contact')); ?>" class="hvr-sweep-to-right more">Contact Now</a>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
            </div>

            <div class="col-md-3 map-single-bottom">
                <div class="map-single">
                    <iframe src="<?php echo get_field('iframe_map', $post->ID); ?>"></iframe>
                </div>
                <div class="single-box-right">
                    <h4>Featured Communities</h4>
                    <?php
                    $communities = acf_photo_gallery('Community',$post->ID);
                    ?>
                    <?php foreach($communities as $community): ?>
                        <div class="single-box-img ">
                            <div class="box-img">
                                <a href="#openModal_<?php echo $community['id']; ?>"><img class="img-responsive" src="<?php echo $community['full_image_url']; ?>" alt=""></a>
                            </div>
                            <div class="box-text">
                                <p>
                                    <a href="#openModal_<?php echo $community['id']; ?>" ><?php echo $community['title']; ?></a>
                                </p>
                                <p style="font-weight: normal">
                                    <?php echo (strlen ($community['caption']) > 40)? substr($community['caption'],0,40).'...' : $community['caption']; ?>
                                </p>
                                <a href="#openModal_<?php echo $community['id']; ?>" class="in-box">More Info</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                        <div id="openModal_<?php echo $community['id']; ?>" class="modalDialog">
                            <div>
                                <a href="#close" title="Close" class="close">X</a>
                                <h2><?php echo $community['title']; ?></h2>
                                <div class="community-image" style="background: url(<?php echo $community['full_image_url']; ?>);">
                                </div>
                                <p><?php echo $community['caption']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="clearfix"> </div>
            <div class="nav-page">
                <nav>
                    <ul class="pagination">
                        <?php
                            $arrPages = array($paged-2 ,$paged-1 , (int)$paged, $paged+1, $paged+2);
                            $max_page = ($custom_query->max_num_pages >= 1)? $custom_query->max_num_pages : 1;
                        ?>
                        <li <?php echo ($paged == 1)? 'class="disabled"' : ''; ?> ><a href="<?php echo get_permalink().$typed.'/'; ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>

                        <?php foreach($arrPages as $page) : ?>
                            <?php
                                $class = '';
                                if($page == $paged){
                                    echo '<li class="active"><a href="javascript:void(0)">'.$page.'<span class="sr-only">(current)</span></a></li>';
                                }else if($page > 0 && $page <= $max_page){
                                    if($page == 1){
                                        echo '<li><a href="'.get_permalink().$typed.'/'.'">'.$page.'</a></li>';
                                    }else{
                                        echo '<li><a href="'.get_permalink().$typed.'-'.$page.'/'.'">'.$page.'</a></li>';
                                    }
                                }
                            ?>
                        <?php endforeach; ?>

                        <li <?php echo ($paged == $max_page)? 'class="disabled"' : ''; ?>><a href="<?php echo get_permalink().$typed.'-'.$max_page.'/'; ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

</div>