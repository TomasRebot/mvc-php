<?php namespace App\Controller;

use App\Helper\Session;
use App\Helper\DB;
use App\Core\BaseController as BaseController;
use App\Model\Usuario;
use App\Helper\Input;
use App\Helper\Redirect;
use App\Helper\Auth;

class LoginController extends BaseController
{

    
    protected $redirect ='../index/panel';

    public function index()
    {
        Auth::checkUnauthenticated();
        $this->showLoginForm();
    }

    public function showLoginForm()
    {
        $this->View->call('login');
    }
    public function attemptlogin()
    {
        (Usuario::where(['username', Input::post("username")])->login()) ? self::redirectIfAuthenticated(): false;
    }
    public function redirectIfAuthenticated()
    {
        Redirect::to($this->redirect);
    }



}