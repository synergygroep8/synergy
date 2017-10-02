<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getLogin()
    {
        return view('login');
    }

    public function getRegister()
    {
        return view('register');
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function getDashboard(Request $request)
    {
        switch (Auth::user()->department)
        {
            case 0:
                return view('dashboards.admin-dash');
                break;
            case 1:
                return view('dashboards.finance-dash');
                break;
        }
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']]))
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:tbl_users',
            'password' => 'required|max:120',
            'department' => 'required'
        ]);

        $username = $request['username'];
        $password = bcrypt($request['password']);
        $department = $request['department'];

        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->department = $department;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
