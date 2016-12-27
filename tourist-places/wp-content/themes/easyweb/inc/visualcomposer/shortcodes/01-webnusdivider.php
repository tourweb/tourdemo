<?php

vc_map( array(
    "name" =>"Webnus Divider",
    "base" => "webnus-divider",
	"description" => "separator with title and icon",
	"icon" => "webnus_divider",
    "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
    "params" => array(
		   array(
				"type" => "dropdown",
				"heading" => esc_html__( "Type", 'easyweb' ),
				"param_name" => "type",
				"value" => array(
					"Type 1"=>"1", // Center + Icon
					"Type 2"=>"2", // Center + Icon
					"Type 3"=>"3", // Left
					"Type 4"=>"4", // Left
					"Type 5"=>"5", // Center + Icon
					"Type 6"=>"6", // Left + Icon + Desc
					"Type 7"=>"7", // Left
					"Type 8"=>"8", // Center + Icon + Desc
					"Type 9"=>"9", // Center
			),
			"description" => esc_html__( "Title Type", 'easyweb')
			),			
						
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title Part 1', 'easyweb' ),
				'param_name' => 'lspan',
				'value'=>'',
				'description' => esc_html__( 'Enter the first span text ', 'easyweb')
			),
			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title Part 2', 'easyweb' ),
				'param_name' => 'rspan',
				'value'=>'',
				'description' => esc_html__( 'Enter the second span text', 'easyweb')
			),	

            array(
				"type"=>'textarea',
				"heading"=>esc_html__('Description', 'easyweb'),
				"param_name"=> "description",
				"value"=>"",
				"description" => esc_html__( "Enter the description text", 'easyweb'),
				"dependency" => array('element'=>'type','value'=>array('6','8')),
			),			
					
            array(
				"type"=>'colorpicker',
				"heading"=>esc_html__('Color', 'easyweb'),
				"param_name"=> "color",
				"value"=>"",
				"description" => esc_html__( "Select color for icon and second span", 'easyweb')
				
			),
			
            array(
                "type" => "iconfonts",
                "heading" => esc_html__( "Icon", 'easyweb' ),
                "param_name" => "icon",
                'value'=>'',
                "description" => esc_html__( "Select Icon", 'easyweb'),
				"dependency" => array('element'=>'type','value'=>array('1','2','5','6','8')),
            ),
           
        ),
		
        
    ) );


?>