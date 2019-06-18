<?php namespace App\Core;

use App\Helper;

class BaseController
{
    protected $View = null;

    public function __construct()
    {

        Helper\Session::init();

        $this->View = New View;
    }

   
    
}