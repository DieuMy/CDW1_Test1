<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Models\User;
use Illuminate\Support\MessageBag;
class UserController extends Controller
{
    public function show(){
        $users = User::all();
        return view('test',[
            'users' => $users
            ]);
    }
    public function create(){
        return view('register');
    }
    public function createuser(Request $request){
        $user = new User();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'username' => 'required',
            'tel' => 'required',
        ],[
            
        ]);

    
        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            // DB::table('users')->insert([
            //     'email'=>$request->email,
            //     'user_phone'=>$request->tel,
            //     'password'=>bcrypt($request->password),
            //     'user_name'=>$request->username,
            // ]);
            $user->insertUser($request->all());
            return redirect()->route('create')->with('success','Đăng ký thành công');
        }

    }
    public function login()
    {
        return view('login');
    }

    public function checklogin(Request $request)
    {      
         $validator = Validator::make($request->all(), [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ],
            [
        ]);

        if ($validator->fails()) {
             $errors = new MessageBag(['errorlogin' => "Email or Password wrong"]);
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            $data = User::getFirstUser_ByEmail($email);// $data = User::where('email',$email)->first();
            if(!$data)
            {
                $errors = new MessageBag(['errorlogin' => "Email or Password wrong"]);
                return redirect()->back()->withErrors($validator)->withInput();
            }else
            {
                if($data->user_active == 0)
            {
                $minute = round((time() - strtotime( $data->user_last_access))/60);
                if($minute <= 30)
                {
                    $errors = new MessageBag(['errorlogin' => "User blocked"]);
                    return redirect()->back()->withInput()->withErrors($errors);
                }else
                {
                    // DB::table('users')->where('email',$email)->update(['user_active' => 1, 'user_attempt' => 0, 'user_last_access' => date('Y-m-d H:i:s'),]);
                    User::updateActive($email);
                    return redirect()->back()->withInput();
                }
            }else
            {
                if(Auth::attempt(array('email'=>$email, 'password'=>$password))) {
                    Session::put('name',$data->user_name);
                    Session::put('login', TRUE);
                    // DB::table('users')
                    //     ->where('email', $email)
                    //     ->update(['user_attempt' => 0,
                    //         'user_last_access'=>date('Y-m-d H:i:s'), ]);
                    User::updateUser_Last_Attempt($email);
                    $a = Auth::user();
                    return view('/detail',compact('a'));
                } else {
                    // DB::table('users')
                    //     ->where('email',$email)
                    //     ->update(['user_attempt' => ($data->user_attempt)+1,
                    //         'user_last_access'=>date('Y-m-d H:i:s'),]);
                    User::updateUser_Last_Attempt2($email,$data);

                    if (($data->user_attempt)+1 > 3 )
                    {
                        // DB::table('users')
                        //     ->where('email', $email)
                        //     ->update(['user_active' => 0,
                        //         'user_last_access'=>date('Y-m-d H:i:s'),]);
                        User::updateUser_Last_Attempt($email);
                        $errors = new MessageBag(['errorlogin' => 'Tài khoản đã bị khóa']);
                        return redirect()->back()->withInput()->withErrors($errors);
                    }
                    $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }
            }
            
            
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function update($user_id)
    {
        $user = User::find($user_id)->toArray();
        return view('updateinfo',compact('user'));
    }

    public function edit(Request $request)
    {
        $user = User::find($request->userid);
        $user->user_name = $request->name;
        if($request->password == null)
        {
            $user->password = $user->password;
        }else
        {
            $user->password = bcrypt($request->password);
        } 
        $user->user_phone = $request->tel;
        $user->save();
        return redirect()->route('update',['user_id'=>$request->userid])->with(['message'=> 'Update Success']);
    }    
}