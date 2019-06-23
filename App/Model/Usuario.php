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
    protected $fillable = [
        'nombre','apellido','email','username'
    ];

    protected $hidden = [
        'password'
    ];
    
    public function createUser(array $fields) {
        if (!$userId = $this->create("usuarios", $fields)) {
           echo "se rompio creando el usuario en usuario modelo,";
        }
        return $userId;
    }
    /**
     * Get Instance: Returns an instance of the User model if the specified user
     * exists in the database. 
     * @access public
     * @param string $user
     * @return User|null
     * @since 1.0.2
     */
    public static function where($params) {
        $usuario = new Usuario();
        if ($usuario->findUser($params)->exists())
        {
            foreach($usuario->data() as $key => $value)
            {
                if(in_array($key, $usuario->fillable))
                {
                    $usuario->{$key} = $value;
                }
            }
            return $usuario;
        }
        return $usuario;
    }
    /**
     * Find User: Retrieves and stores a specified user record from the database
     * into a class property. Returns true if the record was found, or false if
     * not.
     * @access public
     * @param string $user
     * @return boolean
     * @since 1.0.3
     */
    public function findUser($params) {
        
        //$field = (filter_var($usuario, FILTER_VALIDATE_EMAIL)) ? "email" : (is_numeric($usuario) ? "id" : "nombre");
        //
        return($this->find("usuarios", [$params[0], "=", $params[1]]));
    }
    
    
    /**
     * Update User: Updates a specified user record in the database.
     * @access public
     * @param array $fields
     * @param integer $userId [optional]
     * @return void
     * @since 1.0.3
     * @throws Exception
     */
    public function updateUser(array $fields, $userId = null) {
        if (!$this->update("usuarios", $fields, $userId)) {
            echo "se rompio en updateUser";
        }
    }
}