<?php
function theme_post_types() {
  //Campus Post Type
  register_post_type('campus', array(
   'supports' => array('title', 'editor', 'excerpt'),
   'rewrite' => array('slug' => 'campuses'),
   'has_archive' => true,
   'public' => true,
   'labels' => array(
     'name' => 'Campuses',
     'add_new_item' => 'Add Campus',
     'edit_item' => 'Edit Campus',
     'all_items' => 'All Campuses',
     'singular_name' => 'Campus',
     'item_updated' => 'Campus updated.'
   ),
   'menu_icon' => 'dashicons-location-alt'
  ));

  //Event Post Type
  register_post_type('event', array(
   'supports' => array('title', 'editor', 'excerpt'),
   'rewrite' => array('slug' => 'events'),
   'has_archive' => true,
   'public' => true,
   'labels' => array(
     'name' => 'Events',
     'add_new_item' => 'Add Event',
     'edit_item' => 'Edit Event',
     'all_items' => 'All Events',
     'singular_name' => 'Event',
     'item_updated' => 'Event updated.'
   ),
   'menu_icon' => 'dashicons-calendar-alt'
 ));
//Programm Post Type
 register_post_type('program', array(
  'supports' => array('title', 'thumbnail', 'editor'),
  'rewrite' => array('slug' => 'programs'),
  'has_archive' => true,
  'public' => true,
  'labels' => array(
    'name' => 'Programms',
    'add_new_item' => 'Add Program',
    'edit_item' => 'Edit Program',
    'all_items' => 'All Programs',
    'singular_name' => 'Program',
    'item_updated' => 'Program updated.'
  ),
  'menu_icon' => 'dashicons-awards'
));

//Professor Post Type
 register_post_type('professor', array(
  'supports' => array('title', 'editor', 'thumbnail'),
  'public' => true,
  'labels' => array(
    'name' => 'Professors',
    'add_new_item' => 'Add New Professor',
    'edit_item' => 'Edit Professor',
    'all_items' => 'All Professors',
    'singular_name' => 'Professor',
  ),
  'menu_icon' => 'dashicons-welcome-learn-more'
));

}

add_action('init', 'theme_post_types');
?>
