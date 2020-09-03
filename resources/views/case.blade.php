@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Test Case') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('postCase')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__(' Case Name' )}}</label>
                            <div class="col-md-6">
                                <input id="Case_Name" name = "Case_Name" type="text" class="form-control @error('Case Name') is-invalid @enderror" name="Case_Name" value="{{ session()->has('Project_id') ? \App\Project::find(session()->get('Project_id'))->Project_Title : 'Project'}}" required autocomplete="Case Name" autofocus>

                                @error('Case Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Bug Priority" class="col-md-4 col-form-label text-md-right">{{ __('Bug Priority') }}</label>

                            <div class="col-md-6">
                                    <!-- split buttons box -->
                                <select name = "Bug_Priority">
                                    <option value ="0">Bug Priority</option>
                                    <option value ="Emergency">Emergency</option>
                                    <option value ="Urgent">Urgent</option>
                                    <option value ="Standard">Standard</option>
                                    <option value ="Normal">Normal</option>

                                </select>

                                @error('Bug Priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Bug Priority" class="col-md-4 col-form-label text-md-right">{{ __('Bug Status') }}</label>

                            <div class="col-md-6">
                                    <!-- split buttons box -->
                                    <select name = "Bug_Status">
                                    <option value ="0">Bug Status</option>
                                    <option value ="Not Started">Not Started</option>
                                    <option value ="In Progress">In Progress</option>
                                    <option value ="Finished">Finished</option>

                                </select>

                                @error('Bug Priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                         <div class="form-group row">

                            <label for="Bug" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">

                                <input id="Des_case" name = "Des_case" type="text" class="form-control @error('Des_case') is-invalid @enderror" name="Des_case" value="{{ old('Des_case') }}" required autocomplete="Des_case" autofocus>

                                @error('Des_case')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>



                        <div class="custom-file">

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <br>
                        <br>
                        <div class="form-group row mb-0">
                            <input type="file" name="featured_image" id="featured_image" class="form-control"><br>
                            <button type="submit" class="btn btn-dark form-control">Upload Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
