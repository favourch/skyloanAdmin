
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    <meta name="description" content="Loan with Ease">
    <meta name="author" content="SkyLoan">
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
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        @include('Admin.layouts.header')
        @include('Admin.layouts.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield("content")
            </div>
            @include('Admin.layouts.footer')
        </div>
    </div>
    <script src="{{asset('_admin/assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/ps/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('_admin/main/js/waves.js')}}"></script>
    <script src="{{asset('_admin/main/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('_admin/main/js/custom.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/pdfmake/jszip.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/pdfmake/jszip.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/datatables-2/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('_admin/main/js/support-tickets.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('_admin/main/js/knob-init.js')}}"></script>
    <script src="{{asset('_admin/assets/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield("page_scripts")
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