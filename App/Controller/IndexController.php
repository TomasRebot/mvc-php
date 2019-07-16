<?php namespace App\Controller;


use App\Core\BaseController as BaseController;
use App\Helper\Auth;
use App\Model\Grupo;
class IndexController extends BaseController
{   

    public function index()
    {
        return $this->View->call('index', []);
    }

    public function panel()
    {
        Auth::checkAuthenticated('../login');
        $grupos = [];
        foreach (Auth::user()->grupos() as $grupo)
        {
            if($grupo->id == 1)
            {
                $grupos[0] = Grupo::where(['id', $grupo->id]);
                break;
            }
            array_push($grupos,Grupo::where(['id', $grupo->id]));
        }
        return $this->View->call('panel', ['usuario' => Auth::user(), 'grupos' => $grupos]);
    }

}


