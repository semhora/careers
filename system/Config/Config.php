<?php
namespace System\Config;

class Config
{
    public static function getConfigParameters(): array
    {
        return include APP_DIR . '/config/config.php';
    }

    public static function getConfig(string $configName)
    {
        $configs = self::getConfigParameters();
        if (! array_key_exists($configName, $configs)) {
            return false;
        }

        return $configs[$configName];
    }
}
