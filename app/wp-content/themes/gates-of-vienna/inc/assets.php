<?
wp_register_style('site', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_template_directory().'/style.css' ), 'all');

wp_register_script('underscore', get_stylesheet_directory_uri() . '/js/libs/underscore-min.js', array(), filemtime( get_template_directory().'/js/libs/underscore-min.js' ), true);
wp_register_script('plugins', get_stylesheet_directory_uri() . '/js/plugins.js', array(), filemtime( get_template_directory().'/js/plugins.js' ), true);

wp_register_script('main', get_stylesheet_directory_uri() . '/js/script.js', array('underscore', 'plugins'), filemtime( get_template_directory().'/js/script.js' ), true);


?>