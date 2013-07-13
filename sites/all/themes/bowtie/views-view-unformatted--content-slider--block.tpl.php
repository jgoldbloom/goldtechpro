<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print $n1 ? '<div id="slider" ><div class="slides_container">' . $n1 . '</div></div>' : '';
?>