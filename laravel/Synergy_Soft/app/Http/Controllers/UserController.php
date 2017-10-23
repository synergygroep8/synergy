<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'department' => 'required',
            'password1' => 'required|min:3',
            'password2' => 'required|same:password1|min:3'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->department = $request->department;
        $user->password = bcrypt($request->password1);

        $user->save();

        return back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function put(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:tbl_users',
            'username' => 'required',
            'department' => 'required',
            'password1' => 'required|min:3',
            'password2' => 'required|same:password1|min:3'
        ]);

        $user = User::find($request->id);
        $user->username = $request->username;
        $user->department = $request->department;
        $user->password = bcrypt($request->password1);

        $user->save();

        return back();
    }

    public function searchUsers()
    {
        $keyword = Input::get('q');
        if ($keyword == "")
        {
            return redirect()->back();
        }
        $keyword = '%' . $keyword . '%';
        $userID = User::where('id', 'like',$keyword)->get();

        $userName = User::where('username', 'like', $keyword)->get();

        return view('searches.userresults', compact('userID', 'userName'));
    }

    public function getDashboard(Request $request)
    {
        switch (Auth::user()->department)
        {
            case 0:
                $openInvoices = Invoice::where('paid', '0')->paginate(10);
                $closedInvoices = Invoice::where('paid', '1')->paginate(10);
                $companies  = Customer::paginate(10);
                $users = User::all();
                $projects   = Project::paginate(10);
                $projectsTest = \App\Project::with('customer')->get();
                return view('dashboards.admin-dash', compact('openInvoices', 'closedInvoices', 'users', 'projects', 'projectsTest'))->with('companies',$companies);
                break;
            case 1:

                //$openInvoices = Invoice::with('project')->with('project.customer');
                $openInvoices = Invoice::where('paid', '0')->paginate(10);
                $closedInvoices = Invoice::where('paid', '1')->paginate(10);
                $companies  = Customer::paginate(10);
                $projects   = Project::paginate(10);
                //return $openInvoices[0]->project->customer;
                return view('dashboards.finance-dash', compact('openInvoices', 'closedInvoices', 'companies', 'projects'));
                break;

            case 2:
//                $openProject = Project::where('paid', '0')->get();
//                $closedProject = Project::where('paid', '1')->get();
                $companies  = Customer::paginate(10);
                $projects   = Project::paginate(10);
                return view('dashboards.sales-dash', compact('openProjects', 'closedProjects', 'projects'))->with('companies',$companies);
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
