<?php 
    namespace App\Http\Models;
    use Illuminate\Database\Eloquent\Model;
    use \Illuminate\Auth\Authenticatable;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    class User extends Model{
        protected $table = 'users';
        protected $primaryKey = 'user_id';
        protected $guarded = [];
        use Authenticatable;

        public function insertUser($data)
        {
        	User::insert([
        		'email'=>$data['email'],
        		'user_phone'=>$data['tel'],
        		'password'=>bcrypt($data['password']),
        		'user_name'=>$data['username'],
        	]);
        }
    }