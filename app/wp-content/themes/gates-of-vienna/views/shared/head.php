<head>
  
  <meta charset="utf-8" />
<?
    global $wp_query;
    if (is_page('home')):
      $title = '';
    elseif (is_singular()):
      $title = get_the_title().' | ';
    elseif (is_archive()):
      $term = $wp_query->get_queried_object();
      $title = $term->name.' | ';
    else:
      $title = '';
    endif;
?>
  <title><?= $title; ?><? bloginfo('name'); ?></title>
  
  <meta name="description" content="<?= bloginfo('description'); ?>">
  <meta name="author" content="<?= bloginfo('name'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <? wp_enqueue_style('site'); ?>

  <? wp_head(); ?>

  <script src="<? bloginfo('template_directory'); ?>/js/lib/modernizr-2.7.1.min.js"></script>

  <script type="text/javascript">
    (function() {
        var path = '//easy.myfonts.net/v2/js?sid=265134(font-family=Breve+Slab+Title+Book)&sid=265135(font-family=Breve+Slab+Title+Bold)&sid=265138(font-family=Breve+Slab+Title+Extra+Light)&sid=265142(font-family=Breve+Slab+Title+Medium)&key=cSdmIwAXdz',
            protocol = ('https:' == document.location.protocol ? 'https:' : 'http:'),
            trial = document.createElement('script');
        trial.type = 'text/javascript';
        trial.async = true;
        trial.src = protocol + path;
        var head = document.getElementsByTagName("head")[0];
        head.appendChild(trial);
    })();
</script>
  
</head>