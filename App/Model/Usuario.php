<?php namespace App\Model;
use Exception;
use App\Core\Model as Model;

use App\Traits\authenticable;
use App\Model\Grupo;
use App\Helper\Auth;

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

    public $belongsTo = 'grupos';

    public $grupos = [];

    protected $fillable = [
        'nombre','apellido','email','username'
    ];

    protected $hidden = [
        'password'
    ];

   


    public function grupos()
    {
        return $this->with('grupo', $this);
    }

    

    public function permisos()
    {
        $grupos =[];
        foreach($this->grupos() as $k => $a)
        {
            $grupos[$k] = (Grupo::where(['id', $a->id]))->acciones();
        }
        if(count($grupos))
        {
            if(count($this->grupos) != count($grupos[0]))
                $this->grupos = $grupos[0];
            $this->grupos = array_unique($grupos[0], SORT_REGULAR);
            
        }
        return $this->grupos;
    }

    public function can($key)
    {
       
        foreach(self::permisos() as $permission)
        {
            
            if( $permission->clave === $key)
            return true;
        }
        return false;
    }

    public function assignGroup( array $groups)
    {
        foreach($groups as $groupToadd)
        {
            if(count($this->grupos() > 0))
            {
                $this->Db->insert('grupos_usuarios',['id_usuario' => $this->data()->id, 'id_grupo' => $groupToadd]);
            }
            else
            {
                
            foreach($this->grupos() as $selfgroups)
            {
                if($selfgroups->id != $groupToadd)
                {
                    $this->Db->insert('grupos_usuarios',['id_usuario' => $this->data()->id, 'id_grupo' => $groupToadd]);
                }
            }

            }
        }
       
    }
   

}