<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print ($n1 ? '<ul id="portfolio">'.$n1.'</ul>' : '');
?>
