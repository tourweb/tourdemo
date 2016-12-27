<?php include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';
class easyweb_webnus_subscribe_widget extends WP_Widget{
	function __construct(){
		$params = array('description'=> 'Email Subscribe','name'=> 'Webnus - Subscribe');
		parent::__construct('easyweb_webnus_subscribe_widget', '', $params);
	}
	public function form($instance){
		extract($instance);
		$defaults = array('type' => 'FeedBurner',);
		$instance = wp_parse_args((array) $instance, $defaults);?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ) ?>"><?php esc_html_e('Title:','easyweb') ?></label><input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ) ?>" name="<?php echo esc_attr( $this->get_field_name('title') ) ?>" value="<?php if( isset($title) )  echo esc_attr($title); ?>"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('type') ); ?>"><?php esc_html_e('Subscribe Service:','easyweb') ?></label>
		<select id="<?php echo esc_attr( $this->get_field_id('type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('type') ); ?>" class="widefat" style="width:100%;">
		<option <?php if('FeedBurner' == $instance['type']) echo 'selected="selected"'; ?>>FeedBurner</option>
		<option <?php if('MailChimp' == $instance['type']) echo 'selected="selected"'; ?>>MailChimp</option>
		</select></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('id') ) ?>"><?php esc_html_e('Feedburner ID:','easyweb') ?></label>	<input type="text"	class="widefat"	id="<?php echo esc_attr( $this->get_field_id('id') ) ?>" name="<?php echo esc_attr( $this->get_field_name('id') ) ?>" value="<?php if( isset($id) )  echo esc_attr($id); ?>"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('url') ) ?>"><?php esc_html_e('Mailchimp form action URL:','easyweb') ?></label>	<input type="text"	class="widefat"	id="<?php echo esc_attr( $this->get_field_id('url') ) ?>" name="<?php echo esc_attr( $this->get_field_name('url') ) ?>" value="<?php if( isset($url) )  echo esc_attr($url); ?>"/></p>	
		<p><label for="<?php echo esc_attr( $this->get_field_id('text') ) ?>"><?php esc_html_e('Custom text:','easyweb') ?></label><textarea class="widefat"	id="<?php echo esc_attr( $this->get_field_id('text') ) ?>" name="<?php echo esc_attr( $this->get_field_name('text') ) ?>"
		><?php if( isset($text) )  echo esc_attr($text); ?></textarea></p>
		<?php 
	}
	public function widget($args, $instance){
		extract($args);
		extract($instance);
		echo $before_widget;
		if(!empty($title)) echo $before_title.esc_html($title).$after_title;
		$feedburner_id = esc_html($id);
		$mailchimp_url = esc_url($url);
		$subscribe_text = esc_html($text);
		if($type =='FeedBurner'){ 
			$email_name='email';
			echo '<form class="widget-subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open(\'http://feedburner.google.com/fb/a/mailverify?uri='.$feedburner_id.'\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true"><input type="hidden" value="'.$feedburner_id.'" name="uri"/><input type="hidden" name="loc" value="en_US"/>';
		}else{ 
			$email_name='MERGE0';
			echo '<form class="widget-subscribe-form" action="'.$mailchimp_url.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">';
		}
		echo '<p>'.$subscribe_text.'</p><input class="widget-subscribe-email" type="text" name="'.$email_name.'"/><button class="widget-subscribe-submit" type="submit">'.esc_html__('SUBSCRIBE ','easyweb').'</button></form>';
		echo $after_widget;
	} 
}
add_action('widgets_init', 'register_easyweb_webnus_subscribe'); 
function register_easyweb_webnus_subscribe(){
	register_widget('easyweb_webnus_subscribe_widget');
}