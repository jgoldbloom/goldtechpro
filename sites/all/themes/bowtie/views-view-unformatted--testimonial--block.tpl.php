<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print $n1 ? '<ul id="quotes">' . $n1 . '</ul>' : '';
?>