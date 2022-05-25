@extends('layouts.app')

@section('content')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content" style="background: #F5FCFF">

                <div class="page-content">
                    <div class="container-fluid">
                        @includeIf('share.messageAlert')
                        <div align="right">
                            <button type="button" class="addNewUser btn btn-success btn-sm mb-4 mt-3" style="border-radius:6px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 border-dark">
                                <div class="card">
                                    <div class="card-body" style="border:solid 2px #87CEFA"> {{--ADD8E6--}}
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4 class="card-title mb-4">List Users</h4>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    <form class="app-search d-none d-lg-block">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control bg-white border border-grey border-2 text-dark" value="Search..." style="border-radius: 10px">
                                                            <span class="fa fa-search"></span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="thead-light" style="background: #F5FCFF;">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th></th>
                                                        <th>Create Date</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if(isset($userList) && $userList)
                                                        @foreach ($userList as $key=>$user)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-xs">
                                                                            <span class="avatar-title bg-primary rounded-circle bg-primary font-size-20 mini-stat-icon">
                                                                                <i class="mdi mdi-camera"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <strong>{{$user->fisrtname .' '. $user->lastname}}
                                                                            <div><small>{{$user->email}}</small></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="badge rounded-pill badge-soft-{{$user->bg_color}} font-size-12 p-2">{{$user->role_name}}</span>
                                                                </td>
                                                                <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                                                                <td>
                                                                    {{$user->employee_id}}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        {{-- --}}
                                                                        <button type="button" id="{{$user->id}}" class="getRecordID btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" ><span class="fa fa-edit"></span></button>
                                                                        <button type="button" id="{{$user->id}}" class="getUserDetails btn btn-default btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" ><span class="fa fa-trash"></span></button>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                    @endif


                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div><!-- end col -->


                        </div>

                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
            <!-- End Page-content -->

    {{-- Delete modal --}}
    @includeIf('share.deleteModal', ['title'=>'Delete User', 'modalName'=>'deleteModal', 'message'=>'Are you sure you want to delete this user?' ])

    {{-- Edit or Add modal --}}
    @includeIf('share.userModalForm', ['title'=>'Add User', 'modalName'=>'exampleModal', 'user'=>null, 'formAction'=>'store'])

@endsection
