
  <section id="header">

    <div class="container">

      <div id="main-nav" class="clearfix">
<?
      $locations = get_nav_menu_locations();
      $main_nav = wp_get_nav_menu_object($locations['main']);
      $main_nav_items = wp_get_nav_menu_items($main_nav->term_id);
      $currPage = explode('/',$_SERVER["REQUEST_URI"]);
      if ($main_nav_items): foreach ($main_nav_items as $item):
        $itemurl = relative_path($item->url);
        $itemuri = explode('/',$itemurl);
        $i = ($itemuri[2] !== '') ? 2 : 1;
        if ($itemuri[$i] == $currPage[$i]):
          $item->classes[] = 'current';
        endif;
        $classes = (!empty($item->classes)) ? ' '.implode(' ', $item->classes) : '';
?>
          <a href="<?= $itemurl; ?>" class="menu-link<?= $classes; ?>"><?= $item->title; ?></a>
<?
      endforeach; endif;
?>

      </div>

      <a href="/" id="logo" class="ir"><? bloginfo('name'); ?></a>

      <button id="menu-btn" class="ir"></button>

    </div>
      
  </section>