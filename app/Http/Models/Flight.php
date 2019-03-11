<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
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
    }