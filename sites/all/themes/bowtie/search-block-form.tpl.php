<div id="site_search">
  <div id="search_bar" class="clearfix">
    <input type="text" value="" name="search_block_form" id="filter_keyword" />
  <?php print $search['hidden']; ?>
  <input type="submit" class="s_button_1 s_secondary_color_bgr s_text" name="op" id="searchsubmit" value="<?php print t('Search'); ?>" />
  <a class="s_advanced s_main_color" href="<?php print url('search/node'); ?>"><?php print t('Advanced Search'); ?></a>
  </div>
</div>


