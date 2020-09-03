<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DataTables;

class ProjectController extends Controller
{
    public function Project(){
        return view ('project');
    }

    public function ProjectReport(){
        return view ('reportproject');
    }

    public function postProject(Request $request){

        $data = new Project();
        $data->Project_Title = $request->input('Project_Title');
        $data->Owner_Name = $request->input('Owner_Name');
        $data->Description = $request->input('Description');
        //$data->roles_id = DB::table('master')->select('id')->where('level','admin')->first();
        $data->save();
        if (Project::count() == 1) {
            session()->put('Project_id', $data->id);
        }
        return view('report');
    }

    public function getReportProject()
    {
        $data = Project::select('id','Project_Title', 'Owner_Name', 'Description');
        return DataTables::of($data)
        ->addColumn('action', function ($data) {
            $result = '';
            $result .= '<a href="'.route('report.show',$data->id).'" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>';
            return $result;
        })
        ->make(true);

    }

    public function show($id){

        $Modul = Project::findOrFail($id);
        return view('module',compact('modul'),[
            'Project' => $Modul
        ]);
    }

    //session
    public function selectProject($id) {
        if ($id) {
            session()->put('Project_id', $id);

        }
        return redirect('report');
    }

    public function selectModul($id) {
        if ($id) {
            session()->put('Modul_id', $id);

        }
        return redirect('reportcase');
    }
}
