<?php


function easyweb_webnus_progressbar_shortcode($attributes, $content){

	extract(shortcode_atts(array(
	"type" => 'info',
	"percent" => '50',
	"text"=>''
	), $attributes));

$out = '<div class="progress progress-'.$type.' progress-striped" data-progress="'.$percent.'">';
$out .= '<div class="bar" style="width: 20%">'.$text.' - <small>'.$percent.'%</small></div>';
$out .= '</div>';

return $out;
}

add_shortcode("progress", "easyweb_webnus_progressbar_shortcode");
?>