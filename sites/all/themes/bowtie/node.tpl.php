<?php
bowtie_set_sharebar(render($content['my_additional_field']));
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>
  <?php if (isset($content['field_image'][0]['#item']['uri'])) {?>
  <div class="featured-image image-fade" >
    <a class="portfolio" href="<?php print file_create_url($content['field_image'][0]['#item']['uri']); ?>"><?php print render($content['field_image']); ?></a>
  </div>
  <br />
  <?php } ?>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php //if ($page)  bowtie_set_background($node->field_background_page[$node->language][0]['uri']); ?>
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>

</div>

