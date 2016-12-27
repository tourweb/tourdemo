<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Smuzisf_Public {

	function __construct() {



	}

	public function init() {


		$this->hooks();

		$this->filters();


		$this->register_shortcode();

	}

	function hooks() {

		add_action( 'init', array( $this, 'assets' ) );

		add_action( 'wp_ajax_smuzsf_fb_token', array( $this, 'fb_access_token' ) );
		add_action( 'wp_ajax_nopriv_smuzsf_fb_token', array( $this, 'fb_access_token' ) );
	}

	function filters() {


	}

	function register_shortcode() {


		add_shortcode( SMUZISF_SHORTCODE, array( $this, 'process_shortcode' ) );

	}

	function assets() {

		if ( is_admin() ) return;

		wp_enqueue_style( 'smuzsf-facebook', SMUZISF_PLUGIN_URL . '/public/css/font-awesome.min.css' );

		wp_enqueue_script( 'smuzsf-facebook', SMUZISF_PLUGIN_URL . '/public/scripts/facebook.js', array( 'jquery' )  );

	}

	function process_shortcode( $atts ) {

		extract( shortcode_atts( array(
				'id' => null
			), $atts ) );

		if ( ! $id || !intval($id) || ( get_post_status( $id ) !== 'publish' ) )
            return FALSE;

		$theme = smuzisf_get_option( $id, 'wssf_select_layout' );

		
		$template_path = smuzisf_view_public_path( 'templates/default/template.php' );

		if ( $theme !== 'layout' ) {

			$template_path = 'templates/'.$theme.'/template.php';

			$template_path = smuzisf_view_public_path( $template_path );

		}

        $template_path = apply_filters( 'smuzsf_template_path', $template_path, $id  );

        $template_var = $this->setup_template_variables( $id );

		ob_start();
		
		include ( $template_path ); 

		$content = ob_get_contents();
		ob_end_clean();

		return $content;

	}

	function setup_template_variables( $feed_id ) {

		$vars = array();

		$nonce = wp_create_nonce( 'smuzsf_token'  );

		$ajax_url = admin_url( 'admin-ajax.php?action=smuzsf_fb_token' );

		$ajax_url = add_query_arg( array(
				
				'feed_id' => intval( $feed_id ),
				'nonce' => $nonce

			) , $ajax_url );

		$vars['ajax_link'] = $ajax_url;

		$vars['width'] = smuzisf_get_option( $feed_id, 'wssf_feed_width' );

		$vars['facebook_profile'] = '@' . smuzisf_get_option( $feed_id, 'wssf_fb_profile_id' );

		$vars['fblimit'] = smuzisf_get_option( $feed_id, 'wssf_results_per_feed_fb' );
		$vars['twlimit'] = smuzisf_get_option( $feed_id, 'wssf_results_per_feed_tw' );
		$vars['instalimit'] = smuzisf_get_option( $feed_id, 'wssf_results_per_feed_insta' );

		$vars['bgcolor'] = smuzisf_get_option( $feed_id, 'wssf_bg_color' );

		$vars['txtcolor'] = smuzisf_get_option( $feed_id, 'wssf_text_color' );

		$vars['isOnDate'] = smuzisf_get_option( $feed_id, 'wssf_enable_post_date' );

		$vars['isSocialIcon'] = smuzisf_get_option( $feed_id, 'wssf_enable_social_icon' );

		$vars['isDisplayPicture'] = smuzisf_get_option( $feed_id, 'wssf_enable_display_picture' );

		$vars['isHideTextContent'] = smuzisf_get_option( $feed_id, 'wssf_hide_text_content' );

		$vars['isPostLinkEnabled'] = smuzisf_get_option( $feed_id, 'wssf_enable_links_to_post' );

		$vars['twitter'] = '@' . smuzisf_get_option( $feed_id, 'wssf_tw_username' );

		$vars['twitter_id'] = '';

		$vars['twitter_secret'] = '';

		$vars['isfb'] = smuzisf_get_option( $feed_id, 'wssf_social_fb_enable' );

		$vars['istw'] = smuzisf_get_option( $feed_id, 'wssf_social_tw_enable' );

		$vars['isinsta'] = smuzisf_get_option( $feed_id, 'wssf_social_insta_enable' );

		$vars['instagram'] = '';

		$vars['fb_token'] = false;

		$vars['twitter_id'] = false;

		$vars['twitter_secret'] = false;

		$vars['gfont'] = smuzisf_get_option( $feed_id, 'wssf_select_gfont' );

		$vars['layout'] = smuzisf_get_option( $feed_id, 'wssf_select_layout' );

		$vars['instagram_token'] = '';
		
		if ( $vars['isfb'] === '1' ) {

			$vars['fb_token'] = $this->fb_access_token( $feed_id );

		}

		if ( $vars['istw'] === '1' ) {

			$vars['twitter_id'] = smuzisf_get_option( $feed_id, 'wssf_tw_consumer_key' );

			$vars['twitter_secret'] = smuzisf_get_option( $feed_id, 'wssf_tw_consumer_secret' );	
			
		}

		if ( $vars['isinsta'] === '1' ) {

			$vars['instagram'] = '@' . smuzisf_get_option( $feed_id, 'wssf_insta_username' );

			$vars['instagram_token'] = smuzisf_get_option( $feed_id, 'wssf_instagram_token' );

		}

		return $vars;

	}

	function fb_access_token( $feed_id ) {

		/*$feed_id = intval($_GET['feed_id']);

		$nonce = esc_attr( $_GET['nonce'] );

		if ( get_post_status( $feed_id ) !== 'publish' )
			exit('-1');

		if ( ! wp_verify_nonce( $nonce, 'smuzsf_token' ) )
			exit('-2');*/

		$app_id = smuzisf_get_option( $feed_id, 'wssf_fb_app_id' );

		$app_secret = smuzisf_get_option( $feed_id, 'wssf_fb_app_secret' );;

		$url = sprintf( 'https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id=%s&client_secret=%s', $app_id, $app_secret );

		$response = wp_remote_get( $url );

		if ( ! is_array( $response ) )
			return false;

		$response['body'] = str_replace( 'access_token=', '', $response['body']);

		return $response['body'];

	}

}