<?
/**
*	Functionality
*/

if( function_exists('acf_add_options_page') ): 
  acf_add_options_page();
endif;


add_action('init', 'register_user_menus', 0 );

add_filter('rewrite_rules_array','wp_insertMyRewriteRules');
add_filter('query_vars','wp_insertMyRewriteQueryVars');
add_filter('wp_loaded','flushRules');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(500, 500, true);
add_filter( 'jpeg_quality', 'perfect_jpeg_quality' );

//  add_filter( 'single_template', 'get_single_post_template' );
//  add_filter( 'taxonomy_template', 'get_taxonomy_post_template' );



function register_user_menus() {

	register_nav_menus(array(
		'main' => 'Header Menu'
	));

};

function get_single_post_template($single_template) {
  global $post;

  $seasons = get_the_terms($post->ID, 'season');

  if ($seasons): foreach ( $seasons as $season):
    if (file_exists( dirname( __FILE__ ) . "/single-{$post->post_type}-{$season->slug}.php" ) )
    $single_template = dirname( __FILE__ ) . "/single-{$post->post_type}-{$season->slug}.php" ;
  endforeach; endif;
  return $single_template;
}

function get_taxonomy_post_template($single_template) {
  global $post;
  global $wp_query;
  $wp_args = $wp_query->query;

  //  print_r($wp_args);

  $season = $wp_args['season'];

  if ($season):
    if (file_exists( dirname( __FILE__ ) . "/taxonomy-season-{$season}.php" ) )
    $single_template = dirname( __FILE__ ) . "/taxonomy-season-{$season}.php" ;
  endif;
  
  return $single_template;
}

function perfect_jpeg_quality() {
	return 100;
}

function flushRules() {
	global $wp_rewrite;
   	$wp_rewrite->flush_rules();
};

function wp_insertMyRewriteRules($rules) {
	// print_r($rules);
	$newrules = array();
	
	// $newrules['menswear'] = 'index.php?post_type=post&gender=menswear';
  //  $newrules['womenswear'] = 'index.php?post_type=post&gender=womenswear';
  //  $newrules['toogood'] = 'index.php?post_type=post&season=too-good';
  //  $newrules['brand/(.*)/(.*)/?$'] = 'index.php?brand=$matches[1]&gender=$matches[2]';
  $newrules['blog'] = 'index.php?post_type=post';
  $newrules['blog/page/?([0-9]{1,})/?$'] = 'index.php?post_type=post&paged=$matches[1]';
	return $newrules + $rules;
};

function wp_insertMyRewriteQueryVars($vars) {
    //  array_push($vars, 'id');
    //  array_push($vars, 'gender');
    return $vars;
};


/**
*	Admin
*/
add_action('login_head', 'my_login_head');
add_action('admin_head', 'hide_menus');

add_filter('manage_post_posts_columns', 'ST4_columns_remove_category');
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns', 5);
add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['wps_post_thumbs'] = __('Image');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
	if($column_name === 'wps_post_thumbs') {
        echo the_post_thumbnail( 'medium' );
    }
}

function ST4_columns_remove_category($defaults) {
	// to get defaults column names:
	// print_r($defaults);
	unset($defaults['comments']);
	return $defaults;
}

function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('stylesheet_directory')."/css/images/admin-logo.png') no-repeat scroll center top transparent;
		height: 15px;
		width: 97px;
		margin: 0 auto;
	}
	html,body { height:100%; background: #fff;color:#000; }
	html,body.login,#login { background: #fff; }
	#login { width: 373px; }
	#backtoblog { display: none; }
		
	/*div.updated, .login .message { background: #000; border: 0; border-color: #000; }*/
	</style>
	";
}

function hide_menus() {
	global $current_user;
	
	$menu_hide = '<style>#menu-links,#menu-comments';
	$menu_hide .= '{ display:none; }</style>';
	
	echo $menu_hide;
	
};


/**
*	Misc
*/
function relative_path($input) {
    return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input);
};

function curPageURL() {
	
	$pageURL = 'http';
	
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	
	$pageURL .= "://";
	
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	return $pageURL;
};

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );



/**
 * Other includes
 *
 */
include(TEMPLATEPATH.'/inc/resets.php');                #  Resets
include(TEMPLATEPATH.'/inc/wrapper.php');                #  Resets
include(TEMPLATEPATH.'/inc/post-contents.php');         #  Custom post types
include(TEMPLATEPATH.'/inc/taxonomy-filter.php');       #  Taxonomy Filtering
include(TEMPLATEPATH.'/inc/assets.php');                #  CSS + JS management

?>