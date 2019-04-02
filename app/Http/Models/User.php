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

        public static function getFirstUser_ByEmail($email){
            return User::where('email',$email)->first();
        }

        public static function updateActive($email)
        {
             User::where('email',$email)->update(['user_active' => 1, 'user_attempt' => 0, 'user_last_access' => date('Y-m-d H:i:s'),]);
        }

        public static function updateUser_Last_Attempt($email){
             User::where('email',$email)->update(['user_active' => 0,
                            'user_last_access'=>date('Y-m-d H:i:s'), ]);
        }


         public static function updateUser_Last_Attempt2($email,$data){
             User::where('email',$email)->update(['user_attempt' => $data+1,
                            'user_last_access'=>date('Y-m-d H:i:s'),]);
        }
    }