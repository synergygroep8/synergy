<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Project;
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
                $openInvoices = Invoice::where('paid', '0')->get();
                $closedInvoices = Invoice::where('paid', '1')->get();
                $companies  = Customer::paginate(10);
                return view('dashboards.admin-dash', compact('openInvoices', 'closedInvoices'))->with('companies',$companies);
                break;
            case 1:

                //$openInvoices = Invoice::with('project')->with('project.customer');
                $openInvoices = Invoice::where('paid', '0')->get();
                $closedInvoices = Invoice::where('paid', '1')->get();
                $companies  = Customer::paginate(10);
                //return $openInvoices[0]->project->customer;
                return view('dashboards.finance-dash', compact('openInvoices', 'closedInvoices', 'companies'));
                break;

            case 2:
//                $openProject = Project::where('paid', '0')->get();
//                $closedProject = Project::where('paid', '1')->get();
                $companies  = Customer::paginate(10);
                return view('dashboards.sales-dash', compact('openProjects', 'closedProjects'))->with('companies',$companies);
                break;

                ///Default
            default:
                return response("404 not found", 404);
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
