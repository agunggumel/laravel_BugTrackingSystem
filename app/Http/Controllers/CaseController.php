<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;
use App\Modul;
use DataTables;
use App\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CaseController extends Controller
{
    public function Case(){
        $reports = Cases::with('module')->get();
        return view ('case');
    }

    public function reportcase(){
        $reports = Cases::with('module')->get();

        return view('reportcase');
    }


    public function getReportCase()
    {
        $Cases = Cases::with('module')->select('id', 'Modul_id', 'Des_case', 'Case_Name', 'Bug_Priority', 'Bug_Status', 'file_path');
        return DataTables::of($Cases)
        ->addColumn('action', function ($Cases) {
            $result = '';
            $result .= '<a target="_blank" href="'.asset(Storage::url($Cases->file_path)).'" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>';
            $result .= '<a href="'.route('Case.edit',$Cases->id).'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>';
            $result .= '<a href="'.route('Case.delete',$Cases->id).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            return $result;
        })
        ->make(true);

    }
    public function postCase(Request $request){

        $this->validate($request, [
            'featured_image' => 'mimes:jpeg, png, jpg|max:7000'
        ]);

        $data = new Cases();

        if($request->file()){
            $FileName = time().'_'.$request->featured_image->getClientOriginalName();
            $filePath = $request->file('featured_image')->storeAs('uploads',$FileName, 'public');

            $data->file_path = $filePath;

        }

        $data->Case_Name = $request->input('Case_Name');
        $data->Bug_Priority = $request->input('Bug_Priority');
        $data->Des_case = $request->input('Des_case');
        $data->Bug_Status = $request->input('Bug_Status');
        //$data->roles_id = DB::table('master')->select('id')->where('level','admin')->first();
        $data->save();
        return view('reportcase');
    }
    public function show($id){

        $Case = Modul::findOrFail($id);
        return view('reportcase',compact('Case'),[
            'Case' => $Case
        ]);
    }

    public function delete($id){
        $Case = Cases::find($id);
        $Case->delete();

        return back();
    }

    public function trash(){
        $Case = Cases::onlyTrashed()->get();

        return view('trashCase', ['Case' => $Case]);
    }

    public function getTrashCase()
    {
        $Cases = Cases::onlyTrashed();
        return DataTables::of($Cases)
        ->addColumn('action', function ($Cases) {
            $result = '';
            $result .= '<a href="'.route('Case.restore',$Cases->id).'" class="btn btn-success btn-sm"><i class="fa fa-trash-restore"></i></a>';
            $result .= '<a href="'.route('Case.delete',$Cases->id).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            return $result;
        })
        ->make(true);

    }

    public function restore($id){
        $Cases = Cases::onlyTrashed()->where('id',$id);
    	$Cases->restore();
    	return view('reportcase');
    }



    //edit

    public function edit($id)
    {
    $Cases = Cases::findOrFail($id);
         return view('edit', compact('Cases'), [
             'Cases' => $Cases
        ]);
    }

     public function update(Request $request, $id)
     {
        $this->validate($request, [
            'featured_image' => 'mimes:jpeg, png, jpg|max:7000'
        ]);

        $Cases = Cases::findOrFail($id);

        if($request->file()){
            $FileName = time().'_'.$request->featured_image->getClientOriginalName();
            $filePath = $request->file('featured_image')->storeAs('uploads',$FileName, 'public');

            $Cases->file_path = $filePath;

        }

        $Cases->Case_Name = $request->Case_Name;
        $Cases->Bug_Priority = $request->Bug_Priority;
        $Cases->Bug_Status = $request->Bug_Status;
        $Cases->Des_case = $request->input('Des_case');
        //$data->roles_id = DB::table('master')->select('id')->where('level','admin')->first();
        $Cases->save();
        return view('reportcase');

     }

}
