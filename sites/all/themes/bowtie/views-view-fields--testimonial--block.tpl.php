<li>
  <blockquote><?php print $fields['body']->content; ?></blockquote>
  <cite><?php print $fields['title']->content; ?><?php if (isset($fields['field_career']->content)) print ' - '.$fields['field_career']->content; ?></cite>
</li>