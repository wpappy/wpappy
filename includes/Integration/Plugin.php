<?php

namespace WP_Titan_1_0_19\Integration;

use WP_Titan_1_0_19\Feature;

defined( 'ABSPATH' ) || exit;

abstract class Plugin extends Feature {

	abstract public function is_active(): bool;
}
