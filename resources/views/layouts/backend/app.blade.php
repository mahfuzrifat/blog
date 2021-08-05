<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/backend/images/favicon.png') }}">
    <title>{{ config('app.name', 'Blog')  }} | @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('asset/backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('asset/backend/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/backend/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/backend/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/backend/plugins/css-chart/css-chart.css') }}" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('asset/backend/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{ asset('asset/backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('asset/backend/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('asset/backend/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
     @stack('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       @include('layouts.backend.partial.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       @include('layouts.backend.partial.sidebar')
       
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                 
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
              @yield('content')
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                 
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                 <span>2019 by rifat</span>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('asset/backend/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('asset/backend/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('asset/backend/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('asset/backend/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('asset/backend/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('asset/backend/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('asset/backend/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('asset/backend/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{asset('asset/backend/plugins/chartist-js/dist/chartist.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{asset('asset/backend/plugins/d3/d3.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/c3-master/c3.min.js')}}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{asset('asset/backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('asset/backend/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('asset/backend/js/dashboard2.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('asset/backend/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    @stack('js')
    <script>
                $(function () {
                $('#myTable').DataTable();
                $(function () {
                var table = $('#example').DataTable({
                "columnDefs": [{
                "visible": false,
                "targets": 2
                }],
                "order": [
                [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                page: 'current'
                }).data().each(function (group, i) {
                if (last !== group) {
                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                last = group;
                }
                });
                }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
                } else {
                table.order([2, 'asc']).draw();
                }
                });
                });
                });
                $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ]
                });
                </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
         <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


        <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
    </script>
     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script> 
    <script>  
         $(document).on("click", "#approve", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Approve?",
                  text: "Once Approve, This will be Show In-front!",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Post don't Approve!");
                  }
                });
            });
    </script>        
<script>
    //For validation with custom styles
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/material/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2019 09:13:25 GMT -->
</html>