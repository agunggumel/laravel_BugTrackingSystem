@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Project') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('postProject')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__(' Project Title' )}}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('Project Title') is-invalid @enderror" name="Project_Title" value="{{ old('Project Title') }}" required autocomplete="Project Title" autofocus>

                                @error('Project Title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="Owner Name" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }}</label>

                            <div class="col-md-6">
                                <input id="Owner Name" type="text" class="form-control @error('Owner') is-invalid @enderror" name="Owner_Name" value="{{ old('Owner Name') }}" required autocomplete="Owner Name">

                                @error('Owner Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control @error('role') is-invalid @enderror" name="Description" value="{{ old('Description') }}" required autocomplete="Description">

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