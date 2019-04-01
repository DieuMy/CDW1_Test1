<?php

namespace App\Http\Controllers;

use App\FlightDetail;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\FlightList;
use App\Http\Models\CityList;
use App\Http\Models\Flight;
use App\Http\Models\Orgs;
use App\Http\Models\Airport;
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
        return view('flightdetail',compact('q','city'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFlight()
    {
         $citys = CityList::all();
         //$city_list = $city_lists->showAirport(); 
         $orgs = Orgs::all();
        return view('createflight', compact('citys','orgs'));
        //return view('createflight');
    }

    public function create_flight(Request $request)
    {
        $flight = new Flight();
        $validator = Validator::make($request->all(),[
            'from' => 'required',
            'to' => 'required',
            'org' => 'required',
            'departure' => 'required',
            'end' => 'required',
            'date_return' => 'required',
            'flight_type' => 'required',
            'total' => 'required|numeric',
            'code' => 'required',
            'price' => 'required|numeric',
            ],[
                'total.numeric' => 'Nhập số field Total Person!!!',
                'price.numeric' => 'Nhập số field Price!!!'
            ]);

        if ($validator->fails()) {
            return redirect('createflight')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $city1 = $request->from;
            $city2 = $request->to;
            $org = $request->org;
            if(Flight::check_noidia($city1,$city2))
            {
                //if(Flight::check_org_noidia($city1,$city2,$org)){
                     $flight->createFlight($request->all());
                     return redirect()->route('createflight')->with('success','Tạo chuyến bay nội địa thành công');
                //}else
                //{
                    return redirect()->route('createflight')->with('error','Không thành công');
                //}
            }else if(Flight::check_international($city1,$city2))
            {
                $flight->createFlight($request->all());
                     return redirect()->route('createflight')->with('success','Tạo chuyến bay quốc tế thành công');
            }else
            {
                return redirect()->route('createflight')->with('error','Hai quốc gia này không thể bay trực tiếp');
            }
            // $flight->createFlight($request->all());
            // return redirect()->route('createflight')->with('success','Đăng ký thành công');
        }
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
