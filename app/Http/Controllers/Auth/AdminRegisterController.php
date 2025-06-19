<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // $admin = $this->create($request->all());
        // Auth::guard('admin')->login($admin);

        event(new Registered($admin = $this->create($request->all())));
        // Auth::guard('admin')->login($admin);
        Auth::login($admin);
        return redirect('/dashboard');

    }

    // Validation rules
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Name is required',
            'email.unique' => 'This email is already taken',
            'password.confirmed' => 'Passwords do not match',
        ]);
    }

    // Create admin
    protected function create(array $data)
    {
        return Admin::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
