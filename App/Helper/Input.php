<?php namespace App\Helper;
/**
 * Input:
 *
 * @author Tomas rebot <tomas.devel@gmail.com>
 */
class Input {
    

    /**
     * Exists: Determina si existe o no la variable $_GET o $_POST
     *  en una request
     * @access public
     * @param string $variable [opcional]
     * @return boolean
     */
    public static function exists($variable = "post") {
        switch ($variable) {
            case 'post':
                return(!empty($_POST));
            case 'get':
                return(!empty($_GET));
        }
        return false;
    }

    /**
     * Get: Retorna si la variable superglobal esta seteada en get
     * de lo contrario retorna el string default
     * @access public
     * @param string $key
     * @param mixed $default
     * @return mixed
     * @since 1.0.1
     */
    public static function get($key, $default = "") {
        return(isset($_GET[$key]) ? $_GET[$key] : $default);
    }
    /**
     * Post: Retorna si la variable superglobal esta seteada en get
     * de lo contrario retorna el string default
     * @access public
     * @param string $key
     * @param mixed $default
     * @return mixed
     * @since 1.0.1
     */
    public static function post($key, $default = "") {
        return(isset($_POST[$key]) ? $_POST[$key] : $default);
    }

    public static final function formSanatized($without = [])
    {
        foreach($_POST as $key => $value)
        {
            if(!in_array($key, $without))
            {
                $final[$key] = $value;
            }
        }
        
       
        return $final;
    }
    
}