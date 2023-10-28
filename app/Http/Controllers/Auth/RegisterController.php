<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data = session()->username();
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $rules = [
                'username' => 'required|max:12|min:4',
                'email'=> 'required|email|max:12|min:4|unique:users,mail',
                'password' => 'required|max:12|min:4|confirmed|unique:users,password',
                'password_confirmation' =>'required|min:4',
            ];
            $messages = [
                'username.required'=> 'ユーザーネームを入力してください。',
                'username.min'=> '名前は:4文字以上で入力してください。',
                'username.max' => '名前は12文字以内で入力してください',

                'email.required'=> 'メールアドレスを入力してください。',
                'email.email'=> '正しいメールアドレスを入力してください。',
                'email.min'=> 'アドレスは4文字以上で入力してください。',
                'email.max' => 'アドレスは12文字以内で入力してください。',
                'email.unique'=> '既に登録済みのメールアドレスです。',


                'password.required'=> 'パスワードを入力してください。',
                'password.max'=> 'パスワードは文12以内で入力してください',
                'password.min'=> 'パスワードは4文字以上で入力してください。',
                'password.unique'=> '既に登録済みのパスワードです。',

                'password_confirmation.required'=> '確認用のパスワードを入力してください。',
                'password_confirmation.confirmed'=> '設定したパスワードと同じパスワードを入力してください',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
            }
            // $this->create($data);
            return redirect('added');
        }
        return view('auth.register');
    }

      public function added(Request $request){
        $username = $request->input('username');
        return view('auth.added', ['username'=>$username]);
    }
}
