<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6104c7a9c4cc4f77bcede37a3898637d
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Thomd729\\Itblog\\' => 16,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Thomd729\\Itblog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6104c7a9c4cc4f77bcede37a3898637d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6104c7a9c4cc4f77bcede37a3898637d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6104c7a9c4cc4f77bcede37a3898637d::$classMap;

        }, null, ClassLoader::class);
    }
}
