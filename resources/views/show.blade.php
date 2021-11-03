@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item">Document</li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container mt-5">

            <form action="#" enctype="multipart/form-data">
                <h3 class="text-center mb-5"></h3>
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" name="Project_id" class="form-control"
                           value="{{ session()->has('Project_id') ? \App\Project::find(session()->get('Project_id'))->Project_Title : 'Project'}}" readonly>
                </div>
                <div class="form-group">
                    <label>Module Name</label>
                    <input type="text" name="Modul_id" class="form-control"
                           value="{{old('Modul_id') ?? $Cases->module->Module_Name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Case Name </label>
                    <input type="text" name="Case_Name" class="form-control"
                           value="{{old('Case_Name') ?? $Cases->Case_Name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="Des_case" class="form-control"
                           value="{{old('Des_case') ?? $Cases->Des_case }}" readonly>
                </div>
                <div class="form-group">
                    <label>Bug Priority</label>
                    <input type="text" name="Bug_Priority" class="form-control"
                           value="{{old('Bug_Priority') ?? $Cases->Bug_Priority }}" readonly>
                </div>
                <div class="form-group">
                    <label>Bug Status</label>
                    <input type="text" name="Bug_Status" class="form-control"
                           value="{{old('Bug_Status') ?? $Cases->Bug_Status }}" readonly>
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="text" name="namaFile" class="form-control"
                           value="{{old('namaFile') ?? $Cases->namaFile }}" readonly>
                </div>
                <center>
                    <div class="panel-body">
                    <div class="panel-footer">
                        <img width="300" src="{{asset(\Illuminate\Support\Facades\Storage::url($Cases->file_path))}}" alt="image">
                        {{ $Cases->updated_at }}
                    </div>
                </div> </center>
            </form>
        </div>
    </section>
@endsection
