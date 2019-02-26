<?php

namespace App\Http\Controllers;
use App\Http\Models\FlightList;
use App\Http\Models\CityList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FlightListController extends Controller
{
    
    public function showlistflight(Request $request){
        $flight_list = DB::table('flight_list')->where([
            ['flight_list_from', $request->from],
            ['flight_list_to', $request->to],
        ])
            ->get();
        $city_list = DB::table('city')->get();
        // dd($flight_list);
        return view('listflight', compact('flight_list', 'city_list'));
    }
}