<section id="content">

<?
  global $query_string;
  $article_query = new WP_Query($query_string);
  while ($article_query->have_posts()): $article_query->the_post();
?>

  <article class="article container clearfix">
    
    <div class="headers">
      
      <h1 class="title"><? the_title(); ?></h1>
      <div class="time">Posted on <?= get_the_date(); ?> by <? the_author(); ?></div>

      <div class="tags"><? the_tags( 'Tagged: '); ?></div>

    </div>
    
    <? get_template_part('views/posts/content'); ?>

    <div id="post-nav" class="clearfix">
<?
  $prev_post = get_previous_post();
  $next_post = get_next_post();

  if ($prev_post):
?>
      <a href="<?= get_permalink( $prev_post->ID ); ?>" id="previous-post" class="post-link">&larr; <?= $prev_post->post_title; ?></a>
<?
  endif;

  if ($next_post):
?>
      <a href="<?= get_permalink( $next_post->ID ); ?>" id="next-post" class="post-link"><?= $next_post->post_title; ?> &rarr;</a>
<?
  endif;
?>
    </div>

<?
  endwhile; wp_reset_postdata();
?>

  </article>

</section>