<?php
namespace App\Helper;
/**
 * Redirect:
 *
 * @author Tomi Rebot <tomas.devel@gmail.com.com>
 * @return Redirect
 */

class Redirect {
    /**
     * To: Redirigir a una url especifica
     * @access public
     * @param string $location [optional]
     * @return void
     */
    public static function to($location = "")
    {
        if ($location) {
            if ($location === '404') {
                header('HTTP/1.0 404 Not Found');
                include VIEW_PATH . DEFAULT_404_PATH;
            } else {
                header("Location: " .$location);
            }
            exit();
        }
    }
    public static function back($message = '')
    {
        if(isset($message))
        {
            Session::put('errorbag', $message);
        }
        header('Location: ' .$_SERVER['HTTP_REFERER']);
    }
}