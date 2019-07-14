<?php namespace App\Helper;
use App\Model\Usuario;

class Auth {
    /**
     * Check Authenticated: Checks to see if the user is authenticated,
     * destroying the session and redirecting to a specific location if the user
     * session doesn't exist.
     * @access public
     * @param string $redirect
     */
    public static function checkAuthenticated($redirect = "login") {
        Session::init();
        if (!Session::exists("usuario")) {
            Session::flush();
            Redirect::to($redirect);
        }
    }
    /**
     * Check Unauthenticated: Checks to see if the user is unauthenticated,
     * redirecting to a specific location if the user session exist.
     * @access public
     * @param string $redirect
     * @since 1.0.2
     */
    public static function checkUnauthenticated($redirect = "index/panel") {
        
        Session::init();
        if (Session::exists('usuario')) {
            Redirect::to($redirect);
        }
    }
    public static function user()
    {
        Session::init();
        return ( Usuario::where(['id', Session::get('usuario')]));
    }

   
    public function check()
    {
        return (!empty(self::user()));

    }

    

}