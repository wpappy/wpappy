<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitacf4823d44a72fea19d0255c1d858465
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WP_Titan\\' => 9,
            'WPT_Abstracts\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WP_Titan\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'WPT_Abstracts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/abstracts',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WPT_Abstracts\\App' => __DIR__ . '/../..' . '/abstracts/App.php',
        'WPT_Abstracts\\Simpleton' => __DIR__ . '/../..' . '/abstracts/Simpleton.php',
        'WP_Titan\\Admin' => __DIR__ . '/../..' . '/includes/Admin.php',
        'WP_Titan\\Admin\\Notice' => __DIR__ . '/../..' . '/includes/Admin/Notice.php',
        'WP_Titan\\Ajax' => __DIR__ . '/../..' . '/includes/Ajax.php',
        'WP_Titan\\App' => __DIR__ . '/../..' . '/includes/App.php',
        'WP_Titan\\Asset' => __DIR__ . '/../..' . '/includes/Asset.php',
        'WP_Titan\\Hook' => __DIR__ . '/../..' . '/includes/Hook.php',
        'WP_Titan\\Http' => __DIR__ . '/../..' . '/includes/Http.php',
        'WP_Titan\\Http_Plugin' => __DIR__ . '/../..' . '/includes/Http_Plugin.php',
        'WP_Titan\\Http_Theme' => __DIR__ . '/../..' . '/includes/Http_Theme.php',
        'WP_Titan\\Logger' => __DIR__ . '/../..' . '/includes/Logger.php',
        'WP_Titan\\Template' => __DIR__ . '/../..' . '/includes/Template.php',
        'WP_Titan\\Template_Plugin' => __DIR__ . '/../..' . '/includes/Template_Plugin.php',
        'WP_Titan\\Template_Theme' => __DIR__ . '/../..' . '/includes/Template_Theme.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitacf4823d44a72fea19d0255c1d858465::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitacf4823d44a72fea19d0255c1d858465::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitacf4823d44a72fea19d0255c1d858465::$classMap;

        }, null, ClassLoader::class);
    }
}
