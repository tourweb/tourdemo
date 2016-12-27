<?php include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';
class easyweb_webnus_googleplus_widget extends WP_Widget{
	function __construct(){
		$params = array('description'=> 'Your recent posts from google+ will be displayed','name'=> 'Webnus - Google+');
		parent::__construct('easyweb_webnus_googleplus_widget', '', $params);
	}
	public function form($instance){
		extract($instance);
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:','easyweb') ?></label><input	type="text"	class="widefat"	id="<?php echo esc_attr( $this->get_field_id('title') ); ?>"	name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"	value="<?php if( isset($title) )  echo esc_attr($title); ?>"/></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('url') ); ?>"><?php esc_html_e('Page Address:','easyweb') ?></label><input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('url') ); ?>"	name="<?php echo esc_attr( $this->get_field_name('url') ); ?>" value="<?php if( isset($url) )  echo esc_attr($url); ?>" /></p>			
		<?php 
	}
	public function widget($args, $instance){
		extract($args);
		extract($instance);
		echo $before_widget;
		if(!empty($title)) echo $before_title.esc_html($title).$after_title; ?>
			<script src="https://apis.google.com/js/platform.js" async defer></script>
			<div class="g-page" data-width="302" data-href="<?php echo esc_url($url) ?>" data-layout="landscape" data-rel="publisher"></div
			<?php
			echo $after_widget;
	} 
}
add_action('widgets_init', 'register_easyweb_webnus_googleplus'); 
function register_easyweb_webnus_googleplus(){
	register_widget('easyweb_webnus_googleplus_widget');
}