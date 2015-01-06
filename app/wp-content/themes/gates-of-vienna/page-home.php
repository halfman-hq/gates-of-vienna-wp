<?
/* Template Name: Home */
get_header();
?>

<?
	$the_query = new WP_Query('pagename=home');
	while ($the_query->have_posts()) : $the_query->the_post();
?>

  <? include TEMPLATEPATH.'/views/home/intro.php'; ?>
  <? include TEMPLATEPATH.'/views/home/pitch.php'; ?>
  <? include TEMPLATEPATH.'/views/home/carousel.php'; ?>
  <? include TEMPLATEPATH.'/views/home/newsletter.php'; ?>
  <? include TEMPLATEPATH.'/views/home/blog-posts.php'; ?>
  <? include TEMPLATEPATH.'/views/home/about-project.php'; ?>
  <? include TEMPLATEPATH.'/views/home/about-author.php'; ?>

<?
	endwhile; wp_reset_postdata();
?>
