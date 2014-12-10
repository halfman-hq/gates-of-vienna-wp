<div class="contents">
<?
$content = get_field('content');
if ($content): 
  while (has_sub_field('content')):
    $layout = get_row_layout();
    switch ($layout):

    case 'text':
      $text = get_sub_field('text');
?>
    <div class="content text"><?= $text; ?></div>
<?
      break;

    case 'images':
      $gallery = get_sub_field('gallery');
      if ($gallery): foreach ($gallery as $img_data):
        $img = wp_get_attachment_image($img_data['id'], 'large', 0, array ( 'class' => 'img' ) );
?>
    <div class="content image"><?= $img; ?></div>
<?
      
      endforeach; endif;

      break;

      case 'embed':
?>
    <div class="content embed video-embed"><?= get_sub_field('embed'); ?></div>
<?
      break;

    endswitch;
  
  endwhile;

endif;
?>
</div>