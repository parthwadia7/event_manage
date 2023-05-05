@extends('layouts.app')

{{-- page title --}}
@section('title','Parcel Delivery App')

@section('vendor-style')

@endsection
@section('content')
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home') }}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">Users Listing</li>
            </ul>
        </div>
    </div>
     

    <section>
        <div class="container-fluid">
            <header>
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="h3 display">Users Listing</h2>
                    </div>
                    
                   
                </div>
            </header>
            <!-- <div class="card">
                <div class="card-body p-4">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>From date:</td>
                                <td><input type="date" id="min" name="min"></td>
                                <td>To date:</td>
                                <td><input type="date" id="max" name="max"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <form>
                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                              
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                              
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                            <div class="col-md-2 mb-3">
                              <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
 -->

            
            <div class="card">

                <div class="card-body p-4">
                    <div class="table-responsive">
                    <table class="table" id="page-length-option">
                        <thead>
                        <tr>
                            <th class="column-title text-center">No</th>
                            <th class="column-title text-center">User Name</th>
                            <th class="column-title text-center">Email</th>
                            <th class="column-title text-center">Profile</th>
                           
                            <th class="column-title text-center">Status</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as  $key => $user)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$user->first_name.' '.$user->last_name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">
                                   @if(!empty($user->image))
                                   <img src="{{asset($user->path.'/'.$user->image)}}" alt="person" class="img-fluid rounded-circle" style="width: 50px;height:50px;">@else 
                                   <img src="{{asset('public/uploads/profile/client-image.png')}}" alt="person" class="img-fluid rounded-circle" style="width: 50px;height:50px;">
                                   @endif 


                                </td>
                               
                                <td class="text-center">
                                    @if($user->is_active == 1)
                                                <a href="#" class="p-2 bchoice" data-id="{{ $user->id.'__'.$user->is_active }}" title="InActive user account" d_status="Active">DeActive</a>
                                            @else
                                                <a href="#" class="p-2 bchoice" data-id="{{ $user->id.'__'.$user->is_active }}" title="Active user account" d_status="DeActive">Active</a>
                                    @endif
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
        $(document).ready(function () {
            $('#page-length-option').DataTable();

            $('.bchoice').on('click', function(){
                event.preventDefault();
                var set = $(this).attr("d_status");
                var id = $(this).data("id");
                // alert(id);
                var btn = 'btn-success';
                
                if(set == 'hidden'){
                    btn = 'btn-danger'; 
                }
                

                swal({
                        title: "Are you sure? ",
                        text: "You want to "+set+" this user account!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: btn,
                        confirmButtonText: "Yes, "+set+" it!",
                        closeOnConfirm: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "{{ route('admin.block_unblock_user') }}",
                                type: "post",
                                data: {
                                    "id": id
                                },
                                success: function (result) {
                                    
                                    swal({
                                        title: "User account has been "+set+"ed!",
                                        type: "success",
                                    }, function () {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    });
            });
        });

         

    </script>
    


@endsection
