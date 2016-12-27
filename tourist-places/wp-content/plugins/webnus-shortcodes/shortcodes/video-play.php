<?php
function easyweb_webnus_video_play ($atts, $content = null) {
	extract(shortcode_atts(array(
	'link'      	=>	'#',
	'link_class'    =>	'',
	'size'			=>	'',
	'color'			=>	''

	), $atts));

	$style = 'style="';
	if(!empty($size))  $style .= ' font-size:' . $size. ';';
	if(!empty($color)) $style .= ' color:' . $color. ';';
	$style .= '"';			
	 $out = '<div class="video-play-btn-wrap"><a href="'. esc_url($link) .'" class="fancybox-media videolb video-play-btn '. $link_class .'"><i class="fa-play" '.$style.'></i></a></div>';
	return $out;
}
add_shortcode('videoplay','easyweb_webnus_video_play');