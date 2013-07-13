<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print ($n1 ? '<div id="tags-sidebar"><p class="tags">'.$n1.'</p></div>' : '');
?>