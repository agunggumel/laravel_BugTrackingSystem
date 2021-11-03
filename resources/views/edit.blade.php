@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Test Case') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('Case.update', $Cases->id)}}" enctype="multipart/form-data">
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
                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{__(' Case Name' )}}</label>
                                <div class="col-md-6">
                                    <input id="Case_Name" name="Case_Name" type="text"
                                           class="form-control @error('Case Name') is-invalid @enderror"
                                           name="Case_Name" value="{{ old('Case_Name') ?? $Cases->Case_Name }}" required
                                           autocomplete="Case Name" autofocus readonly>

                                    @error('Case Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{__(' Bug Priority' )}}</label>
                                <div class="col-md-6">
                                    <input type="text" name="Bug_Priority" class="form-control"
                                           value="{{old('Bug_Priority') ?? $Cases->Bug_Priority}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Bug Priority"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Bug Status') }}</label>

                                <div class="col-md-6">
                                    <!-- split buttons box -->
                                    <select name="Bug_Status">
                                        <option value="0">Select Bug Status</option>
                                        <option value="Not Started">Not Started</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Finished">Finished</option>

                                    </select>

                                    @error('Bug Priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">

                                <label for="Bug"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">

                                    <input id="Des_case" name="Des_case" type="text"
                                           class="form-control @error('Des_case') is-invalid @enderror" name="Des_case"
                                           value="{{ old('Des_case') ?? $Cases->Des_case }}" required
                                           autocomplete="Des_case" autofocus readonly>

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
                                <input type="text" name="namaFile" class="form-control"
                                       value="{{old('namaFile') ?? $Cases->namaFile}}" readonly>
                                <br>
                                @if(auth()->user()->role == 'admin')
                                    <div class="custom-file">
                                       <!-- <input type="file" name="file" class="form-control-sidebar">-->
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-dark form-control">Upload Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
