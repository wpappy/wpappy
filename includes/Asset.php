<?php

namespace WP_Titan_1_0_0;

defined( 'ABSPATH' ) || exit;

/**
 * Manage static assets.
 */
class Asset extends Feature {

	protected $fs;

	protected $base_dirname   = 'assets';
	protected $font_dirname   = 'fonts';
	protected $image_dirname  = 'images';
	protected $style_dirname  = 'styles';
	protected $script_dirname = 'scripts';
	protected $postfix        = '.min';

	/** @ignore */
	public function __construct( App $app, Core $core ) {
		parent::__construct( $app, $core );

		$this->set_fs();
	}

	/**
	 * Optional. Set up a name for the base asset directory.
	 *
	 * Default: assets
	 */
	public function set_base_dirname( string $name ): self {
		$this->base_dirname = $name;

		return $this;
	}

	/**
	 * Optional. Set up a name for the font subdirectory.
	 *
	 * Default: fonts
	 */
	public function set_font_dirname( string $name ): self {
		$this->font_dirname = $name;

		return $this;
	}

	/**
	 * Optional. Set up a name for the image subdirectory.
	 *
	 * Default: images
	 */
	public function set_image_dirname( string $name ): self {
		$this->image_dirname = $name;

		return $this;
	}

	/**
	 * Optional. Set up a name for the style subdirectory.
	 *
	 * Default: styles
	 */
	public function set_style_dirname( string $name ): self {
		$this->style_dirname = $name;

		return $this;
	}

	/**
	 * Optional. Set up a name for the script subdirectory.
	 *
	 * Default: scripts
	 */
	public function set_script_dirname( string $name ): self {
		$this->script_dirname = $name;

		return $this;
	}

	/**
	 * Optional. Set up an alternative postfix.
	 *
	 * Default: .min
	 */
	public function set_postfix( string $postfix ): self {
		$this->postfix = $postfix;

		return $this;
	}

	protected function set_fs(): void {
		$this->fs = $this->app->fs();
	}

	protected function get_key( string $slug ): string {
		return $this->app->get_key( str_replace( '-', '_', $slug ) );
	}

	public function get_font_url( string $filename = '' ): string {
		$raw_path = $this->base_dirname . ( $this->font_dirname ? ( DIRECTORY_SEPARATOR . $this->font_dirname ) : '' ) . ( $this->base_dirname ? DIRECTORY_SEPARATOR : '' );

		return $this->fs->get_url() . $raw_path . $filename;
	}

	public function get_image_url( string $filename = '' ): string {
		$raw_path = $this->base_dirname . ( $this->image_dirname ? ( DIRECTORY_SEPARATOR . $this->image_dirname ) : '' ) . ( $this->base_dirname ? DIRECTORY_SEPARATOR : '' );

		return $this->fs->get_url() . $raw_path . $filename;
	}

	public function enqueue_style( string $slug, array $deps = array(), /* string|array */ $addition = null ): self {
		$key      = $this->get_key( $slug );
		$raw_path = $this->base_dirname . ( $this->style_dirname ? ( DIRECTORY_SEPARATOR . $this->style_dirname ) : '' ) . ( $this->base_dirname ? DIRECTORY_SEPARATOR : '' );
		$url      = $this->fs->get_url() . $raw_path . $slug . $this->postfix . '.css';
		$path     = $this->fs->get_path() . $raw_path . $slug . $this->postfix . '.css';

		if ( ! file_exists( $path ) ) {
			return $this;
		}

		wp_enqueue_style( $key, $url, $deps, filemtime( $path ) );

		if ( empty( $addition ) ) {
			return $this;
		}

		if ( is_string( $addition ) ) {
			wp_add_inline_style( $key, $addition );

		} elseif ( is_array( $addition ) ) {
			$css_vars = ':root{';

			foreach ( $addition as $var_slug => $var_val ) {
				$css_vars .= '--' . str_replace( '_', '-', $this->app->get_key( $var_slug ) ) . ':' . $var_val . ';';
			}

			wp_add_inline_style( $key, $css_vars . '}' );
		}

		return $this;
	}

	public function enqueue_script( string $slug, array $deps = array(), array $args = array(), bool $in_footer = true ): self {
		$key      = $this->get_key( $slug );
		$raw_path = $this->base_dirname . ( $this->script_dirname ? ( DIRECTORY_SEPARATOR . $this->script_dirname ) : '' ) . ( $this->base_dirname ? DIRECTORY_SEPARATOR : '' );
		$url      = $this->fs->get_url() . $raw_path . $slug . $this->postfix . '.js';
		$path     = $this->fs->get_path() . $raw_path . $slug . $this->postfix . '.js';

		if ( ! file_exists( $path ) ) {
			return $this;
		}

		wp_enqueue_script( $key, $url, $deps, filemtime( $path ), $in_footer );

		if ( $args ) {
			wp_localize_script( $key, $this->app->str()->to_camelcase( $key ), $args );
		}

		return $this;
	}

	public function external_style( string $slug, string $url ): self {
		wp_enqueue_style( $this->app->get_key( $slug ), $url, false, null ); // phpcs:ignore

		return $this;
	}

	public function external_script( string $slug, string $url, bool $in_footer = true ): self {
		wp_enqueue_script( $this->app->get_key( $slug ), $url, false, null, $in_footer ); // phpcs:ignore

		return $this;
	}
}
