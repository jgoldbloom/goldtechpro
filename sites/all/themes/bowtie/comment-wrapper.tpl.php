<!-- Comments -->
<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<?php //if ($content['#node']->type == 'video') { ?>
<?php //} else { ?>
<div id="comments">
  <h3 id="comments-title"><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?> on "<?php print $content['#node']->title; ?>"</h3>
  <div class="commentlist"> 
    <?php print render($content['comments']); ?>
  </div>
  <?php //print '<pre>'. check_plain(print_r($content['#node'], 1)) .'</pre>' ?>
  <div class="hr-pattern" style="margin-bottom:20px;"></div>
  <div id="respond"> 
    <h3><?php print t('Here`s your chance to leave a comment!'); ?></h3> 
    <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
  </div>
</div>
<?php //} ?>
<?php } ?>