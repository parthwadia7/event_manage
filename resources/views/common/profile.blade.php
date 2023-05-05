@extends('layouts.app')

{{-- page title --}}
@section('title','Event manage')

@section('vendor-style')

@endsection


@section('content')

    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>

                <li class="breadcrumb-item">Profile</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-4">
                    <header>
                        <div class="row">
                            <div class="col-md-7">
                            @if(session()->has('success'))
                                <div class="alert alert-success" id="successMessage">
                                     <p style="color:green;"> {{ session()->get('success') }}</p>
                                </div>
                              @endif
                            </div>
                        </div>

                    </header>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="card-alert card gradient-45deg-red-pink">
                                <div class="card-content white-text">
                                    <p>
                                        <i class="material-icons">error</i>{{ $error }}
                                    </p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    <form id="create_user" action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="question">First Name</label>
                                <input type="text" name="first_name"  value='{{$get_data->first_name}}' class="form-control" required> 
                            </div>
                             <div class="form-group col-sm-12 col-md-4">
                                <label for="question">Last Name</label>
                                <input type="text" name="last_name"  value='{{$get_data->last_name}}' class="form-control" required>
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label for="question">Email</label>
                                    <input type="email" name="email" value='{{$get_data->email}}' class="form-control" readonly>
                            </div>
                            <div class="form-group col-sm-12 col-md-5">
                                <label for="answer">Profile </label>
                                  <input type="file" name="avatar"  class="form-control">

                                  <img src="{{asset($get_data->path.'/'.$get_data->image)}}" alt="Image" style="width:60px;height:60px;">

                            </div>



                        </div>
                            <div class="row mt-4 pull-right">
                            <div class="col-sm-12 ">
                                <button class="btn btn-primary mr-2" type="submit">
                                    <i class="fa fa-save"></i>
                                    Save
                                </button>
                                <button type="reset" class="btn btn-secondary  mb-1">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    <a href="{{url()->previous()}}" class="text-white">Cancel</a>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection




{{-- page scripts --}}
@section('page-script')


@endsection



