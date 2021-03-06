<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc962b659b0a5a32a83d3316acdb32045
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TelegramBot\\Api\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TelegramBot\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/telegram-bot/api/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc962b659b0a5a32a83d3316acdb32045::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc962b659b0a5a32a83d3316acdb32045::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
