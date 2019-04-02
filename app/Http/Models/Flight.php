<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Session;
    class Flight extends Model{
        protected $table = 'flight_details';
        protected $primaryKey = 'id';

        public function org()
        {
    	   return $this->belongsTo('App\Http\Models\Orgs', 'org_id');
        }

        public function seeDetail($a)
        {
            return Flight::findOrFail($a);
        }

        public static function searchFlight($request)
        {
            return Flight::where([
                ['from', $request->from],
                ['to', $request->to],
                ['time_start','>=',$request->departure],
                ['flight_type',$request->flight_type],

                ])
                ->leftJoin('orgs','flight_details.org_id','=','orgs.id')
                ->get();
                // Session::put('time',$request->departure);   
        }

        public static function getPrice($km)
        {
            $price = 0;

            if (0 <= $km && $km <= 100) {
                $price = 500000;
            } else if (101 <= $km && $km <= 200) {
                $price = 1000000;
            } else if (201 <= $km && $km <= 500) {
                $price = 2000000;
            } else if (501 <= $km && $km <= 1000) {
                $price = 3000000;
            } else if (1001 <= $km && $km <= 2000) {
                $price = 6000000;
            } else if (2001 <= $km && $km <= 5000) {
                $price = 20000000;
            } else if ($km >= 5001) {
                $price = 30000000;
            }
            return $price;
        }


        public function createFlight($data)
        {
            Flight::insert([
                    'from' => $data['from'],
                    'to' => $data['to'],
                    'org_id' => $data['org'],
                    'time_start' => $data['departure'],
                    'time_end' => $data['end'],
                    'time_return' => $data['date_return'],
                    'flight_type' => $data['flight_type'],
                    'total' => $data['total'],
                    'code' => $data['code'], 
                    'price' => $data['price'], 
                ]);
        }

         public static function check_noidia($city1, $city2){
        $city1 = CityList::find($city1);
        $city2 = CityList::find($city2);

        if ($city1->nation_id == $city2->nation_id){
            return true;
        }
        return false;
    }
    public static function check_org_noidia($city1, $city2, $org_id){
        $city1 = CityList::find($city1);
        $city2 = CityList::find($city2);

        $nation_org_id = Orgs::find($org_id)->nation_id;

        if ($city1->nation_id == $city2->nation_id && $city1->nation_id == $nation_org_id){
            return true;
        }
        return false;
    }

    public static function check_international($city1, $city2){
        $city1 = CityList::find($city1);
        $city2 = CityList::find($city2);

        $nation1 = $city1->nation_id;
        $nation2 = $city2->nation_id;

        $country = Nation::find($nation1)->country_id;

        $country_arr = explode(',', $country);

        if (in_array($nation2, $country_arr)){
            return true;
        }
        return false;
    }
    }