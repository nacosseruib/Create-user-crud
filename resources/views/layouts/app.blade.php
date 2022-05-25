<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <meta charset="utf-8" />
        <title>BingHr take-home interview_v2</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/fa-icons.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <style>

        </style>
    </head>

    <body data-topbar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar" style="background: #F5FCFF">
                <div class="navbar-header">
                    <div class="d-flex">
                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <div class="px-4 pt-4 ml-3"><h5>Users </h5></div>
                        <div class="pt-4 pl-2">
                            <select class="form-select form-select-sm">
                                <option selected>Year</option>
                                <option selected>2022</option>
                                <option selected>2021</option>
                                <option selected>2020</option>
                            </select>
                        </div>
                        <form class="app-search d-none d-lg-block">
                            <div class="pt-1 position-relative">
                                <input type="text" class="form-control bg-white border border-2 text-dark" value="Search..." style="border-radius: 10px; color:black;">
                                <span class="fa fa-search"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="px-4 pt-4 ml-3"><h6>Languge  <i class="fa fa-caret-down text-grey"></i></h6></div>
                        <div class="px-4 pt-4 ml-3"><h6>Report <i class="fa fa-caret-down text-grey"></i></h6></div>
                        <div class="px-4 pt-4 ml-3"><h6>Project <i class="fa fa-caret-down text-grey"></i></h6></div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-notifications-dropdown"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-envelope text-dark"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell text-dark"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect">
                                <i class="fa fa-user text-dark"></i>
                            </button>
                        </div>

                    </div>
                </div>
                <hr />
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu bg-white">

                <!-- LOGO -->
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <div class="row">
                            <div class="col-md-3 bg-info" style="min-height: 595px;">
                                <ul class="metismenu list-unstyled" id="side-menu">
                                    <li>
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-search text-light"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-calendar text-light"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-user text-light"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-comment text-light"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-file text-light"></i></span>
                                        </a>
                                    </li>
                                    <li class="mt-5 pt-5">
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-gear text-light"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <!-- Left Menu Start -->
                                <ul class="metismenu list-unstyled" id="side-menu">
                                    <li>
                                        <a href="javascript:;" class="waves-effect" >
                                            <span><i class="fa fa-gear"></i> Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="bg-light" style="border-right: blueviolet 1px solid;">
                                            <a href="{{ url('/') }}" class="waves-effect">
                                                <span> <i class="fa fa-user"></i>  Users</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span> <i class="fa fa-address-book"></i> Departments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-users"></i> Employee</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-tasks"></i> Activities</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-gifts"></i> Holidays</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-calendar"></i> Events</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-file"></i> Payroll</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-calculator"></i> Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="waves-effect">
                                            <span><i class="fa fa-file"></i> Report</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <div class="border border-primary border-2">
            {{-- Yield main content --}}
            @yield('content')

            <footer class="footer" style="background: #F5FCFF">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                             © Copyright {{date('Y')}} BingHR.io.
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script>
        // $(document).ready( function(){

            // Add new user
            $('.addNewUser').click(function()
            {
                $('#recordID').val('')
                $('#show-title').html('').html('Add User');
                $('#button-title').html('').html('Add User');
                $('#employeeId').val('');
                $('#firstName').val('');
                $('#lastName').val('');
                $('#email').val('');
                $('#mobile').val('');
                $('#username').val('');
                $('#roleType').append($('<option selected>').text('Select').attr('value', ''));
            });

            //Update
            $('.getRecordID').click(function()
            {
                var userID = $(this).attr('id');
                $('#show-title').html('').html('Edit User');
                $('#button-title').html('').html('Update User');
                if(userID)
                {
                    $.ajax({
                        url: '{{ url("/") }}' +  '/user/' + userID + '/edit',
                        type: 'get',
                        data: { format: 'json' },
                        dataType: 'json',
                        success: function(data) {
                            $('#recordID').val('').val(data.getUser.id);
                            $('#employeeId').val('').val(data.getUser.employee_id);
                            $('#firstName').val('').val(data.getUser.firstname);
                            $('#lastName').val('').val(data.getUser.lastname);
                            $('#email').val('').val(data.getUser.email);
                            $('#mobile').val('').val(data.getUser.mobile);
                            $('#username').val('').val(data.getUser.username);
                            $('#roleType').append($('<option selected>').text(data.getUser.role_name).attr('value', data.getUser.role_type));
                        },
                        error: function(error) {
                            alert("Please we are having issue getting user's details. Check your network/refresh this page !!!");
                        }
                    });
                }
            });

            // Delete user
            $('.getUserDetails').click(function()
            {
                var userID = $(this).attr('id');
                $('#delete-show-title').html('').html('Delete User');
                $('#delete-button-title').html('').html('Delete');
                $('#deleteRrecordID').val(userID);
            });
            // Delete user
            // $('#deleteButton').click(function()
            // {
            //     var userID = $('#deleteRrecordID').val();
            //     if(userID)
            //     {
            //         $.ajax({
            //             url: '{{ url("/") }}' +  '/user/delete',
            //             type: 'post',
            //             data: { format: 'json' },
            //             dataType: 'json',
            //             data: {'user_id': userID, '_token': $('input[name=_token]').val()},
            //             success: function(data) {
            //                 if(data)
            //                 {
            //                     $('#deleteRrecordID').val('');
            //                     $('.delete-message').html('User was deleted successfully').css('color', 'green');
            //                 }else{
            //                     $('.delete-message').html('Unable to delete user').css('color', 'red');
            //                 }
            //             },
            //             error: function(error) {
            //                 alert("Please we are having issue getting user's details. Check your network/refresh this page !!!");
            //             }
            //         });
            //     }
            // });

        // });
    </script>

</body>


</html>
