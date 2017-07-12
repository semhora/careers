<?php

namespace App\Http\Controllers\Auth;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegister()
    {
        if( \Auth::check() ) {
            return redirect('panel');
        }
        return view('auth.user.index');
    }

    public function getRegisterAd()
    {
        return view('auth.user.ad');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];

        $messages = [
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatória',

            'email.email' => 'Isira um e-mail válido',
            'email.unique' => 'Esse e-mail já existe',

            'password.min' => 'Senha deve conter pelo menos 6 caracteres',
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    public function register(Request $request)
    {
        $data = $request->all();

        $type = $data['type'];

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt( $data['password'] );
        $user->role = (isset($data['type']) ? $data['type'] : 'user');

        $validator = $this->validator( $data );

        if( $validator->fails() ) {
            $redirect = ($type == 'user' ? 'register': 'anunc');
            return redirect( $redirect )
                ->withErrors($validator)
                ->withInput();
        } else {
            if( $user->save() ) {
                if( $request->hasFile( 'img' ) ) {
                    $user->avatar()->create( \App\Helpers\Files::get( $request->file('img') ) );
                }
                $profile = new Profile();
                $profile->fields = json_encode($data['fields']);

                if( $user->profile()->save( $profile ) ) {
                    if( \Auth::attempt([
                        'email' => $data['email'],
                        'password' => $data['password']
                    ] ) ) {
                        session()->flash('success', 'Bem vindo!');
                        return redirect('panel');
                    } else {
                        session()->flash('error', 'Não foi possível fazer o login.');
                        return redirect('login');
                    }
                } else {
                    session()->flash('error', 'Não foi possível criar o perfil.');
                    return redirect('login');
                }
            } else {
                session()->flash('error', 'Não foi possível se registrar.');
                return redirect('login');
            }
        }
    }

    public function fields()
    {
        return [
            'birth' => '',
            'genre' => '',
            'cpf' => '',
            'phone' => '',
            'address' => '',
            'cep' => '',
            'bairro' => '',
            'city' => '',
            'state' => '',
            'news' => '',
            'categories' => ''
        ];
    }

    public function fieldsAd()
    {
        return [
            'razao' => '',
            'cnpj' => ''
        ];
    }
}
