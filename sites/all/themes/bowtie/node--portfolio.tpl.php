<?php 

if (!$page) { 
    switch (theme_get_setting('tm_portfolio')) {
		  case 0:
			  $content['field_image'][0]['#image_style'] = 'portfolio_teaser_1';
        $title = bowtie_truncate_utf8($title, 27, FALSE, TRUE);
			  break;
      case 1:
			  $content['field_image'][0]['#image_style'] = 'portfolio_teaser_1';
        $title = bowtie_truncate_utf8($title, 35, FALSE, TRUE);
			  break;
		  case 2:
			  $content['field_image'][0]['#image_style'] = 'portfolio_teaser_2';
        $title = bowtie_truncate_utf8($title, 30, FALSE, TRUE);
			  break;
		  default:
			  $content['field_image'][0]['#image_style'] = 'portfolio_teaser_1';
	  }
?>
<?php if (theme_get_setting('tm_portfolio') == 0) { ?>
  <div class="portfolio_one_column grid_12 alpha">
    <div id="node-<?php print $node->nid; ?>" class="blog-page-post <?php print $classes; ?>" <?php print $attributes; ?>>
      <div class="featured-image image-fade grid_6 alpha" >
        <a class="portfolio" href="<?php print file_create_url($content['field_image'][0]['#item']['uri']); ?>"><?php print render($content['field_image']); ?></a>
      </div>
      <div class="portfolio-page-meta grid_3">
        <h4 class="portfolio-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
        <hr />
        <div class="portfolio-excerpt" >
          <p><?php hide($content['comments']); hide($content['links']); hide($content['field_category']); hide($content['field_customer']); print strip_tags(render($content)); ?> <a class="read-more" href="<?php print $node_url; ?>">&nbsp; <?php print t('read more &rarr;'); ?></a> </p>
        </div>
      </div>
      <div class="grid_3 omega">
        <h4><?php print t('More Details'); ?>:</h4>
        <hr />
        <div class="client"><?php print render($content['field_customer']); ?></div>
        <div class="calendar"><?php print format_date($node->created, 'custom', 'F dS, Y'); ?></div>
        <div class="services"><?php print render($content['field_category']); ?></div>
      </div>
      <div class="clear"></div>
			<div class="hr-pattern" style="margin:20px 0;"></div>
    </div>
  </div><div class="clear"></div>
<?php } elseif (theme_get_setting('tm_portfolio') == 1) { ?>
  <div class="integration cms portfolio_one_column grid_6 alpha">
    <div id="node-<?php print $node->nid; ?>" class="blog-page-post <?php print $classes; ?>" <?php print $attributes; ?>>
      <div class="featured-image image-fade" >
        <a class="portfolio" href="<?php print file_create_url($content['field_image'][0]['#item']['uri']); ?>"><?php print render($content['field_image']); ?></a>
      </div>
      <div class="portfolio-details">
        <div class="portfolio-page-meta grid_4 alpha">
          <h4 class="portfolio-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
					<hr />
					<div class="portfolio-excerpt" >
            <p><?php hide($content['comments']); hide($content['links']); hide($content['field_category']); hide($content['field_customer']); print strip_tags(render($content)); ?> <a class="read-more" href="<?php print $node_url; ?>">&nbsp; <?php print t('read more &rarr;'); ?></a></p>
          </div>
        </div>
				<div class="grid_2 omega">
					<h4><?php print t('More Details'); ?>:</h4>
					<hr />
          <div class="client"><?php print render($content['field_customer']); ?></div>
          <div class="calendar"><?php print format_date($node->created, 'custom', 'F dS, Y'); ?></div>
          <div class="services"><?php print render($content['field_category']); ?></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="hr-pattern" style="margin:20px 0;"></div>
    </div>
  </div>
<?php } else { ?>
  <div class="cms integration portfolio_three_columns grid_4 alpha">
    <div id="node-<?php print $node->nid; ?>" class="blog-page-post <?php print $classes; ?>" <?php print $attributes; ?>>
      <div class="featured-image image-fade" >
        <a class="portfolio" href="<?php print file_create_url($content['field_image'][0]['#item']['uri']); ?>"><?php print render($content['field_image']); ?></a>
      </div>
      <div class="portfolio-details">
        <div class="portfolio-page-meta grid_4 alpha ">
          <h4 class="portfolio-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
          <hr />
          <div class="portfolio-excerpt" >
            <p><?php hide($content['comments']); hide($content['links']); hide($content['field_category']); hide($content['field_customer']); //print strip_tags(render($content)); ?> <a class="read-more" style="font-size: 120%; float:right; margin-bottom: 12px" href="<?php print $node_url; ?>">&nbsp; <?php print t('read more &rarr;'); ?></a></p>
          </div>
        </div>
        <div class="grid_4 more-info alpha ">
          <div class="client" style="margin-right:15px;"><?php print render($content['field_customer']); ?></div>
          <div class="services"><?php print render($content['field_category']); ?></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="hr-pattern" style="margin:20px 0;"></div>
    </div>
  </div>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($content['field_image'][0], 1)) .'</pre>'; ?>
<?php } else { ?>
<?php //print '<pre>'. check_plain(print_r($content['field_image'], 1)) .'</pre>'; 
//$content['field_image'][0]['#image_style'] = 'blog_teaser';
bowtie_set_sharebar(render($content['my_additional_field']));
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
<?php } ?>
<div class="featured-image image-fade" >
    <?php print render($content['field_image']); ?>
</div>
<div id="content">
<?php hide($content['comments']); hide($content['links']); print render($content);?>
</div>
<?php print render($content['comments']); ?>
<?php } ?>
<?php // print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>
