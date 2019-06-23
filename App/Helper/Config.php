<?php namespace App\Helper;
/**
 * Config:
 *
 * @author Tomi rebot <tomas.devel@gmail.com>
 */
class Config {
    /** @var array Los contenidos del archivo config. */
    private static $_config = [];
    /**
     * Get:Retorna la clave del archivo config
     * @access public
     * @param string $key
     * @return mixed
     */
    public static function get($key) {
        if (empty(self::$_config)) {
            self::$_config = require_once APP_CONFIG_FILE;
        }
        return(array_key_exists($key, self::$_config) ? self::$_config[$key] : null);
    }


}