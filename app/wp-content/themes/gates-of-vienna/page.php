<? get_header(); ?>

<section id="content" class="page container">
<?
	global $query_string;
	$the_query = new WP_Query($query_string);
	while ($the_query->have_posts()) : $the_query->the_post();
?>
	  <h1 class="title"><? the_title(); ?>
    
    <article class="text">
		<? the_content(); ?>
		</article>
<?
	endwhile; wp_reset_postdata();
?>
</section>


<? get_footer(); ?>