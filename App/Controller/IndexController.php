<?php namespace App\Controller;


use App\Core\BaseController as BaseController;

class IndexController extends BaseController
{   

    public function index()
    {
        $data = [
            'nombre' => 'tomas',
            'apellido'=> 'rebot'
        ];
        $this->View->call('index', $data);
    }

}


