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
    <button id="carousel-prev" class="carousel-arrow-btn" data-dir="prev"><span class="icon-left-open"></span></button>
    <button id="carousel-next" class="carousel-arrow-btn" data-dir="next"><span class="icon-right-open"></span></button>
  </div>
</section>