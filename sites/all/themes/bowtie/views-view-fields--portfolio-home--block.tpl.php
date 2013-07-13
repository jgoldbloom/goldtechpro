<li class="portfolio_three_columns grid_3">
  <div class="featured-image mosaic-block fade">
    <a href="<?php print $fields['path']->content; ?>" class="mosaic-overlay">
      <div class="details">
        <h4><?php print $fields['field_customer']->content; ?></h4>
        <p><?php print $fields['body']->content; ?></p>
      </div>
    </a>
    <div class="mosaic-backdrop"><?php print $fields['field_image']->content; ?></div>
  </div>
  <h4><?php print $fields['title']->content; ?></h4>
  <p><?php print $fields['field_category']->content; ?></p>
</li>