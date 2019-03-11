<?php

namespace App\Http\Controllers;
use App\Http\Models\CityList;
use App\Http\Models\Nation;
class IndexController extends Controller
{
    public function index(){
        $city = new CityList();
        $citys = $city->showCity();
        return view('index',[
            'citys' => $citys,
            ]);
    }
}