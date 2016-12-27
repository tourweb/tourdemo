<?php
// Way to set menu, import revolution slider, set blog page and set home page
if ( !function_exists( 'easyweb_wbc_extended' ) ) :

	add_action( 'wbc_importer_after_content_import', 'easyweb_wbc_extended', 10, 2 );

	function easyweb_wbc_extended( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) ) :

			/**
			 * Import theme options
			 *
			 * @since 1.0.0
			 */
			// Get file contents and decode
			$file = $demo_directory_path . 'theme_options.txt';
			$data = file_get_contents( $file );
			$data = json_decode( $data, true );
			$data = maybe_unserialize( $data );
			update_option( 'easyweb_webnus_options', $data );


			/**
			 * Add menus - the menus listed here largely depend on the ones registered in the theme
			 *
			 * @since 1.0.0
			 */
			$topbar_menu		= get_term_by( 'name', 'Topbar Menu', 'nav_menu' );
			$header_menu		= get_term_by( 'name', 'Header Menu', 'nav_menu' );
			$one_page_menu		= get_term_by( 'name', 'Onepage Header Menu', 'nav_menu' );
			$duplex_left_menu	= get_term_by( 'name', 'Duplex Menu - Left', 'nav_menu' );
			$duplex_right_menu	= get_term_by( 'name', 'Duplex Menu - Right', 'nav_menu' );
			$footer_menu		= get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			$locations	 		= array();

			if ( $topbar_menu )
				$locations['header-top-menu'] = $topbar_menu->term_id;

			if ( $header_menu )
				$locations['header-menu'] = $header_menu->term_id;

			if ( $one_page_menu )
				$locations['onepage-header-menu'] = $one_page_menu->term_id;

			if ( $duplex_left_menu )
				$locations['duplex-menu-left'] = $duplex_left_menu->term_id;

			if ( $duplex_right_menu )
				$locations['duplex-menu-right'] = $duplex_right_menu->term_id;

			if ( $footer_menu )
				$locations['footer-menu'] = $footer_menu->term_id;

			if ( $locations )
				set_theme_mod( 'nav_menu_locations', $locations );


			/**
			 * Set HomePage
			 *
			 * @since 1.0.0
			 */
			$wbc_home_pages = array(
				'Easyapp'			=> 'Home 1',
				'Easyconference'	=> 'Home',
				'Easydesign'		=> 'Home 1',
				'Easyhost'			=> 'Home 1',
				'Easyseo'			=> 'Home 1',
				'Easyseo2'			=> 'Home 1',
				'Easysmall'			=> 'Home 1',
			);

			if ( array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) :
				$home_page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
				if ( isset( $home_page->ID ) ) :
					update_option( 'page_on_front', $home_page->ID );
					update_option( 'show_on_front', 'page' );
				endif;
			endif;


			/**
			 * Set BlogPage
			 *
			 * @since 1.0.0
			 */
			$wbc_blog_pages = array(
				'Easyapp'		=> 'Blog',
				'Easydesign'	=> 'Blog',
				'Easyhost'		=> 'Blog',
				'Easyseo'		=> 'Blog',
				'Easysmall'		=> 'Blog',
			);

			if ( array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_blog_pages ) ) :
				$blog_page = get_page_by_title( $wbc_blog_pages[$demo_active_import[$current_key]['directory']] );
				if ( isset( $blog_page->ID ) ) :
					update_option( 'page_for_posts', $blog_page->ID );
				endif;
			endif;


			/**
			 * Import slider(s) for the current demo being imported
			 *
			 * @since 1.0.0
			 */
			if ( class_exists( 'RevSlider' ) && get_option( 'easyweb_revslider_imported' ) != 'done' ) :
				// Set sliders zip name
				$wbc_sliders_array = array(
					'Easyapp'		=> array( 'easy-app-showcase-carousel.zip', 'easy-app-slider-rev1.zip' ),
					'Easydesign'	=> array( 'slider.zip' ),
					'Easyhost'		=> array( 'slider.zip' ),
					'Easyseo'		=> array( 'easyseo-whiteboard.zip', 'slider.zip' ),
					'Easyseo2'		=> array( 'seo2-rev-slider.zip' ),
					'Easysmall'		=> array( 'creative-freedom.zip', 'easy-small-rev1.zip' ),
				);

				if ( array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) :
					$wbc_slider_imports = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
					if ( is_array( $wbc_slider_imports ) ) :
						foreach( $wbc_slider_imports as $wbc_slider_import ) :
							if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) :
								$slider = new RevSlider();
								$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
							endif;
						endforeach;
					endif;
				endif;

				add_option( 'easyweb_revslider_imported', 'done' );
			endif; // end Import slider(s)

		endif;

	} // end easyweb_wbc_extended function

endif;