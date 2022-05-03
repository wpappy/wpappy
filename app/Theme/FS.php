<?php

namespace WP_Titan_0_9_1\Theme;

defined( 'ABSPATH' ) || exit;

class FS extends \WP_Titan_0_9_1\Fs {

	public function get_path( string $path = '', bool $parent = false ): string {
		return ( $parent ? get_parent_theme_file_path() : get_theme_file_path() ) . DIRECTORY_SEPARATOR . $path;
	}

	public function get_url( string $url = '', bool $parent = false ): string {
		return ( $parent ? get_parent_theme_file_uri() : get_theme_file_uri() ) . '/' . $url;
	}
}