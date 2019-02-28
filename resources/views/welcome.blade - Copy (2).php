<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/26/2019
 * Time: 7:59 AM
 */

namespace App\Http\Controllers;

use App\Http\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }
    public function postRegister(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'tel' => 'required',
            'password' => 'required|min:6',
            'name' => 'required',
        ],
            [
    //                'email.required'=>'email không được bỏ trống',
    //                'tel.required'=>'Phone không được bỏ trống',
    //                'password.required'=>'password không được bỏ trống',
    //                'name.required'=>'name không được bỏ trống',
            ]);
        if($validator->fails()){
            // dd($validator->errors());
            return redirect()->route('register')->withErrors($validator);
        }
        else{
            DB::table('users')->insert([
                'email'=>$request->email,
                'phone'=>$request->tel,
                'password'=>bcrypt($request->password),
                'first_name'=>$request->name,
                'register_time'=>date('Y-m-d H:i:s'),
            ]);
            return redirect()->route('register')->with('success','Đăng ký thành công');
        }
    }

    public function editInfor(){

        $edtInfors = DB::table('users')->where([
            ['email', Session::get('email')],
        ])->get();
        return view('edit_infor', compact('edtInfors'));
    }

    public function post_editInfor(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => '',
            'phone'=>'',
            'address'=>''
        ],
            [

            ]);

        if($validator->fails()){
            return redirect()->route('edt-inf')->withErrors($validator);
        }
        else{
            $user = Users::where('email', Session::get('email'))->first();
            if ($request->password == null){
                $pass = $user->pass;
            }
            else{
                $pass = $request->password;
            }
            DB::table('users')->update([
                'address'=>$request->address,
                'phone'=>$request->tel,
                'password'=>bcrypt($pass),
                'first_name'=>$request->name,
            ]);
            return redirect()->route('edt-inf')->with('success','Đăng ký thành công');
        }
    }



    public function login(){
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],
            [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            $data = Users::where('email', $email)->first();

            if ($data->active == 0){
                $minutes = round((time() - strtotime( $data->last_access))/60);
                if ($minutes <= 30) {
                    $errors = new MessageBag(['errorlogin' => 'Tài khoản đã bị khóa']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }else{
                    DB::table('users')
                        ->where('email', $email)
                        ->update(['active' => 1,
                            'attempt' => 0,
                            'last_access'=>date('Y-m-d H:i:s'), ]);
                    return redirect()->back()->withInput();
                }
            }else {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    Session::put('name', $data->first_name);
                    Session::put('email', $data->email);
                    Session::put('login', TRUE);
                    DB::table('users')
                        ->where('email', $email)
                        ->update(['attempt' => 0,
                            'last_access'=>date('Y-m-d H:i:s'), ]);
                    return redirect()->intended('/');
                }else {
                    DB::table('users')
                        ->where('email', $email)
                        ->update(['attempt' => ($data->attempt)+1,
                            'last_access'=>date('Y-m-d H:i:s'),]);

                    if (($data->attempt)+1 > 3 )
                    {
                        DB::table('users')
                            ->where('email', $email)
                            ->update(['active' => 0,
                                'last_access'=>date('Y-m-d H:i:s'),]);
                        return redirect()->back()->withInput();
                    }
                    $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }

            }
        }
    }


    public function logout(){
        Auth::logout();
        Session::put('login', FALSE);
        return redirect()->route('log_in');
    }

}