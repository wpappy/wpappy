<?php

namespace WP_Titan_1_1_1\Setting\Control;

defined( 'ABSPATH' ) || exit;

abstract class Control extends Simple_Control {

	public static function render_title( string $type, string $name, ?string $title, array $args, string $required_label ): void {
		?>
		<label for="<?php echo esc_attr( $name ); ?>">
			<?php
			if ( $title ) {
				echo '<span class="wpt-control__title-text">' . esc_html( $title ) . '</span>';
			}

			if ( isset( $args['required'] ) && true === $args['required'] ) {
				echo '<span class="wpt-control__required">' . esc_html( $required_label ) . '</span>';
			}
			?>
		</label>
		<?php
	}
}
