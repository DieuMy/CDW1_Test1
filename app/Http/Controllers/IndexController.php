<?php

namespace App\Http\Controllers;
use App\Http\Models\CityList;
class IndexController extends Controller
{
    public function index(){
        $citys = CityList::all();
        return view('index',[
            'citys' => $citys
            ]);
    }
}