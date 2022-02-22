<?php


namespace Oh86\Test\Controller;


use Illuminate\Http\Request;

class TestController
{
    public function v2(Request $request)
    {
        dd("v2", $request->all());
    }

    public function v3(Request $request)
    {
        dd("v3", $request->all());
    }
}