<?php

namespace WP_Titan_1_0_21\Setting;

use WP_Titan_1_0_21\App;
use WP_Titan_1_0_21\Core;

defined( 'ABSPATH' ) || exit;

abstract class Base {

	protected $app;
	protected $core;
	protected $storage;
	protected $page;

	public function __construct( App $app, Core $core, Storage $storage, string $page ) {
		$this->app     = $app;
		$this->core    = $core;
		$this->storage = $storage;
		$this->page    = $page;
	}
}
