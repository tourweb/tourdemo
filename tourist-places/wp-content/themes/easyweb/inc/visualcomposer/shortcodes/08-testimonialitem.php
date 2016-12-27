<?php

class WPBakeryShortCode_testimonial_item extends WPBakeryShortCode {

    /*
     * Thi methods returns HTML code for frontend representation of your shortcode.
     * You can use your own html markup.
     *
     * @param $atts - shortcode attributes
     * @param @content - shortcode content
     *
     * @access protected
     *
     * @return string
     */

    protected function content($atts, $content = null) {

		extract(shortcode_atts(array(
	 	
		'img'=>'',
		'name'=>'',
		'subtitle' => '',
		'testimonial_content' => '',
		'first_social'=>'twitter',
		'first_url'=>'',
		'second_social'=>'facebook',
		'second_url'=>'',
		'third_social'=>'google-plus',
		'third_url'=>'',
		'fourth_social'=>'linkedin',
		'fourth_url'=>''
		), $atts));
		

		if(is_numeric($img)){ $img = wp_get_attachment_url( $img ); }
			
		$out = "<li>";
		$out .= "<div class=\"testimonial\">";		  
		$out .= "<div class=\"testimonial-content\">";		 
		$out .= "<h4><q>".$testimonial_content."</q></h4>";			
		$out .= "<div class=\"testimonial-arrow\"></div>";			  
		$out .= "</div>";			  
		$out .= "<div class=\"testimonial-brand\">";
		if(!empty($img)) $out .= "<img src=\"".$img."\" alt=\"".$name."\">";		
		$out .= "<h5><strong>".$name."</strong><br>";			
		$out .= "<em>".$subtitle."</em></h5>";			  
		
		if ( $first_url || $second_url ||  $third_url || $fourth_url ) :
		$out .= "<div class=\"social-testimonial\"><ul>";
			if(!empty($first_url))
				$out .= '<li class="first-social"><a href="'. esc_url($first_url) .'"><i class="fa-'. $first_social .'"></i></a></li>';
			if(!empty($second_url))
				$out .= '<li class="second-social"><a href="'. esc_url($second_url) .'"><i class="fa-'. $second_social .'"></i></a></li>';
			if(!empty($third_url))
				$out .= '<li class="third-social"><a href="'. esc_url($third_url) .'"><i class="fa-'. $third_social .'"></i></a></li>';
			if(!empty($fourth_url))
				$out .= '<li class="fourth-social"><a href="'. esc_url($fourth_url) .'"><i class="fa-'. $fourth_social .'"></i></a></li>';
		$out .= "</ul></div>";
		endif;

		$out .= "</div>";
		$out .= "</div>";
		$out .= "</li>";	
		
	return $out;
}

}
vc_map( array(
        "name" =>"Testimonial Item",
        "base" => "testimonial_item",
		"description" => "Testimonials slider",
        "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "icon" => "webnus_testimonialitem",
        "content_element" => true,
   		"as_child" => array('only' => 'testimonial_slider'), // Use only|except 
        'params'=>array(
							
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Name', 'easyweb' ),
							'param_name' => 'name',
							'value'=>'Name',
							'description' => esc_html__( 'Enter the Testimonial Name', 'easyweb')
					),
					array(
							'type' => 'attach_image',
							'heading' => esc_html__( 'Image', 'easyweb' ),
							'param_name' => 'img',
							'value'=>'http://',
							'description' => esc_html__( 'Testimonial Image', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Subtitle', 'easyweb' ),
							'param_name' => 'subtitle',
							'value'=>'',
							'description' => esc_html__( 'Testimonial Subtitle', 'easyweb')
					),
					array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content', 'easyweb' ),
							'param_name' => 'testimonial_content',
							'value' => '',
							'description' => esc_html__( 'Enter the Testimonial content text', 'easyweb')
					),

					array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'First Social Name', 'easyweb' ),
							'param_name' => 'first_social',
							 'value' => array(
								"Twitter"=>'twitter',
								"Facebook"=>'facebook',
								"Google Plus"=>'google-plus',
								"Vimeo"=>'vimeo',
								"Dribbble"=>'dribbble',
								"Youtube"=>'youtube',
								"Youtube"=>'youtube',
								"Pinterest"=>'pinterest',
								"LinkedIn"=>'linkedin',
								"Instagram"=>'instagram',
									),
								'std' => 'twitter',
							'description' => esc_html__( 'Select Social Name', 'easyweb'),
					),

					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'First Social URL', 'easyweb' ),
							'param_name' => 'first_url',
							'value'=>'',
							'description' => esc_html__( 'First social URL', 'easyweb'),
					),

					array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Second Social Name', 'easyweb' ),
							'param_name' => 'second_social',
							 'value' => array(
								"Twitter"=>'twitter',
								"Facebook"=>'facebook',
								"Google Plus"=>'google-plus',
								"Vimeo"=>'vimeo',
								"Dribbble"=>'dribbble',
								"Youtube"=>'youtube',
								"Youtube"=>'youtube',
								"Pinterest"=>'pinterest',
								"LinkedIn"=>'linkedin',
								"Instagram"=>'instagram',
									),
								'std' => 'facebook',

							'description' => esc_html__( 'Select Social Name', 'easyweb'),
					),

					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Second Social URL', 'easyweb' ),
							'param_name' => 'second_url',
							'value'=>'',
							'description' => esc_html__( 'Second social URL', 'easyweb'),
					),


					array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Third Social Name', 'easyweb' ),
							'param_name' => 'third_social',
							 'value' => array(
								"Twitter"=>'twitter',
								"Facebook"=>'facebook',
								"Google Plus"=>'google-plus',
								"Vimeo"=>'vimeo',
								"Dribbble"=>'dribbble',
								"Youtube"=>'youtube',
								"Youtube"=>'youtube',
								"Pinterest"=>'pinterest',
								"LinkedIn"=>'linkedin',
								"Instagram"=>'instagram',
									),
								'std' => 'google-plus',
							'description' => esc_html__( 'Select Social Name', 'easyweb'),
					),

					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Third Social URL', 'easyweb' ),
							'param_name' => 'third_url',
							'value'=>'',
							'description' => esc_html__( 'Third social URL', 'easyweb'),
					),

					array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Fourth Social Name', 'easyweb' ),
							'param_name' => 'fourth_social',
							 'value' => array(
								"Twitter"=>'twitter',
								"Facebook"=>'facebook',
								"Google Plus"=>'google-plus',
								"Vimeo"=>'vimeo',
								"Dribbble"=>'dribbble',
								"Youtube"=>'youtube',
								"Youtube"=>'youtube',
								"Pinterest"=>'pinterest',
								"LinkedIn"=>'linkedin',
								"Instagram"=>'instagram',
								),
								'std' => 'linkedin',
							'description' => esc_html__( 'Select Social Name', 'easyweb'),
					),

					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Fourth Social URL', 'easyweb' ),
							'param_name' => 'fourth_url',
							'value'=>'',
							'description' => esc_html__( 'Fourth social URL', 'easyweb'),
					),

		),
		
        
    ) );