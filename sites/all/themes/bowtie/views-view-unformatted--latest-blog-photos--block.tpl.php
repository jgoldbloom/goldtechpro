<?php 
$n1 = '';
$last = '1';
foreach ($rows as $id => $row) {
  if ($last) $last = ''; else $last = ' last';
  $n1 .= ' <li class="image-fade'.$last.'">'.$row.'</li> ';
}
print ($n1 ? '<div id="latest-blog-photos"><ul>'.$n1.'</ul></div>' : '');
?>