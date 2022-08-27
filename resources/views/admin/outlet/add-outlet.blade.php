@extends('admin.master')

@section('title')
    Add Outlet
@endsection

@section('body')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="font-strong">Add Outlet</h4>
                        </div>
                        <div class="card-body">
                            @if($message = Session::get('message'))
                                @section('toast')
                                    toastr.success('{{$message}}');
                                @endsection
                            @endif
                            <form action="{{ route('new-outlet') }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="col-form-label col-md-3 text-right">Phone* : </label>
                                    <div class="col-md-9">
                                        <input type="number" name="phone" class="form-control" value="{{ old('phone') }}"/>
                                    </div>
                                </div>
                                <span class="text-danger">
                                            @error('phone')
                                            *{{ $message }}
                                    @enderror
                                        </span>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 text-right">Latitude* : </label>
                                    <div class="col-md-9">
                                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}"/>
                                        <span class="text-danger">
                                            @error('latitude')
                                            *{{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 text-right">Longitude* : </label>
                                    <div class="col-md-9">
                                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}"/>
                                        <span class="text-danger">
                                            @error('longitude')
                                            *{{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 text-right">Image* : </label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file" value="{{ old('Image') }}"/>
                                        <span class="text-danger">
                                            @error('Image')
                                            *{{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Create New Outlet"/>
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


