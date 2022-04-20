<?php
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_script(
			'vabfwc-scripts',
			VABFWC_PLUGIN_URL . '/includes/js/vabfwc-scripts.js',
			array( 'jquery' ),
			VABFWC_VERSION,
			true
		);
		$VABFWC_SenD = array(
			'VABFWC_Chu_F_Out'		=> esc_html__( 'Select files', 'VABFWC' ),
			'VABFWC_Chu_Fs_Out'		=> esc_html__( 'Selected files', 'VABFWC' )
		);
			wp_localize_script( 'vabfwc-scripts', 'VABFWC_SenD_In', $VABFWC_SenD );
	},
	10, 0
);
add_action(
	'get_footer',
	function() {
		wp_enqueue_style(
			'vabfwc-styles',
			VABFWC_PLUGIN_URL . '/includes/css/vabfwc-styles.css',
			array(),
			VABFWC_VERSION,
			'all'
		);
	},
	10, 0
);
if ( ! function_exists( 'VAB_add_defer_attribute' ) ) {
	function VAB_add_defer_attribute( $tag, $handle ) {
		$handles = array(
			'vabfwc-scripts',
		);
		foreach( $handles as $defer_script ) {
			if ( $defer_script === $handle ) {
				return str_replace( 'src', 'defer="defer" src', $tag );
			}
		}
		return $tag;
	}
}
add_filter( 'script_loader_tag', 'VAB_add_defer_attribute', 10, 2 );
if ( ! function_exists( 'VAB_add_preload_attribute' ) ) {
	function VAB_add_preload_attribute( $tag, $handle ) {
		$handles = array(
			'vabfwc-styles',
		);
		foreach( $handles as $defer_script ) {
			if( $defer_script === $handle ) {
				return str_replace( 'href', 'rel="preload" as="style" href', $tag );
			}
		}
		return $tag;
	}
}
add_filter( 'style_loader_tag', 'VAB_add_preload_attribute', 10, 2 );
add_action( 'current_screen', 'vabfwc__screen' );
if ( ! function_exists( 'vabfwc__screen' ) ) {
	function vabfwc__screen(){
		$screen = get_current_screen();
		if( 'vab_fwc' === $screen->post_type ){
			add_action( 'admin_enqueue_scripts', 'vabfwc_enqueue_admin_scripts' );
		}
	}
}
if ( ! function_exists( 'vabfwc_enqueue_admin_scripts' ) ) {
	function vabfwc_enqueue_admin_scripts() {
		wp_enqueue_style(
			'vabfwc-admin-styles',
			VABFWC_PLUGIN_URL . '/includes/css/vabfwc-admin-styles.css',
			array(),
			VABFWC_VERSION,
			'all'
		);
	}
}