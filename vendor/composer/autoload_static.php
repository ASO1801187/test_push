<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3739b173c73f9d8733a32c81132b9b9
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3739b173c73f9d8733a32c81132b9b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3739b173c73f9d8733a32c81132b9b9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}