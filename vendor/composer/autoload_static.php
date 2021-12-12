<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitacf4823d44a72fea19d0255c1d858465
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WP_Titan_0_9_1\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WP_Titan_0_9_1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WP_Titan_0_9_1\\Admin' => __DIR__ . '/../..' . '/app/Admin.php',
        'WP_Titan_0_9_1\\Admin\\Notice' => __DIR__ . '/../..' . '/app/Admin/Notice.php',
        'WP_Titan_0_9_1\\Ajax' => __DIR__ . '/../..' . '/app/Ajax.php',
        'WP_Titan_0_9_1\\App' => __DIR__ . '/../..' . '/app/App.php',
        'WP_Titan_0_9_1\\Asset' => __DIR__ . '/../..' . '/app/Asset.php',
        'WP_Titan_0_9_1\\Core' => __DIR__ . '/../..' . '/app/Core.php',
        'WP_Titan_0_9_1\\Core\\Log' => __DIR__ . '/../..' . '/app/Core/Log.php',
        'WP_Titan_0_9_1\\Debug' => __DIR__ . '/../..' . '/app/Debug.php',
        'WP_Titan_0_9_1\\FS' => __DIR__ . '/../..' . '/app/FS.php',
        'WP_Titan_0_9_1\\Feature' => __DIR__ . '/../..' . '/app/Feature.php',
        'WP_Titan_0_9_1\\Hook' => __DIR__ . '/../..' . '/app/Hook.php',
        'WP_Titan_0_9_1\\Http' => __DIR__ . '/../..' . '/app/Http.php',
        'WP_Titan_0_9_1\\Log' => __DIR__ . '/../..' . '/app/Log.php',
        'WP_Titan_0_9_1\\Plugin\\FS' => __DIR__ . '/../..' . '/app/Plugin/FS.php',
        'WP_Titan_0_9_1\\Plugin\\Hook' => __DIR__ . '/../..' . '/app/Plugin/Hook.php',
        'WP_Titan_0_9_1\\Plugin\\Template' => __DIR__ . '/../..' . '/app/Plugin/Template.php',
        'WP_Titan_0_9_1\\Simpleton' => __DIR__ . '/../..' . '/app/Simpleton.php',
        'WP_Titan_0_9_1\\Template' => __DIR__ . '/../..' . '/app/Template.php',
        'WP_Titan_0_9_1\\Text' => __DIR__ . '/../..' . '/app/Text.php',
        'WP_Titan_0_9_1\\Theme\\FS' => __DIR__ . '/../..' . '/app/Theme/FS.php',
        'WP_Titan_0_9_1\\Theme\\Template' => __DIR__ . '/../..' . '/app/Theme/Template.php',
        'WP_Titan_0_9_1\\Upload' => __DIR__ . '/../..' . '/app/Upload.php',
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
