<?php

namespace WP_Titan_0_9_1\Plugin;

defined( 'ABSPATH' ) || exit;

class FS extends \WP_Titan_0_9_1\Fs {

	public function get_path( string $path = '' ): string {
		return plugin_dir_path( $this->app->get_root_file() ) . $path;
	}

	public function get_url( string $url = '' ): string {
		return plugin_dir_url( $this->app->get_root_file() ) . $url;
	}
}