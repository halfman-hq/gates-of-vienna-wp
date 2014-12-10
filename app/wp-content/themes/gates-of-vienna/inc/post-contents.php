<?
add_action('init', 'register_custom_post_types', 0 );

function register_custom_post_types() {

  $args_series = array(
    'labels' => array(
      'name' => ( 'Series' ),
      'singular_name' => ( 'Series' ),
      'add_new' => ( 'Add New' ),
      'add_new_item' => ( 'Add New Series' ),
      'edit' => ( 'Edit' ),
      'edit_item' => ( 'Edit Series' ),
      'new_item' => ( 'New Series' ),
      'view' => ( 'View Series' ),
      'view_item' => ( 'View Series' ),
      'search_items' => ( 'Search Series' ),
      'not_found' => ( 'No Series Found' ),
      'not_found_in_trash' => ( 'No Series Found in Trash' ),
      'parent' => ( 'Parent Series' ),
    ),
    'publicly_queryable' => true,
    'public' => true,
    'show_ui' => true,
    'taxonomies' => array('collection'),
    'supports' => array( 'title', 'thumbnail', 'revisions'),
    'has_archive' => true,
    'rewrite' => array(
      'slug' => 'series',
      'with_front' => false
      )
    
  );

  //  register_post_type('slideshows', $args_series);

};

?>