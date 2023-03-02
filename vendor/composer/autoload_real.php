<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc037f935f23b9fdf1c9c8d5d2ff9e3c9
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitc037f935f23b9fdf1c9c8d5d2ff9e3c9', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc037f935f23b9fdf1c9c8d5d2ff9e3c9', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc037f935f23b9fdf1c9c8d5d2ff9e3c9::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitc037f935f23b9fdf1c9c8d5d2ff9e3c9::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequirec037f935f23b9fdf1c9c8d5d2ff9e3c9($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequirec037f935f23b9fdf1c9c8d5d2ff9e3c9($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
