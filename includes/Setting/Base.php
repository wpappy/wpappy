<?php

namespace WP_Titan_1_1_1\Setting;

use WP_Titan_1_1_1\App;
use WP_Titan_1_1_1\Core;

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
