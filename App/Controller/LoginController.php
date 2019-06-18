<?php namespace App\Controller;


use App\Core\BaseController as BaseController;

class LoginController extends BaseController
{


    
    public function index()
    {
        $this->showLoginForm();
    }

    public function showLoginForm()
    {
        $this->View->call('loginForm');
    }


}