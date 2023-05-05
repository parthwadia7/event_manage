<html class="loading" lang="en">
    <!-- BEGIN: Head-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <title>@yield('title') |Event manage</title>
        <link rel="apple-touch-icon" href="{{asset('images/favicon/apple-touch-icon-152x152.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon/favicon-32x32.png')}}">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <!-- Fontastic Custom icon font-->
        <link rel="stylesheet" href="{{asset('css/fontastic.css')}}">
        <!-- Google fonts - Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <!-- jQuery Circle-->
        <link rel="stylesheet" href="{{asset('css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
        <!-- Custom Scrollbar-->
        <link rel="stylesheet" href="{{asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.blue.css')}}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
        <style>
            body {
                background-repeat: no-repeat;
                background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
            }

        </style>
    </head>
    <!-- END: Head-->
    <body>
        <section>
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-sm-12 col-md-6 text-center">
                        <div class="card shadow-lg p-3 mb-5 rounded" >
                            <div class="card-header"><h3>Vendor Register</h3></div>
                            <div class="card-body">
                                <form method="POST" id='form' action="{{ route('admin.singup_create') }}">
                                    @csrf
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            <button type="button" class="close custom-alert-close" data-dismiss="alert">×</button>
                                            <span>{{ session()->get('error') }}</span>
                                        </div>
                                    @endif
                                    <div class="col-md-8 offset-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="first_name" class="pull-left">{{ __('First Name') }}</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name" class="pull-left">{{ __('Last Name') }}</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile" class="pull-left">{{ __('Mobile Number') }}</label>
                                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile" autofocus>
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="pull-left">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="pull-left">{{ __('Password') }}</label>
                                            <input  type="password" id='password' class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password" class="pull-left">{{ __('Confirm Password') }}</label>
                                            <input  type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="confirm_password">
                                            @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="row mt-4 pull-right">
                                            <div class="col-sm-12 ">
                                                <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" type="submit" name="action">
                                                    <i class="fa fa-login"></i>
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                    <p class="text-inverse text-center">Have already an account? <a href="{{ route('admin.login') }}" data-abc="true">Login</a></p>
                                <br>
                                    <p class="text-inverse text-center"><a href="{{ route('admin.forgot_pass') }}" data-abc="true">Forgot Your Password?</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
        <script>
            $().ready(function () {
                $.validator.addMethod("strongePassword", function(value) {
                    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
                },"The password must contain at least 1 number, at least 1 lower case letter, and at least 1 upper case letter"); 
                $("#form").validate({
                    // in 'rules' user have to specify all the constraints for respective fields
                    rules: {
                        first_name: "required",
                        last_name: "required",
                        mobile: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true
                        },
                        password: {
                            required: true,
                            minlength: 8,
                            maxlength: 16,
                            strongePassword : true
                        },
                        confirm_password: {
                            required: true,
                            minlength: 8,
                            maxlength: 16,
                            equalTo: "#password" //for checking both passwords are same or not
                        },
                        email: {
                            required: true,
                            email: true
                        },
                    },
                    // in 'messages' user have to specify message as per rules
                    messages: {
                        first_name: " Please enter your firstname",
                        last_name: " Please enter your lastname",
                        mobile: {
                            required: " Please enter a mobile number",
                            minlength: " Your mobile number must be consist of at least 10 number",
                            maxlength: " Your mobile number must be consist of at least 10 number",
                            number: "enter valid mobile number"
                        },
                        password: {
                            required: " Please enter a password",
                            minlength: " Your password must be consist of at least 8 characters",
                            maxlength: " Your password must be consist of at least 16 characters"
                        },
                        confirm_password: {
                            required: " Please enter a password",
                            minlength: " Your password must be consist of at least 5 characters",
                            equalTo: " Please enter the same password as above"
                        },
                        email: {
                            required: "Please enter a email",
                            email: "Please enter a valid email"
                        },
                    }
                });
            });
        </script>
    </body>

</html>

