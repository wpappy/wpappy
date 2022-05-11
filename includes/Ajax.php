<?php

namespace WP_Titan_1_0_16;

defined( 'ABSPATH' ) || exit;

/**
 * Manage Ajax actions.
 */
class Ajax extends Feature {

	/**
	 * Add a callback function for an Ajax action.
	 */
	public function add_action( string $action, callable $callback ): App {
		$key = $this->app->get_key( $action );

		add_action( 'wp_ajax_' . $key, $callback );
		add_action( 'wp_ajax_nopriv_' . $key, $callback );

		return $this->app;
	}

	public function get_url( string $action = '' ): string {
		$url = $this->app->admin()->get_url( 'admin-ajax' );

		if ( $action ) {
			$url = add_query_arg( $url, array( 'action' => $this->app->get_key( $action ) ) );
		}

		return $url;
	}
}
