<?php 
$n1 = '';
$b = TRUE;
foreach ($rows as $id => $row) {
  // class="current"
  if ((strpos($row, url('portfolio/'.arg(1))) !== FALSE) and arg(1)) {
    $s = ' class="current"';
    $b = FALSE;
  } 
  else {
    $s = '';
  }
  $n1 .= '<li'.$s.'>'.$row.'</li>';
}
  if ($b) {
    $s = ' class="current"';
	$viewing= (arg(1)) ? '' : 'ing';
  } 
  else {
    $s = '';
	$viewing='';
  }

$n1 = '<li'.$s.'><a href="'.url('portfolio').'">'.t('View'.$viewing.' All').'</a></li>' . $n1;
// $n1 = '<li'.$s.'><a href="'.url('portfolio').'">'.t('Viewing All').'</a></li>' . $n1;
print ($n1 ? '<div class="wr"><div class="grid_1 alpha omega"><span class="sort">'.t('').'</span></div><div class="grid_11 alpha"><ul id="filter">'.$n1.'</ul></div><div class="clear"></div><div class="hr-pattern"></div></div>' : '');
?>
