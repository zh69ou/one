<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd954787686459acf378bda5481dc65f2
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Change\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Change\\' => 
        array (
            0 => __DIR__ . '/../..' . '/change',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd954787686459acf378bda5481dc65f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd954787686459acf378bda5481dc65f2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
