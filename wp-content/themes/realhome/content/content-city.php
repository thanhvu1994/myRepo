<div class="single">
    <div class="container">

        <div class="single-buy">
            <div class="col-sm-3 check-top-single">
                <div class="single-bottom">
                    <h4>Area</h4>
                    <ul>
                        <li>
                            <input type="checkbox"  id="brand" value="0-50">
                            <label for="brand"><span></span> 0 - 50 m<sup>2</sup></label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand1" value="50-100">
                            <label for="brand1"><span></span> 50 - 100 m<sup>2</sup></label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand2" value="100-200">
                            <label for="brand2"><span></span> 100 - 200 m<sup>2</sup></label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand3" value="200+">
                            <label for="brand3"><span></span> 200 m<sup>2</sup> <</label>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-3 check-top-single">
                <div class="single-bottom">
                    <h4>Floors</h4>
                    <ul>
                        <li>
                            <input type="checkbox"  id="brand5" value="1-2">
                            <label for="brand5"><span></span> 1 - 2 Floor(s)</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand6" value="3-4">
                            <label for="brand6"><span></span> 3 - 4 Floors</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand7" value="5-6">
                            <label for="brand7"><span></span> 5 - 6 Floors</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand8" value="7+">
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
                            <input type="checkbox"  id="brand9" value="1-4">
                            <label for="brand9"><span></span> 1-4 Bedroom(s) </label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand10" value="5-8">
                            <label for="brand10"><span></span> 5-8 Bedrooms </label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand11" value="9-13">
                            <label for="brand11"><span></span> 9-13 Bedrooms</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand12" value="14+">
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
                            <input type="checkbox"  id="brand13" value="0-1000000000">
                            <label for="brand13"><span></span> Under 1.000.000.000 VND </label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand14" value="1000000000-2000000000">
                            <label for="brand14"><span></span> 1 - 2.000.000.000 VND</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand15" value="2000000000-4000000000">
                            <label for="brand15"><span></span> 2 - 4.000.000.000 VND</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand16" value="4000000000-8000000000">
                            <label for="brand16"><span></span> 4 - 8.000.000.000 VND</label>
                        </li>
                        <li>
                            <input type="checkbox"  id="brand17" value="8000000000+">
                            <label for="brand17"><span></span> 8.000.000.000 VND < </label>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <!---->
    <div class="container">

        <div class="buy-single">
            <?php
                switch($_GET['type']){
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
            <div class="box-sin">
                <div class="col-md-9 single-box">
                    <?php
                            $args = array(
                            'post_type' => 'project',
                            'posts_per_page' => 6,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'meta_key'		=> 'type',
                            'meta_value'	=> $type,
                            );

                            $projects = get_posts($args);
                    ?>
                    <?php foreach($projects as $project): ?>
                        <div class="box-col">
                            <div class=" col-sm-7 left-side ">
                                <a href="<?php echo get_permalink($project->ID); ?>">
                                    <?php
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), '498.755x349.16' );
                                    ?>
                                    <img class="img-responsive" src="<?php echo $image[0]; ?>" alt="">
                                </a>
                            </div>
                            <div class="  col-sm-5 middle-side">
                                <h4>Project Detail</h4>
                                <p><span class="bath">Location </span>: <span class="two"><?php echo get_field('location',$project->ID); ?></span></p>
                                <p><span class="bath1">Area </span>: <span class="two"><?php echo get_field('area',$project->ID); ?> m<sup>2</sup></span></p>
                                <p><span class="bath2">Floors </span>: <span class="two"><?php echo get_field('floor',$project->ID); ?></span></p>
                                <p><span class="bath3">Bedrooms </span>: <span class="two"><?php echo get_field('bedroom',$project->ID); ?></span></p>
                                <p><span class="bath4">Price </span> : <span class="two"><?php echo get_field('price',$project->ID); ?></span></p>
                                <div class="   right-side">
                                    <a href="<?php echo get_permalink(get_page_by_title('contact')); ?>" class="hvr-sweep-to-right more">Contact Now</a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    <?php endforeach; ?>
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
                                <a href="<?php echo $community['url']; ?>" target="_blank"><img class="img-responsive" src="<?php echo $community['full_image_url']; ?>" alt=""></a>
                            </div>
                            <div class="box-text">
                                <p>
                                    <a href="<?php echo $community['url']; ?>" target="_blank" ><?php echo $community['title']; ?></a>
                                </p>
                                <p style="font-weight: normal">
                                    <?php echo $community['caption']; ?>
                                </p>
                                <a href="<?php echo $community['url']; ?>" class="in-box" target="_blank">More Info</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="nav-page">
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
            </div>
        </div>

    </div>

</div>