<?php

namespace App\Http\Controllers;

use App\FlightDetail;
use App\Http\Models\FlightList;
use App\Http\Models\CityList;
use App\Http\Models\Flight;
use App\Http\Models\Orgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightDetailController extends Controller
{
    public function showlistflight(Request $request){
                $city_lists = new CityList();
                // $flights = DB::table('flight_details')->where([
                // ['from', $request->from],
                // ['to', $request->to],
                // ['time_start','>=',$request->departure],
                // ['flight_type',$request->flight_type],

                // ])
                // ->leftJoin('orgs','flight_details.org_id','=','orgs.id')
                // ->get();
                $flights = Flight::searchFlight($request);
                 $city_list = $city_lists->showCity(); 
                // $city_list = DB::table('city')->get();
                // dd($flight_list);
                return view('listflight', compact('flights', 'city_list'));
        
        }

    public function flight_detail($id){
        $a = new Flight();
        $q = $a->seeDetail($id);
        $city = CityList::all();
        // $s = new Orgs();
        // $s::find($id);
        //dd($s::find($id)->flights);
        return view('flightdetail',compact('q','city'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function show(FlightDetail $flightDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightDetail $flightDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightDetail $flightDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightDetail $flightDetail)
    {
        //
    }
}
