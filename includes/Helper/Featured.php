<?php

namespace WP_Titan_1_1_1\Helper;

use WP_Titan_1_1_1\App;
use WP_Titan_1_1_1\Core;

defined( 'ABSPATH' ) || exit;

trait Featured {

	protected function get_feature( ?App $app, ?Core $core, string $prop, string $classname ) /* mixed */ {
		if ( ! is_a( $this->$prop, $classname ) ) {
			$this->$prop = $app ?
				( $core ?
					new $classname( $app, $core ) :
					new $classname( $app )
				) : new $classname( $core );
		}

		return $this->$prop;
	}
}
