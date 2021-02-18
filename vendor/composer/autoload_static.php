<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf36219bd3b4c5f9f9818621de756923
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcf36219bd3b4c5f9f9818621de756923::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcf36219bd3b4c5f9f9818621de756923::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcf36219bd3b4c5f9f9818621de756923::$classMap;

        }, null, ClassLoader::class);
    }
}