<?php
function easyweb_webnus_ministry ($atts, $content = null) {
	extract(shortcode_atts(array(
	'type'  => '1',
	'ministry_name'  => '',
	'ministry_img'=>'',
	'color'=>'#0099cb',
	'text'=>'',
	'director_name'=>'',
	'director_img'=>'',
	'link'=>'',
	), $atts));
	
	if(is_numeric($ministry_img)) $ministry_img = wp_get_attachment_url( $ministry_img );
	if(is_numeric($director_img)) $director_img = wp_get_attachment_url( $director_img );
	if($type==1){
		$out = '<article class="ministry-box" style="background-color:'.$color.'">
			<div class="ministry-bar" style="color:'.$color.'"><a href="'.$link.'"><h4>'.$ministry_name.'</h4></a></div>
			<div class="ministry-content" style="background-color:'.$color.'">
				<p>'.$text.'</p>
				<figure class="ministry-director">
					<img class="director-img" src="'. $director_img .'" alt="'.$director_name.'">
					<figcaption><h5>'.$director_name.'</h5><p>'.$ministry_name.' '.esc_html__('director','easyweb_webnus_framework').'</p></figcaption>
				</figure>
			</div>	
			<div class="ministry-img"><img src="'. $ministry_img .'" alt="'.$ministry_name.'"></div>			
		</article>';
	}elseif($type==2){
		$out = '<article class="ministry-box2"><a href="'.esc_url($link).'"><img src="'. $ministry_img .'" alt="'.$ministry_name.'"><h4>'.$ministry_name.'</h4><p>'.$text.'</p></a></article>';	
	}
return $out;
}
add_shortcode('ministry','easyweb_webnus_ministry');
?>