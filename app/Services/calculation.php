<?php


namespace App\Services;


use Illuminate\Support\Facades\Facade;

class calculation extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'calculationService';
    }
}
