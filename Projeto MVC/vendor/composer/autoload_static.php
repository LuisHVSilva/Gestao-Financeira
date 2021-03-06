<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd92bd10fca070d72a8ebfa590db731ef
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd92bd10fca070d72a8ebfa590db731ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd92bd10fca070d72a8ebfa590db731ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd92bd10fca070d72a8ebfa590db731ef::$classMap;

        }, null, ClassLoader::class);
    }
}
