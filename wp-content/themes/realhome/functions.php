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
    'name' => __('Main Sidebar', 'realhome'),
    'id' => 'main-sidebar',
    'description' => 'Main sidebar for Real Home theme',
    'class' => 'main-sidebar',
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
    global $post;

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