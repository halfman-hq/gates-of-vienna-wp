
<section id="content">
  <div class="blog-posts container">
<?
  $home_args = array(
    'posts_per_page' => -1,
    'showposts' => -1
  );
  $home_query = new WP_Query($home_args);
  while ($home_query->have_posts()): $home_query->the_post();
?>
    <article class="post clearfix">
      <a href="<? the_permalink(); ?>" class="img-container">
        <? the_post_thumbnail('post-thumbnail', array( 'class' => 'img' )); ?>
      </a>
      <div class="text">
        <h2 class="title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
        <?= get_the_excerpt(); ?>
      </div>
    </article>
<?
  endwhile; wp_reset_postdata();
?>
  </div>
</section>