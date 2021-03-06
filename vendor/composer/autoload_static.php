<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9f2951864aa343695abc822cb1042ea
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '2208db94ce05fb2f82040fa4f2ccdbe6' => __DIR__ . '/..' . '/leeoniya/dump-r/dump_r.php',
        '7745382c92b7799bf1294b1f43023ba2' => __DIR__ . '/..' . '/tracy/tracy/src/shortcuts.php',
    );

    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'dump_r\\' => 7,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'dump_r\\' => 
        array (
            0 => __DIR__ . '/..' . '/leeoniya/dump-r/src/dump_r',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
    );

    public static $prefixesPsr0 = array (
        'Z' => 
        array (
            'Zend_' => 
            array (
                0 => __DIR__ . '/..' . '/zendframework/zendframework1/library',
            ),
        ),
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Tracy\\Bar' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar.php',
        'Tracy\\BlueScreen' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/BlueScreen.php',
        'Tracy\\Bridges\\Nette\\TracyExtension' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/TracyExtension.php',
        'Tracy\\Debugger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Debugger.php',
        'Tracy\\DefaultBarPanel' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/DefaultBarPanel.php',
        'Tracy\\Dumper' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper.php',
        'Tracy\\FireLogger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/FireLogger.php',
        'Tracy\\Helpers' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Helpers.php',
        'Tracy\\IBarPanel' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/IBarPanel.php',
        'Tracy\\ILogger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/ILogger.php',
        'Tracy\\Logger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger.php',
        'Tracy\\OutputDebugger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/OutputDebugger.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9f2951864aa343695abc822cb1042ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9f2951864aa343695abc822cb1042ea::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite9f2951864aa343695abc822cb1042ea::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite9f2951864aa343695abc822cb1042ea::$classMap;

        }, null, ClassLoader::class);
    }
}
