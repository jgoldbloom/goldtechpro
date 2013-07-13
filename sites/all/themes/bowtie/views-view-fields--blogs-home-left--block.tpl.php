<h3><?php print $fields['title']->content; ?></h3>
<p class="home-meta">Posted:  <?php print $fields['created']->content; ?> by <?php print $fields['name']->content; ?>   -  <?php print $fields['comment_count']->content; ?></p>
<div class="grid_2 alpha image-fade">
  <?php print $fields['field_image']->content; ?>
</div>
<div class="home-post-content grid_7 omega">
  <?php print $fields['body']->content; ?>
</div>