<?php

namespace App\Http\Controllers;

use App\Http\Models\Airport;
use App\Http\Models\CityList;
use Illuminate\Http\Request;

class AirPortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Airport::all();
        return view('listairport',compact('a'));
    }
}
