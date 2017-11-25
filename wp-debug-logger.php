<?php
/**
 * Plugin Name: WordPress Plugin Logger
 * Plugin URI: https://github.com/mizner/wp_debug_logger
 * Description: uses function <code>_log</code> for testing
 * Version: 1.0
 * Author: Michael Mizner
 * Author URI: http://mizner.io
 * License: GPL
 */

defined( 'WPINC' ) || die;

if ( ! function_exists( '_log' ) ) {
	function _log( $message ) {
		if ( true === WP_DEBUG_LOG ) {
			error_log( '----------------------------------' );
			foreach ( func_get_args() as $arg ) {
				if ( is_array( $arg ) || is_object( $arg ) ) {
					error_log( print_r( $arg, true ) );
				} else {
					error_log( $arg );
				}
			}
			error_log( '----------------------------------' );
		} else {
			return;
		}
	}
}