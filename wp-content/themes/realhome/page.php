<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php get_header(); ?>

<div class=" banner-buying">
    <div class=" container">
        <?php
        $first = substr($post->post_title, 0, 3);
        $theRest = substr($post->post_title, 3 , 1000);
        ?>
        <h3><span><?php echo $first; ?></span><?php echo $theRest; ?></h3>
        <!---->
        <div class="menu-right">
            <ul class="menu">
                <li class="item1"><a href="#"> Menu<i class="glyphicon glyphicon-menu-down"> </i> </a>
                    <ul class="cute" style="display: none;">
                        <li class="subitem1"><a href="buy.html">Buy </a></li>
                        <li class="subitem2"><a href="buy.html">Rent </a></li>
                        <li class="subitem3"><a href="buy.html">Hostels </a></li>
                        <li class="subitem1"><a href="buy.html">Resale</a></li>
                        <li class="subitem2"><a href="loan.html">Home Loan</a></li>
                        <li class="subitem3"><a href="buy.html">Apartment </a></li>
                        <li class="subitem3"><a href="dealers.html">Dealers</a></li>
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

<div class="terms">
    <div class="container">
        <?php echo $post->post_content; ?>
    </div>
</div>

<!--//footer-->
<?php get_footer(); ?>
