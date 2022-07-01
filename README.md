# Wpappy

<a href="https://packagist.org/packages/wpappy/wpappy">
  <img src="https://img.shields.io/packagist/v/wpappy/wpappy" alt="Packagist version"/>
</a>

#### The library that introduces a smart layer between the WordPress environment and your plugin or theme (hereinafter referred to as the application).

- [System Requirements](#system-requirements)
- [Boilerplates](#boilerplates)
- [Manual Installation](#manual-installation)
- [Documentation](#documentation)
- [Simple Use Case](#simple-use-case)
- [License](#license)

## System Requirements
- PHP: ^7.2.0
- WordPress: ^5.0.0
- Composer (optional)

## Boilerplates
The following template repositories are the best point to start developing a new WordPress application:
- [Starter Plugin](https://github.com/wpappy/starter-plugin)
- [Starter Theme](https://github.com/wpappy/starter-theme)

## Manual Installation
Run the following command in root directory of your application to install using Composer:
``` bash
composer require wpappy/wpappy
```
Alternatively, you can [download the latest release](https://github.com/wpappy/wpappy/releases/latest) directly and place unarchived folder in root directory of the application.

## Documentation
The latest documentation is published on [wpappy.dpripa.com](https://wpappy.dpripa.com).\
For convenience, it's better to start from [the entry point](https://wpappy.dpripa.com/classes/Wpappy-1-0-1-App.html) of the library.

If you need documentation for previous versions, follow these instructions:
- Install [phpDocumentor](https://www.phpdoc.org) into your system.
- Download the version you need from [the release list](https://github.com/wpappy/wpappy/releases) and unzip the downloaded archive.
- Run the following command in the unarchived folder:
``` bash
phpDocumentor
```
- After phpDocumentor has reported success, you can find the generated documentation in the `./docs/api` directory.

## Simple Use Case
The following is a simple example when WP Titan is used. It doesn't matter which environment (plugin or theme) you run this code in, WP Titan automatically detects your app's environment and provides a universal API.

### Root File (index.php / functions.php)
```php
namespace My_App;

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/wpappy/wpappy/index.php';
require_once __DIR__ . '/vendor/autoload.php';

// Always be sure that the Wpappy namespace matches the installed version of the library.
// This is because other plugin and theme may use a different version.
// For example, where 'Wpappy_x_x_x' version is x.x.x.
use Wpappy_1_0_1\App as App;

// Define a function that returns the singleton instance of WP Titan for your application.
function app(): App {
  return App::get( __NAMESPACE__, __FILE__ );
}

new Setup();
```
You can see an example of simpleton usage here. It's a structural pattern provided by WP Titan for the WordPress based applications. Read more about [simpleton](https://wpt.dpripa.com/classes/WP-Titan-1-0-19-Simpleton.html).

### Setup.php
```php
namespace My_App;

defined( 'ABSPATH' ) || exit;

final class Setup {

  public function __construct() {
    if ( app()->simpleton()->validate( self::class ) ) {
      return;
    }

    app()->i18n()->setup()
      ->admin()->notice()->setup()
      ->setup( array( $this, 'setup' ) );
  }

  public function setup(): void {
    if ( ! app()->integration()->wc()->is_active() ) {
      app()->admin()->notice()->render(
        app()->i18n()->__( 'My App require WooCommerce.' )
      );

      return;
    }

    new Setting();
 new Post();

 add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
 app()->hook()->do_action( 'setup_complete' );
  }

  public function enqueue_assets(): void {
    app()->asset()->enqueue_style( 'main' )
      ->asset()->enqueue_script( 'main' );
  }
}
```

### Setting.php
```php
namespace My_App;

defined( 'ABSPATH' ) || exit;

final class Setting {

  public function __construct() {
    if ( app()->simpleton()->validate( self::class ) ) {
      return;
    }

    app()->setting()->add_page(
      'general',
      'edit.php',
      app()->i18n()->__( 'My Plugin' ),
      app()->i18n()->__( 'My Plugin Settings' )
    );

    app()->setting()->add_tab(
      'single',
      app()->i18n()->__( 'Single Post' )
    );

    app()->setting()->add_box(
      'labels'
    )->setting()->add(
      'textarea',
      'hello_text_label',
      app()->i18n()->__( '"Hello" text label' ),
      array(
        'default' => app()->i18n()->__( 'Hello from the app!' ),
      )
    );
  }
}
```

### Post.php
```php
namespace My_App;

defined( 'ABSPATH' ) || exit;

final class Post {

  public function __construct() {
    if ( app()->simpleton()->validate( self::class ) ) {
      return;
    }

    add_filter( 'the_content', array( $this, 'render_hello_text_label' ) );
  }

  public function render_hello_text_label( string $content ): string {
    if (
      ! is_single() ||
      1 === (int) get_the_author_meta( 'ID' )
    ) {
      return $content;
    }

    app()->setting()->context()->add( 'general', 'single' );

    $label = app()->setting()->get( 'hello_text_label', 'labels' );

    if ( empty( $label ) ) {
      return $content;
    }

    $content .= app()->template()->get(
      'label',
      array(
        'label' => $label,
      )
    );

    return $content;
  }
}
```

## License
Wpappy is free library (software), and is released under the terms of the GPL (GNU General Public License) version 2 or (at your option) any later version. See [LICENSE](https://github.com/wpappy/wpappy/blob/main/LICENSE).
