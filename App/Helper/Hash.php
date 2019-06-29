<?php namespace App\Helper;

class Hash
{
    
    /**
     * Generate: Returns a generate a hash value, as a string.
     * @access public
     * @param string $string
     * @param string $salt [optional]
     * @return string
     * @since 1.0.1
     */
    public static function make($string, $length = 25)
    {
    
        return(password_hash($string, PASSWORD_DEFAULT, [$length]));
    } 

    /**
     * Generate Unique: Returns a unique identifier, as a string.
     * @access public
     * @return string
     * @since 1.0.1
     */
    public static function generateUnique()
    {
        return(self::make(uniqid()));
    }

    
    public static function compare($key, $user)
    {
        return password_verify($key, $user->data()->password);
    }

}