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
    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => 'logout']);
    // }
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
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
            DB::table('users')->insert([
                'user_email'=>$request->email,
                'user_phone'=>$request->tel,
                'password'=>bcrypt($request->password),
                'user_name'=>$request->username,
            ]);
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
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if(Auth::attempt(array('user_email'=>$email, 'password'=>$password))) {
                Session::put('name', Auth::user()->user_name);
                Session::put('login', TRUE);
                return redirect()->intended('/detail');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}


// public function postLogin(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'email' => 'required|email',
//             'password' => 'required|min:6'
//         ],
//             [
//                 'email.required' => 'Email là trường bắt buộc',
//                 'email.email' => 'Email không đúng định dạng',
//                 'password.required' => 'Mật khẩu là trường bắt buộc',
//                 'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
//             ]);

//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator)->withInput();
//         } else {
//             $email = $request->input('email');
//             $password = $request->input('password');

//             $data = Users::where('email', $email)->first();
//             if ($data) {
//                 if (Hash::check($password, $data->password)) {
//                     Session::put('name', $data->first_name);
//                     Session::put('login', TRUE);
//                     return redirect()->intended('/');
//                 }
//             } else {
//                 $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
//                 return redirect()->back()->withInput()->withErrors($errors);
//             }
//         }
//     }