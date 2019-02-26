<?php

namespace App\Http\Controllers;
use App\Http\Models\CityList;
class IndexController extends Controller
{
    public function index(){

       $city = CityList::all();
        return view('index');
    }
    public function showCityList(){
        $citys = CityList::all();
        return view('index',[
            'citys' => $citys
            ]);
    }
}