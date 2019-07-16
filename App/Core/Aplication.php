<?php  namespace App\Core;

use Exception;
use ReflectionClass;
use ReflectionMethod;
use App\Helper\Input;
use App\Helper\Hash;
use App\Helper\Redirect;
use App\Model\Usuario;
use App\Model\Grupo;


class Aplication 
{
    /** @var mixed El controlador por defecto. */

    private $_clase = DEFAULT_CONTROLLER;

    /** @var string El metodo del controlador por defecto. */

    private $_metodo = DEFAULT_CONTROLLER_ACTION;

    /** @var array Parametros de url. */

    private $_parametros = [];

    public function __construct()
    {
        // Grupo::create([
        //     'nombre' => 'Gestores de acciones',
        //     'descripcion' => 'Los usuarios asignados pueden ',
        // ]);
        
        $this->_parseURL();
        try {
            $this->_getClass();
            $this->_getMethod();
            $this->_getParams();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Get Class: checkea si el primer elemento del url existe y no esta vacio,
     * reemplazando la clase controladora por defecto,
     * 
     * @access private
     * @return void
     * @throws Exception
     */
    private function _getClass() 
    {
        if (isset($this->_parametros[0]) && !empty($this->_parametros[0]))
        {
            $this->_clase = CONTROLLER_PATH . ucfirst(strtolower($this->_parametros[0]) .'Controller');
            unset($this->_parametros[0]);
        }
        if (!class_exists($this->_clase))
        {
            Redirect::to(REDIRECT_BASE_PATH);
            throw new Exception("El controlador {$this->_clase} No existe!");
        }
       $this->_clase = New $this->_clase;
    }

    /**
     * Get Class: checkea si el primer elemento del url existe y no esta vacio,
     * reemplazando la clase controladora por defecto,
     * 
     * @access private
     * @return void
     * @throws Exception
     */
    private function _getMethod() {
        if (isset($this->_parametros[1]) && !empty($this->_parametros[1])) {
            $this->_metodo = $this->_parametros[1];
            unset($this->_parametros[1]);
        }
        // Verificar si existe el metodo.
            
        if (!(new ReflectionClass($this->_clase))->hasMethod($this->_metodo)) {

            
            throw new Exception("The controller method {$this->_metodo} does not exist!");
        }
        //  Verificar si el metodo es publico.
        if (!(new ReflectionMethod($this->_clase, $this->_metodo))->isPublic()) {
            throw new Exception("The controller method {$this->_metodo} is not accessible!");
        }
    }

    /**
     * Get Class: checkea si el primer elemento del url existe y no esta vacio,
     * reemplazando la clase controladora por defecto,
     * 
     * @access private
     * @return void
     * @throws Exception
     */
    private function _getParams() {
        
        $this->_parametros = $this->_parametros ? array_values($this->_parametros) : [];
    }

    /**
     * parseURL:filtra la url de entrada para dar respuestas
     * 
     * @access private
     * @return void
     * @throws Exception
     */
    private function _parseURL()
    {
        if (($url = Input::get("url"))) {
            $this->_parametros = explode("/", filter_var(rtrim($url, "/"), FILTER_SANITIZE_URL));
        }
    }


     /**
     * Run: Llama al controlador, con sus metodos y parametros
     * @access private
     * @return void

     */
    public function run()
    {
        call_user_func_array([$this->_clase, $this->_metodo], $this->_parametros);
    }
}
