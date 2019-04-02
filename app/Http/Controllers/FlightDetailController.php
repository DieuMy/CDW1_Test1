<?php

namespace App\Http\Controllers;

use App\FlightDetail;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\FlightList;
use App\Http\Models\CityList;
use App\Http\Models\Flight;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Orgs;
use App\Http\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightDetailController extends Controller
{
    public function showlistflight(Request $request){
                $city_lists = new CityList();                
                $flights = Flight::searchFlight($request);
                $city_list = $city_lists->showCity(); 
                foreach($flights as $a)
                {
                    $a = $a->Km;
                };
                $price = Flight::getPrice($a);
                return view('listflight', compact('flights', 'city_list','price'));
        
        }

    public function flight_detail($id){
        $a = new Flight();
        $q = $a->seeDetail($id);
        $a = $q->Km;
        $price = Flight::getPrice($a);
        $city = CityList::all();
        return view('flightdetail',compact('q','city','price'));
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
         $orgs = Orgs::all();
        return view('createflight', compact('citys','orgs'));
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
                if(Flight::check_org_noidia($city1,$city2,$org)){
                     $flight->createFlight($request->all());
                     return redirect()->route('createflight')->with('success','Tạo chuyến bay nội địa thành công');
                }else
                {
                    return redirect()->route('createflight')->with('error','Không thành công');
                }
            }else if(Flight::check_international($city1,$city2))
            {
                $flight->createFlight($request->all());
                     return redirect()->route('createflight')->with('success','Tạo chuyến bay quốc tế thành công');
            }else
            {
                return redirect()->route('createflight')->with('error','Hai quốc gia này không thể bay trực tiếp');
            }
            $flight->createFlight($request->all());
            return redirect()->route('createflight')->with('success','Đăng ký thành công');
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
