<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda2757da4fa49612dabc5ffc1a654d30
{
    public static $prefixLengthsPsr4 = array (
        'b' => 
        array (
            'benhall14\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'benhall14\\' => 
        array (
            0 => __DIR__ . '/..' . '/benhall14/php-calendar/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitda2757da4fa49612dabc5ffc1a654d30::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda2757da4fa49612dabc5ffc1a654d30::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitda2757da4fa49612dabc5ffc1a654d30::$classMap;

        }, null, ClassLoader::class);
    }
}
