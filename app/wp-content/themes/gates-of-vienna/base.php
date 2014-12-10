<!doctype html>
<html lang="en" class="no-js">
<? get_template_part('views/shared/head'); ?>

<?
  $bg = get_field('background_image', 'options');
  if ($bg):
    $bg_img = wp_get_attachment_image_src($bg, 'large', 0);
    $bg_style = ' style="background-image: url('.$bg_img[0].');"';
  else:
    $bg_style = '';
  endif;
?>

<body data-theme="<? bloginfo('template_directory'); ?>" data-siteurl="<? bloginfo('siteurl'); ?>"<?= $bg_style; ?>>

  <? do_action('get_header'); ?>
  <? get_template_part('header'); ?>

  <? include goww_template_path(); ?>

  <? do_action('get_footer'); ?>
  <? get_template_part('footer'); ?>
  <? wp_footer(); ?>
  
</body>
</html>