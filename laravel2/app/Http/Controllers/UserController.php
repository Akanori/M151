<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function createUser()
    {
        $request = request();
        $user = new \App\Models\User;

        if (isset($request)) {
            $user->lastname = $request->lastname;
            $user->firstname = $request->firstname;
            $user->email = $request->email;
            $user->telephonenumber = $request->telephonenumber;
            $user->street = $request->street;
            $user->housenumber = $request->housenumber;
            $user->zipcode = $request->zipcode;
            $user->city = $request->city;
            $user->password = $request->password;
            $confPassword = $request->confPassword;

            if ($user->password == $confPassword) {
                $user->password = password_hash($user->password, PASSWORD_DEFAULT);
                $insert = $user->save();
                if ($insert) {
                    return redirect('/products');
                }
            }
        }
        dump("Login failed!");
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser()
    {
        $request = request();

        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password)) {

            $request->session()->put('userId', $user->id);
            return redirect('/products');
        } else {
            dump("Login failed!");
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/products');
    }
    public function profile()
    {
        if (session()->has('userId')) {
            $id = session()->get('userId');
            $user = \App\Models\User::find($id);
            $orders = \App\Models\Order::where('fk_user_id', $id);
            return view('profile',['orders' => $orders, 'user' => $user]);
        } else {
            return redirect('/products');
        }
    }
}
