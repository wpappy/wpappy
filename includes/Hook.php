<?php

namespace WP_Titan_1_0_19;

defined( 'ABSPATH' ) || exit;

/**
 * Manage the inner hooks for the application.
 */
class Hook extends Feature {

	public function apply_filters( string $slug, /* mixed */ ...$args ) /* mixed */ {
		return apply_filters( $this->app->get_key( $slug ), ...$args );
	}

	public function add_filter( string $slug, callable $callback, int $priority = DEFAULT_PRIORITY, int $accepted_args = 1 ): App {
		add_filter( $this->app->get_key( $slug ), $callback, $priority, $accepted_args );

		return $this->app;
	}

	public function do_action( string $slug, /* mixed */ ...$args ): App {
		do_action( $this->app->get_key( $slug ), ...$args );

		return $this->app;
	}

	public function add_action( string $slug, callable $callback, int $priority = DEFAULT_PRIORITY, int $accepted_args = 1 ): App {
		add_action( $this->app->get_key( $slug ), $callback, $priority, $accepted_args );

		return $this->app;
	}

	public function activation( callable $callback ): App {
		if ( $this->is_theme() ) {
			add_action( 'after_switch_theme', $callback, DEFAULT_PRIORITY, 2 );

		} else {
			register_activation_hook( $this->app->get_root_file(), $callback );
		}

		return $this->app;
	}

	public function deactivation( callable $callback ): App {
		if ( $this->is_theme() ) {
			add_action( 'switch_theme', $callback, DEFAULT_PRIORITY, 3 );

		} else {
			register_deactivation_hook( $this->app->get_root_file(), $callback );
		}

		return $this->app;
	}
}
