@extends('layouts.app')

{{-- page title --}}
@section('title','Event manage')

@section('content')

    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="">Add Event</a></li>
               
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="h3 display">Add Image</h2>
                    </div>
                </div>

            </header>
            <div class="card">
                <div class="card-body p-4">
                    @if(session()->has('failed'))
                        <div class="alert alert-danger">
                            <button type="button" class="close custom-alert-close" data-dismiss="alert">×</button>
                            <span>{{ session()->get('failed') }}</span>
                        </div>
                    @endif
                    <form id="create_user" action="{{route('admin.event_create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="exampleInputname">Event Name</label>
                                 <input type="text" name="event_name" class="form-control"  placeholder="Enter Event name" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="exampleInputname">Event Description</label>
                                 <input type="text" name="event_description" class="form-control"  placeholder="Enter Event Description" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="exampleInputname">event start date</label>
                                <input type="date" name="event_start_date" class="form-control"  placeholder="Select date" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="exampleInputname">event_end_date</label>
                                <input type="date" name="event_end_date" class="form-control"  placeholder="Select date" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="exampleInputname">Type</label>
                                <select class="form-control" required name='event_recurrence_type'>
                                    <option value='1'>Single</option>
                                    <option value='2'>Daily</option>
                                    <option value='3'>Weekly</option>
                                    <option value='4'>Monthly</option>
                                    <option value='5'>Yearly</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2 pull-left">
                            <div class="col-sm-12 ">
                                <button class="btn btn-primary mr-2" type="submit" id="signUpCustomer">
                                    <i class="fa fa-arrow-circle-up"></i>
                                    Add
                                </button>
                                <button type="reset" class="btn btn-secondary  mb-1">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    <a href="{{route('admin.list_event')}}" class="text-white">Cancel</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
    });
</script>
@endsection




{{-- page scripts --}}
@section('page-script')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection


