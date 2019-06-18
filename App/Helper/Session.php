<?php namespace App\Helper;
/**
 * Session:
 *
 * @author Tomas rebot <tomas.devel@gmail.com.com>
 * 
 */
class Session {
    /**
     * Delete: Elimina un valor especifico de la sesion.
     * @access public
     * @param string $key
     * @return boolean
     * 
     */
    public static function delete($key) {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    /**
     * Destroy: Mata la sesion
     * @access public
     * @return void
     * 
     */
    public static function destroy() {
        session_destroy();
    }
    /**
     * Exists: Verifica si existe un valor en la sesion
     * @access public
     * @param string $key
     * @return boolean
     * 
     */
    public static function exists($key) {
        return(isset($_SESSION[$key]));
    }
    /**
     * Get: Si existe retorna el valor de una clave de sesion
     * @access public
     * @param string $key
     * @return string|nothing
     * 
     */
    public static function get($key) {
        if (self::exists($key)) {
            return($_SESSION[$key]);
        }
    }
    /**
     * Init: Inicia la sesion
     * @access public
     * @return void
     * 
     */
    public static function init() {
        // Si no existe, iniciar sesion
        if (session_id() == "") {
            session_start();
        }
    }
    /**
     * Put: Agrega un valor a la sesion.
     * @access public
     * @param string $key
     * @param string $value
     * @return string
     * 
     */
    public static function put($key, $value) {
        return($_SESSION[$key] = $value);
    }
}