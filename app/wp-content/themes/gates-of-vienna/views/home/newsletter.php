<section id="newsletter">
  <div class="container">
    <form id="newsletter-form" action="<?= get_bloginfo('template_directory'); ?>/inc/newsletter.php" method="POST">
      <label class="label">Get notified when it goes down</label>
      <input type="email" id="email" name="email" placeholder="yourname@email.com" />
      <button type="submit" id="newsletter-submit">Sign up</button>
    </form>
  </div>
</section>