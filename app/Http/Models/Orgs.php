<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    class Orgs extends Model{
        protected $table = 'orgs';
        protected $primaryKey = 'id';
        
        public function flights()
        {
            return $this->hasMany('App\Http\Models\Flight','org_id');
        }

        public function showOrg_Nation()
        {
        	 return Orgs::join('nation','nation.nation_id','=','orgs.nation_id')->get();
        }
    }