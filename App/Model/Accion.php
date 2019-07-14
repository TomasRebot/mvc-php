<?php namespace App\Model;
use Exception;
use App\Core\Model as Model;

use App\Traits\authenticable;


/**
 * User Model:
 *
 * @author tomi rebot <tomas.devel@gmal.com>
 */
class Accion extends Model
{
    use authenticable;

    
    protected $table = 'acciones';
    
    public $belongsTo = '';


    protected $fillable = [
       'clave',
       'descripcion',
       'icon',
       'action'
    ];


    protected $hidden = [

    ];

    
    

    /**
     * Create Usuario: Inserts a new Usuario into the database, returning the unique
     * Usuario if successful, otherwise returns false.
     * @access public
     * @param array $fields
     * @return string|boolean
     * @since 1.0.3
     * @throws Exception
     */

   
    
}