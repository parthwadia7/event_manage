@extends('layouts.app')

{{-- page title --}}
@section('title','Event manage')

@section('vendor-style')

@endsection
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                
                <li class="breadcrumb-item active">Event Listing</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="h3 display">Event Listing</h2>
                    </div>
                    <div class="col-md-5">
                       <a class="btn btn-primary pull-right rounded-pill" href="{{route('admin.event_add')}}">Add Eent</a>
                    </div>
                    <div class="col-md-7">
                            @if(session()->has('success'))
                                <div class="alert alert-success" id="successMessage">
                                     <p style="color:green;"> {{ session()->get('success') }}</p>
                                </div>
                              @endif
                    </div>
                   
                </div>
            </header>
            
            <div class="card">

                <div class="card-body p-4">
                    <div class="table-responsive">
                    <table class="table" id="page-length-option">
                        <thead>
                        <tr>
                            <th class="column-title text-center">No</th>
                            <th class="column-title text-center">Event name</th>
                            <th class="column-title text-center">Type</th>
                            <th class="column-title text-center">Status</th>
                            <th class="column-title text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as  $key => $vend)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$vend->event_name}}</td>
                                <td class="text-center">
                                    @if($vend->event_recurrence_type == 1)
                                        Single
                                    @elseif($vend->event_recurrence_type == 2)
                                        Daily
                                    @elseif($vend->event_recurrence_type == 3)
                                        Weekly
                                    @elseif($vend->event_recurrence_type == 4)
                                        Monthly
                                    @else
                                        Yearly
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($vend->status == 1)
                                        Enable
                                    @else
                                        Disable
                                    @endif
                                </td>
                                <td class ="ml-4">
                                    <a href="{{ route('admin.event_edit', $vend->id) }}" class="p-2"><i class="fa fa-edit fa-fw fa-sm"></i></a> 
                                    <a href="#" class="p-2 delete-record-click" data-id="{{$vend->id }}"><span class="fa fa-trash fa-fw fa-sm"></span></a>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </section>

@endsection


{{-- page script --}}
@section('page-script')
 <script>
    $(document).ready(function() {
        $('#page-length-option').DataTable();
        $('.delete-record-click').click(function () {
           var id = $(this).data("id");
             
             swal({
                    title: "Are you sure? ",
                    text: "You will not be able to recover this record!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                   function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "/admin/event-delete",
                            type: "get",
                            data: {
                                "id": id
                            },
                            success: function (result) {
                                // alert(result);
                                if (result == 'error') {
                                    swal({
                                        title: "event cannot be deleted as listed under it!",
                                        type: "warning",
                                        showCancelButton: true,
                                        showConfirmButton: false,
                                    }, function () {
                                        location.reload();
                                    });
                                } else {
                                    swal({
                                        title: "event has been deleted!",
                                        type: "success",
                                    }, function () {
                                        location.reload();
                                    });
                                }

                            }
                        });
                    }
                });

        });
    });
</script>

@endsection
