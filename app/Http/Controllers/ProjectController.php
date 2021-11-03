<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Project;
use DataTables;

class ProjectController extends Controller
{
    public function Project()
    {
        return view('project');
    }

    public function ProjectReport()
    {
        return view('reportproject');
    }

    public function postProject(Request $request)
    {

        $data = new Project();
        $data->Project_Title = $request->input('Project_Title');
        $data->Owner_Name = $request->input('Owner_Name');
        $data->Description = $request->input('Description');
        //$data->roles_id = DB::table('master')->select('id')->where('level','admin')->first();
        $data->save();

        //sessdion if
        if (Project::count() == 1) {
            session()->put('Project_id', $data->id);
        }
        return view('reportproject');
    }

    public function getReportProject()
    {
        $data = Project::select('id', 'Project_Title', 'Owner_Name', 'Description');
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $result = '';
                $result .= '<a href="' . route('report.show', $data->id) . '" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a> &nbsp';
                if (Auth::user()->role=='admin') {
                    $result .= '<a href="' . route('project.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> &nbsp';
                }
                return $result;
            })
            ->make(true);

    }

    public function show($id)
    {

        $Modul = Project::findOrFail($id);
        return view('module', compact('modul'), [
            'Project' => $Modul
        ]);
    }


    public function selectProject($id)
    {
        if ($id) {
            session()->put('Project_id', $id);

        }
        return view('report');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Project_Title' => 'required',
            'Owner_Name' => 'required',
            'Description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $file = Project::findOrFail($id);

        $file->Project_Title = $request->Project_Title;
        $file->Owner_Name = $request->Owner_Name;
        $file->Description = $request->Description;

        $file->save();

        return redirect('/project/report');

    }
    public function edit($id)
    {
        $file = Project::findOrFail($id);
        return view('editproject', compact('file'), [
            'Project' => $file
        ]);
    }
}
