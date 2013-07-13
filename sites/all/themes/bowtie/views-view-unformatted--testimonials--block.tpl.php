<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print ($n1 ? '<div style="margin-top:30px;">'.$n1.'</div>' : '');
?>