<?php namespace App\Core;

   use App\Helper\DB;
   
/**
 * Core Model:
 *
 * @author tomi rebot <tomas.devel@gmail.com>
 * @since 1.0.2
 */
class Model {
    /** @var Database An instance of the database class. */
    protected $Db = null;
    
    /** @var array The record from the database */
    protected $data = [];

    /**
     * Construct:
     * @access public
     * @since 1.0.2
     */
    public function __construct()
    {
        $this->Db = DB::getInstance();
    }

    public static function instance()
    {
        $class = get_called_class();
        return new $class;
    }


    public static function where( $params = []) 
    {
        $object = self::instance();
        $data = $object->Db->select($object->table, [$params[0], "=", $params[1]]);
        if($data->count())
        {
            $object->data = $data->first();
        }
        if ( $object->exists())
        {
            foreach($object->data() as $key => $value)
            {
                if(in_array($key, $object->fillable))
                {
                    $object->{$key} = $value;
                }
            }
            return $object;
        }
        return false;
    }

    public function with($linkedTable, $object)
    {
        
        return $this->Db->linkTo($linkedTable, $object);
    }
    

    public function create(array $fields) {
        
        $object = self::instance();
    
        if (!$modelId = $object->Db->insert($object->table , $fields))
        {
         return false;
        }
        
        return $object->where(['id', $modelId]);
    }


    public  function all()
    {
        $object = self::instance();
        
        return $object->Db->selectAllFrom($object->table);;
    }
    
    public function update(array $fields, $recordID = null) {
        
        if (!$recordID and $this->exists()) {
            $recordID = $this->data()->id;
        }

        if($this->Db->update($this->table, $recordID, $fields))
        {
            $modelName = explode('\\', get_class($this));
            return "se modifico correctamente el ".$modelName[2]; 
        }
        else return "No se pudo modificar";
        //return($this->Db->update($this->table, $recordID, $fields));
    }
    public function modelName()
    {
        $modelName = explode('\\', get_class($this));
        return strtolower($modelName[2]);
    }

    public function modelNamePlural()
    {
        $modelName = explode('\\', get_class($this));
        return strtolower($modelName[2].'s');
    }


    public function exists()
    {
        return(!empty($this->data));
    }

    public function data()
    {
        return($this->data);
    }

    public function toArray()
    {
        return json_decode(json_encode($this),true);
    }
   
}

?>