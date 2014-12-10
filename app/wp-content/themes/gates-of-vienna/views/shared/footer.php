  <section id="footer">
    <div class="container">
      <?= get_field('footer_text', 'options'); ?>
    </div>
  </section>

  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<? bloginfo('template_directory'); ?>/js/lib/jquery-1.10.1.min.js">\x3C/script>')</script>

  <? wp_enqueue_script('main'); ?>

<?
$google_analytics = get_field('google_analytics', 'options');
if ($ga):
?>
  <?= $ga; ?>
<?
endif;
?>
