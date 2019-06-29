<?php namespace App\Model;
use Exception;
use App\Core\Model as Model;
use App\Helper;
use App\Traits\authenticable;


/**
 * User Model:
 *
 * @author tomi rebot <tomas.devel@gmal.com>
 */
class Usuario extends Model
{
    use authenticable;
    
    /**
     * Create Usuario: Inserts a new Usuario into the database, returning the unique
     * Usuario if successful, otherwise returns false.
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 1.0.3
     * @throws Exception
     */
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre','apellido','email','username'
    ];

    protected $hidden = [
        'password'
    ];
   

}