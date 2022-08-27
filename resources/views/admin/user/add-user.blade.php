@extends('admin.master')

@section('title')
    Add User
@endsection

@section('body')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="font-strong">Add User</h4>
                        </div>
                        <div class="card-body">
                            @if($message = Session::get('message'))
                                @section('toast')
                                    toastr.success('{{$message}}');
                                @endsection
                            @endif
                            <form action="{{ route('new-user') }}" method="POST" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 text-right">Name* : </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                        <span class="text-danger">
                                            @error('name')
                                            *{{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 text-right">Email* : </label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 text-right">Password* : </label>
                                    <div class="col-md-9">
                                        <input type="text" name="password" class="form-control" value="{{ old('password') }}"/>
                                        <span class="text-danger">
                                            @error('password')
                                            *{{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Create New User"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

