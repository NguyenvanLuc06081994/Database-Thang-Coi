<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5de704838a1e79b4e99fbcae7433100
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita5de704838a1e79b4e99fbcae7433100::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita5de704838a1e79b4e99fbcae7433100::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
