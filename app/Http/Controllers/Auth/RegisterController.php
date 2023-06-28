<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        request()->validate([
            'name' => ['required', 'between:3,255'],
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'photo_id' => 'required',
        ],
            [
                'name.required' => 'Name is required',
                'email.between' => 'Email is required',
                'password.required' => 'Password is required',
                'password_confirmation.required' => 'You need to confirm your password',
                'photo_id.required' => 'You have to upload a profile picture',
            ]);
        $role = Role::where('name', 'customer')->first();
        $photo = null;

        if ($file = request()->file("photo_id")) {
            $path = $file->store("users");
            $photo = Photo::create(["file" => $path]);
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'photo_id' => $photo ? $photo->id : null,
            'password' => Hash::make($data['password']),
            'is_active' => 1,
        ]);

        $user->roles()->attach($role->id);
        return $user;
    }
}
