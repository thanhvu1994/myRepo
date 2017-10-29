<div class=" banner-buying">
    <div class=" container">
        <?php
        $first = substr($post->post_title, 0, 3);
        $theRest = substr($post->post_title, 3 , 1000);
        ?>
        <h3><span><?php echo $first; ?></span><?php echo $theRest; ?></h3>
        <!---->
        <div class="menu-right">
            <?php $args = array(
                'posts_per_page'   => MAX_HEADER_BOTTOM_MENU,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'header_bottom_menu',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'	   => '',
                'author_name'	   => '',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $menuItem_array = get_posts( $args );
            ?>

            <ul class="menu">
                <li class="item1"><a href="#"> Menu<i class="glyphicon glyphicon-menu-down"> </i> </a>
                    <ul class="cute" style="display: none;">
                        <?php foreach($menuItem_array as $item): ?>
                            <li class="subitem1"><a href="<?php echo(get_field('page',$item)); ?>"><?php echo get_field('title',$item->ID)?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
        <!--initiate accordion-->
        <script type="text/javascript">
            $(function() {
                var menu_ul = $('.menu > li > ul'),
                    menu_a  = $('.menu > li > a');
                menu_ul.hide();
                menu_a.click(function(e) {
                    e.preventDefault();
                    if(!$(this).hasClass('active')) {
                        menu_a.removeClass('active');
                        menu_ul.filter(':visible').slideUp('normal');
                        $(this).addClass('active').next().stop(true,true).slideDown('normal');
                    } else {
                        $(this).removeClass('active');
                        $(this).next().stop(true,true).slideUp('normal');
                    }
                });

            });
        </script>

    </div>
</div>