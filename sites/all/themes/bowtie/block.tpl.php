<?php 
$out = '';
if ($block->region == 'footer_copyright' or $block->region == 'slide_show' or $block->region == 'home_testimonial') { 
  $out .= $content;
} elseif ($block->region == 'footer_widgets') {
  $out .= '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>';
  $out .= '<div class="widget-block grid_4">';
  if ($block->subject) $out .= '<h2>'.$block->subject.'</h2>';
	$out .= ''.$content.'';
  $out .= '</div>';
  $out .= '</div>';
} elseif ($block->region == 'home_portfolio') {
  $out .= '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>';
  if ($block->subject) $out .= '<h2>'.$block->subject.'</h2>';
	$out .= ''.$content.'';
  $out .= '</div>';
} elseif ($block->region == 'home_services') {
  $out .= '<div id="'.$block_html_id.'" class="service grid_3 '.$classes.'"'.$attributes.'>';
  if ($block->subject) $out .= '<h4>'.$block->subject.'</h4>';
	$out .= ''.$content.'';
  $out .= '</div>';
} elseif ($block->region == 'sidebar_top' or $block->region == 'sidebar_bottom') { 
  $out .= '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>';
  $out .= '<div class="widget bottom">';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h3 class="widget-title">'.$block->subject.'</h3>';
  $out .= render($title_suffix);
	$out .= $content;
  $out .= '</div><div class="clear"></div>';
  $out .= '</div>';
} elseif ($block->region == 'sidebar_tab') {
  bowtie_set_tabs($block->bid, $block->subject, $content);
} else {
  $out .= '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>';
  $out .= '<div class="widget bottom">';
  $out .= render($title_prefix);
	if ($block->subject) $out .= '<h3 class="widget-title">'.$block->subject.'</h3>';
  $out .= render($title_suffix);
	$out .= $content;
  $out .= '</div><div class="clear"></div>';
  $out .= '</div>';
}
print $out;
//print '<pre>'. check_plain(print_r($block, 1)) .'</pre>';

?>