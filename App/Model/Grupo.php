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
class Grupo extends Model
{
    use authenticable;

    
    protected $table = 'grupos';
    
    public $belongsTo = 'acciones';


    protected $fillable = [
       'id',
       'descripcion',
       'nombre',
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

    public function acciones()
    {
        return $this->with('accion', $this);
    }
    
    
}