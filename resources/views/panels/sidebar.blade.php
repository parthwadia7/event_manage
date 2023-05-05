<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex ">
            <!-- User Info-->
           @if(Auth::user()->role_id == 1)
                <?php
                $image = Auth::user()->path."/".Auth::user()->image;

                ?>
            <a href="{{url('/admin/dashboard')}}">
                <div class="sidenav-header-inner text-center">@if(!empty(Auth::user()->image))<img src="{{asset($image)}}" alt="person" class="img-fluid rounded-circle">@else <img src="{{asset('public/uploads/profile/client-image.png')}}" alt="person" class="img-fluid rounded-circle">@endif
                          <h2 class="h5">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h2><span>Administrator</span>
                       </div>
           </a>
           @else
            <?php
                $image = Auth::user()->path."/".Auth::user()->image;

                ?>
            <a href="{{url('/vendor/dashboard')}}">
                <div class="sidenav-header-inner text-center">@if(!empty(Auth::user()->image))<img src="{{asset($image)}}" alt="pe" class="img-fluid rounded-circle">@else <img src="{{asset('public/uploads/profile/admin-image.jpg')}}" alt="persontest" class="img-fluid rounded-circle">@endif
                          <h2 class="h5">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h2>
                       </div>
           </a>

           @endif
        </div>

        <!-- Sidebar Navigation Menus-->

        <div class="main-menu">
           @if(Auth::user()->role_id == 1)
                
            @endif
        </div>
    </div>
</nav>
