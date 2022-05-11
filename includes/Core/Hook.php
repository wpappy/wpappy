<?php

namespace WP_Titan_1_0_16\Core;

use WP_Titan_1_0_16\App;
use WP_Titan_1_0_16\Feature;
use const WP_Titan_1_0_16\PRIORITY;

defined( 'ABSPATH' ) || exit;

class Hook extends Feature {

	public function apply_filters( string $slug, /* mixed */ ...$args ) /* mixed */ {
		return apply_filters( $this->core->get_key( $slug ), ...$args );
	}

	public function add_filter( string $slug, callable $callback, int $priority = PRIORITY, int $accepted_args = 1 ): void {
		add_filter( $this->core->get_key( $slug ), $callback, $priority, $accepted_args );
	}

	public function do_action( string $slug, /* mixed */ ...$args ): void {
		do_action( $this->core->get_key( $slug ), ...$args );
	}

	public function add_action( string $slug, callable $callback, int $priority = 10, int $accepted_args = 1 ): void {
		add_action( $this->core->get_key( $slug ), $callback, $priority, $accepted_args );
	}
}
