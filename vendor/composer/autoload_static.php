<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9935d1ad54a32ed4c905a799b4a1b732
{
    public static $prefixLengthsPsr4 = array (
        'r' => 
        array (
            'repositories\\' => 13,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'H' => 
        array (
            'Http\\' => 5,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repositories',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'Http\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Http',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9935d1ad54a32ed4c905a799b4a1b732::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9935d1ad54a32ed4c905a799b4a1b732::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9935d1ad54a32ed4c905a799b4a1b732::$classMap;

        }, null, ClassLoader::class);
    }
}
