<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DataTables;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function profile(){
        $user = User::all();
        return view('profile',['users' => $user]);
    }

    public function getProfile(){
        $user = user::select('id','name','email','role','created_at');
        return DataTables::of($user)
            ->editColumn('created_at', function ($file){
                return Carbon::parse($file->created_at,'Asia/Jakarta')->format('d-m-Y');
            })
            ->addColumn('action', function ($user) {
                $result = '';
                if (auth()->user()->id != $user->id) {
                    $result .= '<a href="' . route('profile.delete', $user->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> &nbsp';
                }
                return $result;
            })

            ->make(true);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('profile');
    }

    public function getTrash(){
        $user = User::onlyTrashed();
        return DataTables::of($user)
            ->editColumn('created_at', function ($file){
                return Carbon::parse($file->created_at,'Asia/Jakarta')->format('d-m-Y');
            })
            ->addColumn('action', function ($user){
                $result = '';
                $result .= '<a href="' .route('profile.restore', $user->id) . ' " class="btn btn-success btn-sm"><i class="fa fa-trash-restore"></i></a>';
                return $result;
            })
        ->make(true);
    }

    public function trash(){
        $user = User::onlyTrashed()->get();
        return view('trashProfile', ['users' => $user]);
    }

    public function restore($id){
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();
        return redirect('profile');
    }
}
