<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit616ad6fab79613d92ddea9b033585b48
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shrik\\Admin\\' => 12,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shrik\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit616ad6fab79613d92ddea9b033585b48::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit616ad6fab79613d92ddea9b033585b48::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit616ad6fab79613d92ddea9b033585b48::$classMap;

        }, null, ClassLoader::class);
    }
}