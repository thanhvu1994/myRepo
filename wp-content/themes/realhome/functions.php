<?php
/**
 * Created by PhpStorm.
 * User: Thanh Vu
 * Date: 10/18/2017
 * Time: 9:57 AM
 */

/**
@ Thiết lập các hằng dữ liệu quan trọng
@ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
@ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
 **/
define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'CORE', THEME_URL . '/core' );
define( 'MAX_HEADER_BOTTOM_MENU', 7);
define( 'WIDTH_PERCENT_HEADER_BOTTOM_MENU_ITEM', 100 / MAX_HEADER_BOTTOM_MENU);
define( 'INNER_BANNER_WITH_BACKGROUND', 1);
define( 'INNER_BANNER_NO_BACKGROUND', 2);
define( 'INNER_BANNER_WITH_VIDEO', 3);
define( 'DEFAULT_PAGE_SIZE', 10);

/**
@ Load file /core/init.php
@ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
 **/

/*require_once( CORE . '/init.php' );*/

/**
@ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
if ( ! isset( $content_width ) ) {
    /*
     * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
     */
    $content_width = 620;
}

/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'realhome_theme_setup' ) ) {
    /*
     * Nếu chưa có hàm realhome_theme_setup() thì sẽ tạo mới hàm đó
     */
    function realhome_theme_setup() {

    }
    add_action ( 'init', 'realhome_theme_setup' );

}

/*
* Thêm chức năng post thumbnail
*/
add_theme_support( 'post-thumbnails' );

/*
* Thêm chức năng title-tag để tự thêm <title>
*/
add_theme_support( 'title-tag' );

/*
* Thêm chức năng post format
*/
add_theme_support( 'post-formats',
    array(
        'image',
        'video',
        'gallery',
        'quote',
        'link'
    )
);

/*
* Thêm chức năng custom background
*/
$default_background = array(
    'default-color' => '#e8e8e8',
);
add_theme_support( 'custom-background', $default_background );

/*
* Tạo menu cho theme
*/
register_nav_menu ( 'main-menu', __('Main Menu', 'realhome') );

/*
* Tạo sidebar cho theme
*/
$sidebar = array(
    'name' => __('Header', 'realhome'),
    'id' => 'header',
    'description' => 'Header for Real Home theme',
    'class' => 'header',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>'
);
register_sidebar( $sidebar );

$sidebar = array(
    'name' => __('Home Page', 'realhome'),
    'id' => 'home_page',
    'description' => 'Home Page for Real Home theme',
    'class' => 'home_page',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>'
);
register_sidebar( $sidebar );

$sidebar = array(
    'name' => __('Footer', 'realhome'),
    'id' => 'Footer',
    'description' => 'Footer for Real Home theme',
    'class' => 'footer',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>'
);
register_sidebar( $sidebar );

/**
@ Thiết lập hàm hiển thị menu
@ realhome_menu( $slug )
 **/
if ( ! function_exists( 'realhome_menu' ) ) {
    function realhome_menu( $slug ) {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => 'pull',
            'menu_class' => ''
        );
        wp_nav_menu( $menu );
    }
}

add_action('admin_init', 'add_phone_field');
function add_phone_field() {
    add_settings_field(
        'phone_field',
        'Phone',
        'add_phone_field_callback',
        'general',
        'default',
        array( // The $args
            'phone_field'
        )
    );

    register_setting('general','phone_field', 'esc_attr');
}

function add_phone_field_callback($args) {
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

add_filter( 'manage_edit-header_bottom_menu_columns', 'my_edit_header_bottom_menu_columns' ) ;

function my_edit_header_bottom_menu_columns( $columns ) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title_custom' => __( 'Title' ),
        'icon' => __( 'Icon' ),
        'date' => __( 'Date' )
    );

    return $columns;
}

add_action( 'manage_header_bottom_menu_posts_custom_column', 'my_manage_header_bottom_menu_columns', 10, 2 );

function my_manage_header_bottom_menu_columns( $column, $post_id ) {
    switch( $column ) {

        case 'title_custom' :

            $title = get_post_meta( $post_id, 'title', true );

            if ( empty( $title ) )
                echo __( 'Unknown' );

            else
                printf( __( '<a class="row-title" href="post.php?post='.$post_id.'&action=edit">%s</a>' ), $title );

            break;

        case 'icon' :

            $icon = get_post_meta( $post_id, 'icon', true );

            if ( empty( $icon ) )
                echo __( 'Unknown' );

            else
                printf( $icon );

            break;

        default :
            break;
    }
}

add_filter( 'map_meta_cap', function ( $caps, $cap, $user_id, $args )
{
    // Nothing to do
    if( 'delete_post' !== $cap || empty( $args[0] ) )
        return $caps;

    // Target the payment and transaction post types
    if( in_array( get_post_type( $args[0] ), [ 'inner_banner' ], true ) )
        $caps[] = 'do_not_allow';

    return $caps;
}, 10, 4 );

