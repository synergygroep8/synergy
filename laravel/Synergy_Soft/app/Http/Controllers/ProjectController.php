<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
    }

    public function verifyDelete($id)
    {
        $project = Project::find($id);
        return view('projects.verifyDelete', compact('project'));
    }

    public function searchProject()
    {
        $keyword = Input::get('q');
        if ($keyword == "")
        {
            $projects = Project::all();

            return view('projects.list', compact('projects'));
        }
        $customer = Customer::where('id', $keyword)->first();

        $keyword = '%' . $keyword . '%';
        $customerN = Customer::where('companyName', 'like', $keyword)->first();
        $customerProjectName = array();
        $customerProjectID = array();
        $customerID = array();
        $customerName = array();

        $customerProjectID = Project::where('id', 'like', $keyword)->paginate(10);
        $customerProjectName = Project::where('projectName', 'like', $keyword)->paginate(10);
        if (count($customer) > 0) {
            $customerID = Project::where('Cid', $customer->id)->paginate(10);
        }
        if (count($customerN) > 0) {
            $customerName = Project::where('companyName', 'like', $customerN->companyName)->paginate(10);
        }

        return view ('searches.projectresults', compact('customerID', 'customerName', 'customerProjectName', 'customerProjectID'));
    }

    public function create()
    {

        $customers = Customer::all();


        return view ('projects/create')->with('customers',$customers);
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'cid'               => 'required',
            'projectName'       => 'required|min:4|max:190',
            'software'          => 'required',
            'hardware'          => 'required',
            'OS'                => 'required',
            'lastContact'       => 'required',
            'contactClient'     => 'required',
            'creditLimit'       => 'required',
        ]);
        if ($request->isMaintained == 'on')
        {
            $maintained = true;
        }else
        {
            $maintained = false;
        }


        $project = new Project();

        $project->cid           = $request->cid;
        $project->projectName   = $request->projectName;
        $project->software      = $request->software;
        $project->hardware      = $request->hardware;
        $project->OS            = $request->OS;
        $project->lastContact   = $request->lastContact;
        $project->contactClient = $request->contactClient;
        $project->creditLimit   = $request->creditLimit;
        $project->isMaintained  = $maintained;

        $project->save();


        return back();
    }

    public function edit($id)

    {
        $project = Project::find($id);

        return view('projects/edit')->with('project', $project);
    }

    public function put(Request $request, $id)
    {
        $this->validate($request,[

            'projectName'       => 'required|min:4|max:190',
            'software'          => 'required',
            'hardware'          => 'required',
            'OS'                => 'required',
            'lastContact'       => 'required',
            'contactClient'     => 'required',
            'creditLimit'       => 'required',
        ]);
        if ($request->isMaintained == 'on')
        {
            $maintained = true;
        }else
        {
            $maintained = false;
        }

        $project = Project::find($id);


        $project->projectName   = $request->projectName;
        $project->software      = $request->software;
        $project->hardware      = $request->hardware;
        $project->OS            = $request->OS;
        $project->lastContact   = $request->lastContact;
        $project->contactClient = $request->contactClient;
        $project->creditLimit   = $request->creditLimit;
        $project->isMaintained  = $maintained;

        $project->save();


        return redirect()->route('projectshow', $id);
    }


}
