<?php
function pageBanner($args = null) {
    if (!$args['title']) {
        $args['title'] = get_the_title();
    }
    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!$args['photo']) {
        if (get_field('page_banner_background_image')){
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }

    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php echo $args['title']; ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle'];?></p>
            </div>
        </div>
    </div>
<?php
}

//Load in our CSS
function style() {
    wp_enqueue_style('google_fount', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('social_icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('main_style', get_stylesheet_uri(), NULL, microtime());
}

add_action('wp_enqueue_scripts', 'style');

//Load in our JS
function script() {
    wp_enqueue_script('main_js', get_theme_file_uri('/js/scripts-bundled.js'), array('jquery'), microtime(), TRUE);
    wp_enqueue_script('theme-js', '//code.jquery.com/jquery-3.5.1.js', array("jquery"), microtime(), true);
    wp_enqueue_script('theme-js', get_theme_file_uri('/js/scripts.js'), array('jquery'), microtime(), true);
    wp_enqueue_script('theme-js', get_stylesheet_directory_uri('/js/modules/Search.js'), array('jquery'), microtime(), true);
}

add_action('wp_enqueue_scripts', 'script');

function theme_feature () {
    add_theme_support('title_tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorlandscape', 400, 260, true);
    add_image_size('professorportrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 320, true);
    register_nav_menu('Primary_Menu', 'Primary Menu');
    register_nav_menu('Top_Menu', 'Top Menu');
    register_nav_menu('Footer_Menu_One', 'Footer Menu One');
    register_nav_menu('Footer_Menu_Two', 'Footer Menu Two');
    register_nav_menu('Footer_Menu_Three', 'Footer Menu Three');

}

add_action('after_setup_theme', 'theme_feature');

function theme_adjustment_query ($query){
    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        ));
    }
    if (!is_admin() and is_post_type_archive('programm') and $query->is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('program-per-page', '-1');  
    }
}

add_action('pre_get_posts', 'theme_adjustment_query');


/*function googleMapApi($api) {
    $api['key'] = 'AIzaSyAyv4TD4Zqr98QKTIUledoPmvGXYIIc3sw';
    return $api;
}

add_filter('acf/fields/map_location/api', 'googleMapApi');
*/

















