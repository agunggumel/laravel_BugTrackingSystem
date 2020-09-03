<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modul;
use App\Cases;
use App\Report;
use App\Project;
use Carbon\Carbon;
use illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function report()
    {
        $reports = Modul::with('project')->get();

        // return view('report', ['Report' => $reports]);
        return view('report');
    }

    public function getReport()
    {
        $Modul = Modul::with('project')->select('id','Project_id', 'Module_Name', 'Description', 'created_at')->get();
        return DataTables::of($Modul)
            ->editColumn('created_at', function ($Modul){
                return Carbon::parse($Modul->created_at,'Asia/Jakarta')->format('d-m-Y');
            })

            ->editColumn('Project_id', function($Modul) {
               return $Modul->project ? $Modul->project->Project_Title : '';
            })

            ->addColumn('action', function ($Modul) {
                $result = '';
                $result .= '<a href="'.route('case.show',$Modul->id).'" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>';
                $result .= '<a href="'.route('module.delete',$Modul->id).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $result;
            })
            ->make(true);
    }

    public function show($id){

        $Modul = Project::findOrFail($id);
        return view('report',compact('Modul'),[
            'Project' => $Modul
        ]);
    }

    public function delete($id){
        $Modul = Modul::find($id);
        $Modul->delete();

        return redirect('report');
    }

    public function trashModule(){
        $Modul = Modul::onlyTrashed()->get();

        return view('trash', ['moduls' => $Modul]);
    }

    public function getTrash()
    {
        $Modul = Modul::onlyTrashed();
        return DataTables::of($Modul)
            ->editColumn('created_at', function ($Modul){
                return Carbon::parse($Modul->created_at,'Asia/Jakarta')->format('d-m-Y');
            })
            ->editColumn('Project_id', function($Modul) {
                return $Modul->project->name;
            })

            ->addColumn('action', function ($Modul) {
                $result = '';
                $result .= '<a href="'.route('report.restore',$Modul->id).'" class="btn btn-success btn-sm"><i class="fa fa-trash-restore"></i></a>';
                $result .= '<a href="'.route('report.deleted',$Modul->id).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $result;
            })
            ->make(true);
    }

    public function restore($id){
        $Modul = Modul::onlyTrashed()->where('id',$id);
    	$Modul->restore();
    	return redirect('report');
    }

    public function deleted($id){
        $Modul = Modul::onlyTrashed()->where('id',$id);
    	$Modul->forceDelete();

    	return redirect('trash');
    }

}
