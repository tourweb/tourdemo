<?php
function easyweb_webnus_countdown( $attributes, $content = null ) {
	extract(shortcode_atts(array(
	"type"      => 'modern',
	'datetime' => '',
	'done' => '',	
	'content_color' => '',	
	), $attributes));
	if ( is_plugin_active('the-events-calendar/the-events-calendar.php') && $type=='events' ) {
		$events = tribe_get_events(array('posts_per_page'=>1, 'eventDisplay'=>'list' ) );
		foreach($events as $event){
			//date_default_timezone_set(get_option('timezone_string'));
			$data_until = strtotime(tribe_get_start_date($event,false,'d.m.Y H:i'));
			$data_future = tribe_get_start_date($event,false,'Y/m/d H:i');
		}

	}else{
		$data_until  = esc_attr(strtotime($datetime));
		$data_future = esc_attr($datetime);
		
	}
	$data_done	 = esc_attr( $done );
	if ($type == 'flip'){	
		$out = '<div class="countdown-clock" data-future="'.$data_future.'" data-done="'. $data_done .'"></div>';
	}else{
		if($type=="minimal"){
			$label = array(
				'day' => esc_html__('DAYS', 'easyweb'), 
				'hours' => esc_html__('HRS', 'easyweb'), 
				'minutes' => esc_html__('MIN', 'easyweb'), 
				'seconds' => esc_html__('SEC', 'easyweb')
			);
		} else{
			$label = array(
				'day' => esc_html__('Days', 'easyweb'), 
				'hours' => esc_html__('Hours', 'easyweb'), 
				'minutes' => esc_html__('Minutes', 'easyweb'), 
				'seconds' => esc_html__('Seconds', 'easyweb')
			);
		}
		$color_style =($content_color)?'style="color: '.$content_color.'"':'';
		$out  = '<div '.$color_style.' class="countdown-w ctd-' . $type . '" data-until="'. $data_until .'" data-done="'. $data_done .'" data-respond>';
		$out .= '<div class="days-w block-w"><i class="icon-w li_calendar"></i><div class="count-w"></div><div class="label-w">'. $label['day'] .'</div></div>';
		$out .= '<div class="hours-w block-w"><i class="icon-w fa-clock-o"></i><div class="count-w"></div><div class="label-w">'. $label['hours'] .'</div></div>';
		$out .= '<div class="minutes-w block-w"><i class="icon-w li_clock"></i><div class="count-w"></div><div class="label-w">'. $label['minutes'] .'</div></div>';
		$out .= '<div class="seconds-w block-w"><i class="icon-w fa-hourglass-o"></i><div class="count-w"></div><div class="label-w">'. $label['seconds'] .'</div></div>';
		$out .= '</div>';
	}
	return $out;
}
add_shortcode('countdown', 'easyweb_webnus_countdown');