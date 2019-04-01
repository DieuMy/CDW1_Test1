<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    class CityList extends Model{
        protected $table = 'city';
        protected $primaryKey = 'city_id';
        public function showCity()
        {
        	// return CityList::join('airport','city.airport_id','=','airport.airport_id')->where('city.airport_id','!=',null)->get();
        	//return CityList::where('airport_id', '!=' , null)->get();
            return CityList::join('airport','city.city_id','=','airport.city_id')->where('airport.city_id','!=',null)->get();
        }

        public function airport()
        {
            return $this->hasOne('App\Http\Models\Airport','city_id');
        }


        public function showAirport()
      	{
      		return CityList::join('airport','city.airport_id','=','airport.airport_id')->where('city.airport_id','!=',null)->get('airport.airport_name');
      	}

       
    }