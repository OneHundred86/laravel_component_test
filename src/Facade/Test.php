<?php


namespace Oh86\Test\Facade;


use Illuminate\Support\Facades\Facade;

class Test extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "test";
    }
}