<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2c56ea0c52bd3a4b20b5e778b0bd381
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2c56ea0c52bd3a4b20b5e778b0bd381::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2c56ea0c52bd3a4b20b5e778b0bd381::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
