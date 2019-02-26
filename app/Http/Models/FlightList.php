<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    class FlightList extends Model{
        protected $table = 'flight_list';
        protected $primaryKey = 'flight_list_id';
    }