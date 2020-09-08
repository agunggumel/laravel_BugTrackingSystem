@extends('layouts.master')

@section('content')
        <div class="container mt-5">
            <form action="{{route('project.update', $file->id)}}" method="post" enctype="multipart/form-data">
                <h3 class="text-center mb-5">Silakan Update Project Anda</h3>
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
                    <label>Owner Name</label>
                    <input type="text" name="Owner_Name" class="form-control" value="{{old('Owner_Name') ?? $file->Owner_Name}}" readonly>
                </div>

                <div class="form-group">
                    <label>Project Title</label>
                    <input type="text" name="Project_Title" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="Description" class="form-control" >
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                    Update Project
                </button>
            </form>
        </div>

@endsection
