<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= $row;
}
print $n1 ? '<div id="nivo-slider-wrapper"><div id="nivo-slider" class="nivoSlider clearfix">' . $n1 . '</div></div>' : '';
?>