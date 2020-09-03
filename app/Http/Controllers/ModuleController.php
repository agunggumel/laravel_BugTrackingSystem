<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modul;

class ModuleController extends Controller
{
    public function Module(){
        return view ('module');
    }

    public function postModule(Request $request){

        $data = new Modul();
        $data->Project_id = session()->get('Project_id');
        $data->Module_Name = $request->input('Module_Name');
        $data->Description = $request->input('Description');
        $data->save();

        return view('report');
    }


}
