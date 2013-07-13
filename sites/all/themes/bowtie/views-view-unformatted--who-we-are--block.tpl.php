<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print ($n1 ? '<ul class="who-we-are left" >'.$n1.'</ul>' : '');
?>