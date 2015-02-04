
<h3 class="blog-title">Blog</h3>

<section id="content">
  <div class="blog-posts container">
    <div class="grid clearfix">

<?
  $home_args = array(
    'posts_per_page' => -1,
    'showposts' => -1
  );
  $home_query = new WP_Query($home_args);
  while ($home_query->have_posts()): $home_query->the_post();
?>
    <a href="<? the_permalink(); ?>" class="grid-item">
      <? the_post_thumbnail('post-thumbnail', array( 'class' => 'img' )); ?>
      <h3 class="title"><? the_title(); ?></h3>
      <div class="time"><?= get_the_date(); ?></div>
    </a>
<?
  endwhile; wp_reset_postdata();
?>
    </div>
  </div>
</section>