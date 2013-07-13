<?php 
if (!$page) { ?>
<div id="node-<?php print $node->nid; ?>" class="blog-page-post <?php print $classes; ?>" <?php print $attributes; ?>>
  <h3 class="blog-page-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>			
    <div class="blog-page-meta grid_2 alpha">
      <ul>
        <li class="calendar"><?php print format_date($node->created, 'custom', 'F dS, Y'); ?></li>
        <li class="comment-bubble"><?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?><a class="comments_bubble" href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a><?php } ?></li>
        <!--li class="cat-icon"><a class="category" href="#">Automobiles</a></li-->
      </ul>				
			<div class="clear"></div>
      <?php print render($content['field_tags']); ?>
      <div class="clear"></div>				
    </div> <!-- end .meta -->
    <div class="featured-image grid_5 omega" >
      <?php print render($content['field_image']); ?>
    </div>
    <div class="clear"></div>
    <div class="blog-excerpt" >
      <?php hide($content['comments']); hide($content['links']); print render($content); ?>
      <a class="read-more" href="<?php print $node_url; ?>"><?php print t('read more &rarr;'); ?></a>
    </div>
		<div class="hr-pattern"></div>
</div><div class="clear"></div>
<?php } else { 
$acc = user_load($node->uid);
$us = user_view($acc);
?>
<?php if ($display_submitted) { ?>
<div class="meta">
  <ul>
    <li><?php print t('Published') . ' ' . format_date($node->created, 'custom', 'F dS, Y'); ?></li>
    <li> &nbsp; <?php print t('by').': '.$name; ?></li>
    <!--li> &nbsp; in <a class="category" href="#">Automobiles</a></li-->
    <li> &nbsp; <?php print t('with'); ?> <?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?><a class="comments_bubble" href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a><?php } ?></li>
  </ul>
</div>
<?php } 
bowtie_set_sharebar(render($content['my_additional_field']));    
?>
<div class="featured-image image-fade" >
    <?php print render($content['field_image']); ?>
</div>
<div id="content">
<?php hide($content['comments']); hide($content['links']); print render($content);?>
</div>
			
			<div id="post-author">
				<div class="hr-pattern"></div>
					<?php print theme('user_picture', array('account' => $acc)); ?>
					<div id="author-details">
						<p id="author-title"><?php print t('Written by').' '.$name; ?></p>
						<p><?php print render($us['field_userabout']); ?></p>
					</div><!-- end #author-details -->
				<div class="clear"></div>
				<div class="hr-pattern"></div>
			</div><!-- end #post-author -->

<?php print render($content['comments']); ?>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($us, 1)) .'</pre>'; ?>