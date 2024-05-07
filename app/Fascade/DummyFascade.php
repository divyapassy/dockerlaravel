<?php 
namespace App\Fascade;
use Illuminate\Support\Facades\Facade;

class DummyFascade extends Facade
{

    protected static function getFacadeAccessor(){
        return "dummy";
    }
}