add_filter( 'manage_edit-testimonial_columns', 'my_edit_testimonial_columns' ) ;

function my_edit_testimonial_columns( $columns ) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'username' => __( 'Username' ),
        'comment' => __( 'Comment' ),
        'date' => __( 'Date' )
    );

    return $columns;
}

add_action( 'manage_testimonial_posts_custom_column', 'my_manage_testimonial_columns', 10, 2 );

function my_manage_testimonial_columns( $column, $post_id ) {
    switch( $column ) {

        case 'username' :

            $username = get_post_meta( $post_id, 'username', true );

            if ( empty( $username ) )
                echo __( 'Unknown' );

            else
                printf( __( '<a class="row-title" href="post.php?post='.$post_id.'&action=edit">%s</a>' ), $username );

            break;

        case 'comment' :

            $comment = get_post_meta( $post_id, 'comment', true );

            if ( empty( $comment ) )
                echo __( 'Unknown' );

            else
                printf( $comment );

            break;

        default :
            break;
    }
}

function custom_pagination($numpages = '', $pagerange = '', $paged='', $base) {

    if (empty($pagerange)) {
        $pagerange = 2;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default quries
     * and custom queries.
     */
    global $wp_query;

    if (empty($paged)) {
        $paged = 1;
    }

    if ($numpages == '') {

        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = array(
        'base'            => $base.'%_%',
        'format'          => '/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('&laquo;'),
        'next_text'       => __('&raquo;'),
        'type'            => 'array',
        'add_args'        => false,
        'add_fragment'    => ''
    );

    $paginate_links = paginate_links($pagination_args);
    if (!empty($paginate_links) && is_array($paginate_links)) {
        echo "<nav><ul class='pagination pagination-custom'>";
        foreach ($paginate_links as $link) {
            if (strpos($link, 'current') !== false) {
                echo '<li class="active"><a href="javascript:void(0)">'.$paged.'<span class="sr-only">(current)</span></a></li>';
            } else {
                echo '<li>'.$link.'</li>';
            }
        }
        echo "</ul></nav>";
    }
}

function acf_load_city_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();

    $args = array(
    'offset'           => 0,
    'category'         => '',
    'category_name'    => '',
    'orderby'          => 'menu_order',
    'order'            => 'ASC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'city',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'	   => '',
    'author_name'	   => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
    );
    $cities = get_posts( $args );

    if( !empty($cities) ) {
        foreach( $cities as $city ) {
            $field['choices'][ $city->post_name ] = $city->post_title;
        }
    }

    // return the field
    return $field;

}

add_filter('acf/load_field/name=city', 'acf_load_city_field_choices');

function template_chooser($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');

    if( $wp_query->is_search && $post_type == 'project' )
    {
        return locate_template('archive-search.php');  //  redirect to archive-search.php
    }
    return $template;
}
add_filter('template_include', 'template_chooser');

//search

function misha_filter_function(){
    $filter = $_POST;

    $_SESSION['sessionFilterProject'] = $filter;

    die();
}


add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

//search
function custom_rewrite_tag() {
    add_rewrite_tag('%s%', '([^&]+)');
    add_rewrite_tag('%post_type%', '([^&]+)');
    add_rewrite_tag('%type%', '([^&]+)');
    add_rewrite_tag('%page%', '([^&]+)');
    add_rewrite_tag('%city%', '([^&]+)');
    add_rewrite_tag('%category%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function custom_rewrite_rule() {
    add_rewrite_rule('^search/([^/]*)/([^/]*)/([^/]*)/([0-9]{1,})/?','index.php?post_type=$matches[1]&type=$matches[2]&page=$matches[3]&s=$matches[4]','top');
    add_rewrite_rule('^search/([^/]*)/([^/]*)/([^/]*)/?','index.php?post_type=$matches[1]&type=$matches[2]&s=$matches[3]','top');
    add_rewrite_rule('^city/([^/]*)/([^/]*)/?','index.php?post_type=city&city=$matches[1]&type=$matches[2]','top');
    add_rewrite_rule('^blog/([^/]*)/([^/]*)/?','index.php?category=$matches[1]&name=$matches[2]','top');
    add_rewrite_rule('^blog/([^/]*)/?','index.php?page_id=9&category=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);

function change_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) && ! empty( $_GET['post_type'] )) {
        $url = home_url( "/search/" );
        if (!isset($_GET['type']) || empty($_GET['type'])) {
            $url .= urlencode( get_query_var( 'post_type' ) ) .'/all';
        } else {
            $url .= urlencode( get_query_var( 'post_type' ) ) .'/'. urlencode( get_query_var( 'type' ) );
        }
        $url .=  '/'. urlencode( get_query_var( 's' ) );
        wp_redirect($url);
        exit();
    }
}
add_action( 'template_redirect', 'change_search_url_rewrite' );

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}