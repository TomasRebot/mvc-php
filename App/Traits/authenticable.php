<?php namespace App\Traits;
use App\Helper\Redirect;
use App\Helper\Session;
use App\Helper\Hash;
use App\Helper\Input;

trait authenticable
{
    
    

    public function login()
    {
        if(!isset($this->username))
        {
            return Redirect::back('El usuario no existe');
        }
        if(hash::compare(Input::post('password'), $this))
        {
            Session::init();
            $this->status = 1;
            Session::put('usuario', $this->data()->id);
            return $this;
        }
        else {
            Redirect::back('El password no coincide');
        }
    }
    

}