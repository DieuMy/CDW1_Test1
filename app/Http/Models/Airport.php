<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    class AirPort extends Model{
        protected $table = 'airport';
        protected $primaryKey = 'airport_id';
        
        public function city()
        {
            return $this->belongsTo('App\Http\Models\CityList','city_id');
        }


    }