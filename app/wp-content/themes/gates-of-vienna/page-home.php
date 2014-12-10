<?
/* Template Name: Home */
get_header();
?>

<?
	$the_query = new WP_Query('pagename=home');
	while ($the_query->have_posts()) : $the_query->the_post();
?>

  <section id="pitch">
    <div class="container">
      <?= get_field('pitch'); ?>
    </div>
  </section>

  <section id="intro">
    <div class="container">
      <?= get_field('intro'); ?>
    </div>
  </section>

  <section id="carousel">
    <div class="container">
      <div class="carousel-wrapper owl-carousel">
<?
  $carousel = get_field('carousel');
  if ($carousel): foreach ($carousel as $img_data):
    $img = wp_get_attachment_image_src($img_data['ID'], 'large', 0, array( 'class' => 'img' ));
?>
      <div class="item" style="background-image: url(<?= $img[0]; ?>);"></div>
<?
  endforeach; endif;
?>
      </div>
    </div>
  </section>

  <section id="newsletter">
    <div class="container">
      <form id="newsletter-form" action="<?= get_bloginfo('template_directory'); ?>/inc/newsletter.php" method="POST">
        <label class="label">Get notified when it goes down</label>
        <input type="email" id="email" name="email" placeholder="yourname@email.com" />
        <button type="submit" id="newsletter-submit">Sign up</button>
      </form>
    </div>
  </section>

  <section id="blog-posts">
    <div class="container">
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
    </div>
  </section>

  <section id="about-the-project">
    <div class="container">
      <?= get_field('about_the_project'); ?>
    </div>
  </section>

  <section id="about-the-author">
    <div class="container">
      <?= get_field('about_the_author'); ?>
    </div>
  </section>
    
<?
	endwhile; wp_reset_postdata();
?>
