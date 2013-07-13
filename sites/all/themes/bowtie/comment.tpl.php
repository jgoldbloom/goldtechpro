<div class="comment">
<div class="comment-body">
  <div class="comment-author vcard"> 
    <?php print $picture ?>
  </div>
  <div class="name">
    <?php print theme('username', array('account' => $content['comment_body']['#object'])) ?> <?php print $created; ?>
  <div class="reply"> 
    <?php print render($content['links']) ?>		
  </div>
  </div>
  <?php hide($content['links']); print render($content) ?>
  <?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>' ?>
</div>
</div>