<li>
<span class="profilePic left" ><?php print $fields['field_image']->content; ?></span>
<p>
<?php if (isset($fields['field_uid']->content) and is_numeric($fields['field_uid']->content)) { ?><a href="<?php print url('user/'.$fields['field_uid']->content) ?>"><?php print $fields['title']->content; ?></a><?php } else { print $fields['title']->content; } ?> <?php print $fields['body']->content; ?>
<?php if (isset($fields['field_twitter']->content) and $fields['field_twitter']->content) { ?><span class="social-link"><a href="http://twitter.com/<?php print $fields['field_twitter']->content; ?>"><?php print t('Follow on Twitter &rarr;'); ?></a></span><?php } ?>
</p>
</li>