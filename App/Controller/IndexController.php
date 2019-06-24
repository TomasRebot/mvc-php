<?php namespace App\Controller;


use App\Core\BaseController as BaseController;
use App\Helper\Auth;

class IndexController extends BaseController
{   

   
    public function index()
    {
        return $this->View->call('index');
    }

    public function panel()
    {
        Auth::checkAuthenticated();
        return $this->View->call('panel', Auth::user()->toArray());
    }

}


