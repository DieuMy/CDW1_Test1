<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    class AirPort extends Model{
        protected $table = 'airport';
        protected $primaryKey = 'airport_id';
        
        public function city()
        {
            return $this->hasOne('App\Http\Models\CityList','airport_id');
        }

    }