<?php

namespace WP_Titan_1_0_5\Helper;

use WP_Titan_1_0_5\App;
use WP_Titan_1_0_5\Core;

defined( 'ABSPATH' ) || exit;

trait Featured {

	protected function get_feature( App $app, Core $core, string $prop, string $class ) /* mixed */ {
		if ( ! is_a( $this->$prop, $class ) ) {
			$this->$prop = new $class( $app, $core );
		}

		return $this->$prop;
	}
}