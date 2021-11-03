@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Module') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('postModule')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__(' Module Name' )}}</label>
                            <div class="col-md-6">
                                <input id="Module Name" type="text" class="form-control @error('Module Name') is-invalid @enderror" name="Module_Name" value="{{ old('Module Name') }}" required autocomplete="Module Name" autofocus>

                                @error('Module Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Project_id" class="col-md-4 col-form-label text-md-right">{{__('Project Title' )}}</label>
                            <div class="col-md-6">
                                <input id="Project_id" type="text" class="form-control @error('Project_id') is-invalid @enderror" name="Project_id" required autocomplete="Project_id" value="{{ session()->has('Project_id') ? \App\Project::find(session()->get('Project_id'))->Project_Title : 'Project'}}" disabled>

                                @error('Project Title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}" required autocomplete="Description">

                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
