<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit172377240f770a8de074a3597003575e
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'React\\Stream\\' => 13,
            'React\\EventLoop\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'React\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/stream/src',
        ),
        'React\\EventLoop\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/event-loop/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'E' => 
        array (
            'Evenement' => 
            array (
                0 => __DIR__ . '/..' . '/evenement/evenement/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit172377240f770a8de074a3597003575e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit172377240f770a8de074a3597003575e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit172377240f770a8de074a3597003575e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit172377240f770a8de074a3597003575e::$classMap;

        }, null, ClassLoader::class);
    }
}