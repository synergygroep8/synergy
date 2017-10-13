<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
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
