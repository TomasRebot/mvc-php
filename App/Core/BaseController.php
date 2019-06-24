<?php namespace App\Core;

use App\Helper\Session;

class BaseController
{
    protected $View = null;

    public function __construct()
    {
        $this->View = New View;
    }

}