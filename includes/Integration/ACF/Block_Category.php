<?php

namespace WP_Titan_1_0_6\Integration\ACF;

use WP_Titan_1_0_6\App;
use WP_Titan_1_0_6\Feature;

defined( 'ABSPATH' ) || exit;

/**
 * Block categories manager.
 */
class Block_Category extends Feature {

	/**
	 * Add block category.
	 *
	 * @param string $category The key to the category.
	 * @param string $path The path to the directory that contains the block templates for the current category.
	 * @param string $title The name of the category to be rendered.
	 */
	public function add( string $category, string $path, string $title ): App {
		if ( function_exists( 'acf_register_block_type' ) && function_exists( 'register_block_type' ) ) {
			$this->add_category( $category, $title );
			$this->add_blocks_autoloader( $category, $path );
		}

		return $this->app;
	}

	protected function add_category( string $category, string $title ): void {
		add_filter(
			'block_categories',
			function ( array $categories ) use ( $category, $title ): array {
				return array_merge(
					array(
						array(
							'slug'  => $this->app->get_key( $category ),
							'title' => $title,
						),
					),
					$categories
				);
			}
		);
	}

	protected function add_blocks_autoloader( string $category, string $path ): void {
		add_action(
			'acf/init',
			function() use ( $category, $path ): void {
				$dir = $this->app->fs()->get_path( $path );

				if ( file_exists( $dir ) ) {
					$dir_iterator = new \DirectoryIterator( $dir );

					foreach ( $dir_iterator as $fileinfo ) {
						if ( ! $fileinfo->isDot() ) {
							$slug = str_replace( '.php', '', $fileinfo->getFilename() );

							$file_headers = get_file_data(
								$this->app->fs()->get_path( "${path}/${slug}.php" ),
								array(
									'name'        => 'Block Name',
									'description' => 'Block Description',
									'icon'        => 'Block Icon',
									'keywords'    => 'Block Keywords',
									'post_types'  => 'Block Post Types',
								)
							);

							acf_register_block_type(
								array(
									'name'            => $slug,
									'title'           => esc_html__( $file_headers['name'], $this->app->get_key() ), // phpcs:ignore
									'description'     => esc_html__( $file_headers['description'], $this->app->get_key() ), // phpcs:ignore
									'category'        => $this->app->get_key( $category ),
									'icon'            => $file_headers['icon'],
									'keywords'        => explode( ', ', $file_headers['keywords'] ),
									'post_types'      => explode( ', ', trim( $file_headers['post_types'] ) ),
									'mode'            => 'edit',
									'supports'        => array(
										'mode'  => false,
										'align' => false,
									),
									'render_callback' => function ( array &$args ) use ( $path, $slug ) {
										require_once $this->app->fs()->get_path( "${path}/${slug}.php" );
									},
								)
							);
						}
					}
				}
			}
		);
	}
}
