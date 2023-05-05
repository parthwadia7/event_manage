@extends('layouts.app')

{{-- page title --}}
@section('title','Event manage')

@section('vendor-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')

    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="">Edit Category</a></li>
               
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="h3 display">Edit Category</h2>
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
                    <form id="create_user" action="{{route('admin.event_update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type='hidden' value='{{$event->id}}' name='id'>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="exampleInputname">Event Name</label>
                                 <input type="text" name="event_name" class="form-control" value='{{$event->event_name}}'  placeholder="Enter Event name" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="exampleInputname">Event Description</label>
                                 <input type="text" name="event_description" class="form-control" value='{{$event->event_description}}'  placeholder="Enter Event Description" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="exampleInputname">event start date</label>
                                <input type="date" name="event_start_date" class="form-control" value='{{$event->event_start_date}}'  placeholder="Select date" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="exampleInputname">event end date</label>
                                <input type="date" name="event_end_date" class="form-control" value='{{$event->event_end_date}}' placeholder="Select date" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label for="exampleInputname">Type</label>
                                <select class="form-control" required name='event_recurrence_type'>
                                    @if($event->event_recurrence_type == 1)
                                        <option value='1' selected>Single</option>
                                    @else
                                        <option value='1'>Single</option>
                                    @endif
                                    @if($event->event_recurrence_type == 2)
                                        <option value='2' selected>Daily</option>
                                    @else
                                        <option value='2'>Daily</option>
                                    @endif
                                    @if($event->event_recurrence_type == 3)
                                        <option value='3' selected>Weekly</option>
                                    @else
                                        <option value='3'>Weekly</option>
                                    @endif
                                    @if($event->event_recurrence_type == 4)
                                        <option value='4' selected >Monthly</option>
                                    @else
                                        <option value='4'>Monthly</option>
                                    @endif
                                    @if($event->event_recurrence_type == 5)
                                        <option value='5' selected >Yearly</option>
                                    @else
                                        <option value='5'>Yearly</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2 pull-left">
                            <div class="col-sm-12 ">
                                <button class="btn btn-primary mr-2" type="submit" id="">
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


@endsection




{{-- page scripts --}}
@section('page-script')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.add1', function () {
        var count = 1;
        let increament = document.getElementsByName("color_code[]").length;
        dynamic_field(count);
        function dynamic_field(number) {
            var html = '<div class="row p-3">';
            html += '<label class="mr-2" for="exampleInputname">Color name</label>';
            html += '<div class="form-group col-sm-12 col-md-2">';
            html += '<input type="text" name="color_name[]" class="form-control"  placeholder="Enter Color name" required>';
            html += '</div>';
            html += '<div class="form-group col-sm-12 col-md-2">';
            html += '<input type="color" name="color_code[]" class="form-control" required value="##ffffff">';
            html += '</div>';
            html += '<div class="col-md-2 form-group">' +
                '<button type="button" name="remove" class="btn btn-danger remove"><i class="fa fa-trash"></i></button>';
            html += '</div>';
            html += '</div>';
            $('.color').append(html);
        }
        increament++;
    });
    $(document).on('click', '.remove', function () {
        $(this).closest('.row').remove();
    });


    $(document).ready(function () {
    });
</script>

@endsection


