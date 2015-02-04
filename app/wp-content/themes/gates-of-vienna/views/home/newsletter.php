<section id="newsletter">
  <div class="container">
    <h3 class="title">Newsletter</h3>
    <form id="newsletter-form" action="<?= get_bloginfo('template_directory'); ?>/inc/newsletter.php" method="POST">
      <input type="email" id="email" name="email" placeholder="yourname@email.com" />
      <button type="submit" id="newsletter-submit">Sign up</button>
    </form>
  </div>
</section>