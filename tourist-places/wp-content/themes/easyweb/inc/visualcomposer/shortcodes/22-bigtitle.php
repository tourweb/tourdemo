<?php

vc_map( array(
        'name' =>'Big Title',
        'base' => 'big_title',
		"description" => "Big title",
        "icon" => "webnus_big_title",
        "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "params" => array(
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Heading", 'easyweb' ),
							"param_name" => "heading",
							"value" => array(
								"h1"=>"1",
								"h2"=>"2",
								"h3"=>"3",
								"h4"=>"4",
								"h5"=>"5",
								"h6"=>"6",			
						),
						'std' => '2',
						"description" => esc_html__( "Just for SEO", 'easyweb')
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__( "Title", 'easyweb' ),
							"param_name" => "bigtitle_content",
							"value" => array('Title'),
							"description" => esc_html__( "Enter the title", 'easyweb')
						),
						array(
						'heading' => esc_html__('Align Center', 'easyweb') ,
						'description' => wp_kses( __('Align center content.<br/><br/>', 'easyweb'), array( 'br' => array() ) ),
						'param_name' => 'aligncenter',
						'value' => array( esc_html__( 'Yes', 'easyweb' ) => 'enable'),
						'type' => 'checkbox',
						'std' => '',
					) ,
						
           
        ),
		
        
    ) );


?>