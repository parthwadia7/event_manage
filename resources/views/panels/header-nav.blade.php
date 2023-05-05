<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a id="toggle-btn" data-bs-toggle href="#" class="menu-btn">
                        <i class="fa fa-bars fa-2x"> </i>
                    </a>
                    <a href="#" class="navbar-brand">
                        <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Event manage
                            </strong></div>
                    </a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    
                <!-- Log out-->
                    <li class="nav-item">
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                            <span class="d-none d-sm-inline-block">Logout</span>
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    {{--    //logout modal--}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    @if(Auth::user()->role_id == '2')
                        <a href="{{url('vendor/logout')}}"><button type="button" class="btn btn-primary">Logout</button>
                        </a>
                    @else
                        <a href="{{url('admin/logout')}}"><button type="button" class="btn btn-primary">Logout</button>
                        </a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
