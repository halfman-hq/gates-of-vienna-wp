<section id="blog-posts">
  <div class="container">
    <h3 class="blog-title">Blog</h3>
    <div class="grid clearfix">
<?
  $blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'showposts' => 3
  );
  $blog_query = new WP_Query($blog_args);
  while ($blog_query->have_posts()) : $blog_query->the_post();
?>
      <a href="<? the_permalink(); ?>" class="grid-item">
        <? the_post_thumbnail('post-thumbnail', array( 'class' => 'img' )); ?>
        <h3 class="title"><? the_title(); ?></h3>
      </a>
<?
  endwhile; wp_reset_postdata();
?>
    </div>

    <div id="page-nav">
      <a href="/blog" class="pager-link">Older &raquo;</a>
    </div>

  </div>
</section>