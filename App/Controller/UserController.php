<?php namespace App\Controller;


use App\Core\BaseController as BaseController;
use App\Helper\Auth;
use App\Helper\Input;
use App\Helper\Redirect;
use App\Helper\Hash;
use App\Model\Grupo;
use App\Model\Usuario;



class UserController extends BaseController
{   



    public function create()
    {
        Auth::checkAuthenticated('../index');
        if(Auth::user()->can('crearUsuario'))
        {
            $grupos = Grupo::all();
            return $this->View->call('user/create', ['usuario'=>Auth::user(), 'grupos' => $grupos]);
        }else{
            return $this->View->call('user/sosory', ['usuario'=>Auth::user()]);

        }
    }
    public function store()
    {
        
        
        try
        {
            if(Input::post('formId') == 'usuarios')
            {
                $_POST['password'] =  Hash::make('tomi');
            $user = Usuario::create(Input::formSanatized(['formId','grupos']));
            }
                $user->assignGroup(Input::post('grupos'));
                Redirect::back('excelente, se creo el usuario');
        }
        catch (\Throwable $th)
        {
            //throw $th;
        }
        if(!$user){
            Redirect::back('lo siento, ese usuario ya existe');
        }


    }



}


