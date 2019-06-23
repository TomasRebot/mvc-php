<?php namespace App\Core;
use App\Helper\Session;


class View
{

    protected $titulo;

    protected $object;

    protected $errores = [];
    /**
     * addData: mapea y agrega atributos dinamicos, clave valor del array que le pasan
     * preferentemente recibir json
     * @access public
     * @param array $data [preferent key=>falue]
     * @return void
     */
    public function addData(array $data)
    {
        foreach ($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }
    /**
     * getFile: Buscar e incluir una vez el archivo html de la vista
     * @access public
     * @param string $filepath [nombre de la vista a incluir]
     * @return void
     */

    public function getFile($filepath)
    {
 
        $filename = VIEW_PATH . $filepath . ".php";
        if (file_exists($filename))
        {
            include_once $filename;
        }
    }

 
    /**
     * call: armar la vista completa, con footer y header,
     * @access public
     * @param string $filepath [nombre la vista a incluir]
     * @param array $data [clave => valor]
     * @return void
     */
    public function call($filepath, array $data = [])
    {
        
        $this->addData($data);
        $this->getFile(DEFAULT_HEADER_PATH);
        $this->getFile($filepath);
        $this->getFile(DEFAULT_FOOTER_PATH);
    }
    /**
     * callWithoutPartials: armar la vista SIN  footer y header,
     * @access public
     * @param string $filepath [nombre la vista a incluir]
     * @param array $data [clave => valor]
     * @return void
     */
    public function callWithoutPartials($filepath, array $data = [])
    {
        $this->addData($data);
        $this->getFile($filepath);
    }
    
    public function component($component)
    {

        $path = VIEW_PATH . 'components/'. $component .'.php';
        
        if(file_exists($path))
        {
            include_once $path;
        }
    }

    public function errores()
    {
        $this->errores = Session::get('errorbag');
        if(is_array(Session::get('errorbag')))
        {
            foreach(Session::get('errorbag') as $indice =>$error)
            $this->errores[$indice] = $error;
        }
        return $this->errores;
    }
    public static function clean($messages = 'errorbag')
    {
        Session::forget($messages);
    }



}