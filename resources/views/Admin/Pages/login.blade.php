
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    <meta name="description" content="Loan With Ease">
    <meta name="author" content="Skyloan">
    <!-- Favicon icon -->
{{--
    <link rel="shortcut icon" type="image/x-icon" href="http://creativethemes.co.in/demo/organic-store/html/ecommerce/assets/images/favicon.ico">
--}}
    <title>SkyLoan</title>
    <link href="{{asset('_admin/assets/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('_admin/assets/vendors/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('_admin/assets/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('_admin/main/css/pages/float-chart.css')}}" rel="stylesheet">
    <link href="{{asset('_admin/assets/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('_admin/main/css/master-stylesheet.css')}}" rel="stylesheet">
    <link href="{{asset('_admin/main/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link href="{{asset('_admin/assets/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('_admin/main/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('_admin/main/css/master-stylesheet.css')}}" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="{{asset('_admin/main/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body class="card-no-border login-register">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->



<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div>
        <div class="login-box card">
            <div class="card-body">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"  style="margin-top: 10px; margin-left: 10px;">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                @if(session('failure'))
                    <div class="alert alert-danger" style="margin-top: 10px; margin-left: 10px;">
                        {{session('failure')}}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success" style="margin-top: 10px; margin-left: 10px;">
                        {{session('success')}}
                    </div>
                @endif
                <form class="form-horizontal form-material" method="post" id="loginform" action="{{route('admin.user.login')}}">
                    @csrf
                    <h3 class="box-title mb-20 text-center text-uppercase text-blue">SkyLoan</h3>
                    <div class="form-group mb-30">
                        <div class="col-xs-12">
                            <input class="form-control text-center" type="text" required="" name="email" placeholder="Email"> </div>
                    </div>

                    <div class="form-group mb-30">
                        <div class="col-xs-12">
                            <input class="form-control text-center" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="  btn-block btn-rounded2 waves-effect waves-light" type="submit">LogIn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('_admin/assets/vendors/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('_admin/assets/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('_admin/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('_admin/main/js/authentication.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    @if(session('failure'))
    toastr.error('{{session("failure")}}');
    @endif
    @if(session('success'))
    toastr.success('{{session("success")}}');
    @endif
</script>
</body>
</html>