@extends('Admin.admin_app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-sm-6 align-self-center">
            <h3>Admin Action</h3>
        </div>
        <div class="col-md-6 col-sm-6 text-right font-12"> <a href="{{route('admin.dashboard')}}">Admin</a> </div>
        {{--<div class="">
            <button class="right-side-toggle waves-effect waves-light bg-primary btn btn-circle btn-sm pull-right ml-10"><i class="ti-settings text-white"></i></button>
        </div>--}}
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex pa-10 no-block row">

                        <div class="col-lg-7 col-md-7 col-sm-7 col p-0">  <div class="text-center">
                                <h4 class="text-muted mb-10 font-14">Registered Users</h4>
                                <h2 class="counter"><span class="counter-count font-50 text-themecolor">{{count($users)}}</span></h2>
                            </div></div>

                        <div class="col-lg-5 col-md-5 col-sm-5  col p-0">
                            <div class="align-self-center">  <div class="text-center">
                                    <input data-plugin="knob" data-width="93%" data-height="93%" data-linecap=round data-fgColor="#ffc8c9" data-displayInput=false       data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex pa-10 no-block row">

                        <div class="col-lg-7 col-md-7 col-sm-7 col p-0">
                            <div class="text-center">
                                <h4 class="text-muted mb-10 font-14">Pending Loan Requests</h4>
                                <h2 class="counter"><span class="counter-count font-50 text-themecolor">{{count($pending_loans)}}</span></h2>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col p-0">
                            <div class="text-center">
                                <input data-plugin="knob" data-width="93%" data-height="93%" data-linecap=round data-fgColor="#cfcfff" data-displayInput=false   data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex pa-10 no-block row">

                        <div class="col-lg-7 col-md-7 col-sm-7 col p-0">
                            <div class="text-center">
                                <h4 class="text-muted mb-10 font-14"> Active Loans</h4>
                                <h2 class="counter"><span class="counter-count font-50 text-themecolor">{{count($active_loans)}}</span></h2>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col p-0">
                            <div class="text-center"><input data-plugin="knob" data-width="93%" data-height="93%" data-linecap=round data-fgColor="#ffd9bd" data-displayInput=false   data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex pa-10 no-block row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col p-0">
                            <div class="text-center">
                                <h4 class="text-muted mb-10 font-14">Matured Loans</h4>
                                <h2 class="counter"><span class="counter-count font-50 text-themecolor">{{count($matured_loans)}}</span></h2>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col p-0">
                            <div class="text-center"><input data-plugin="knob" data-width="93%" data-height="93%" data-linecap=round data-fgColor="#c6f0b1" data-displayInput=false  data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">
            <div class="card">
                <h5 class="p-2">Last 5 Registered Users</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Marital Status</th>
                                        <th>Sex</th>
                                        <th>State</th>
                                        <th>Lgs</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($latest_users as $user)
                                            <tr>
                                                <td>{{$user->fullname}}</td>
                                                <td>{{$user->email}}</td>
                                                <td> @if($user->status == 0)
                                                         <span class="btn waves-effect waves-light btn-rounded pending-bt">Pending</span>
                                                     @elseif($user->status == 1)
                                                        <span class="btn waves-effect waves-light btn-rounded close-bt">Verified</span>
                                                     @else
                                                         <span class="btn waves-effect waves-light btn-rounded open-bt">Suspended</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->marital_status == 1)
                                                        Single
                                                    @endif
                                                    @if($user->marital_status == 2)
                                                        Married
                                                    @endif
                                                    @if($user->marital_status == null)
                                                        Nil
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->sex == 1)
                                                        Male
                                                    @endif
                                                    @if($user->sex == 2)
                                                        Female
                                                    @endif
                                                    @if($user->marital_status == null)
                                                        Nill
                                                    @endif
                                                </td>
                                                <td>@if($user->state)
                                                        {{$user->state->names}}
                                                    @else
                                                        nil
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->lgs)
                                                        {{$user->lgs->lgs}}
                                                    @else
                                                        nil
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->status == 0)
                                                         <a href="{{route('admin.approve-user', ['id' => $user->idusers])}}" class="pencil-icon"><i class="fa fa-check" aria-hidden="true" title="Approve User"></i></a>
                                                    @endif
                                                    @if($user->status == 1)
                                                        <a href="{{route('admin.reject-user', ['id' => $user->idusers])}}" class="delete-icon"><i class="fa fa-trash-o" aria-hidden="true" title="Dis-approve User"></i></a>
                                                        <a href="{{route('admin.suspend-user', ['id' => $user->idusers])}}" class="suspend-icon"><i class="fa fa-times" aria-hidden="true" title="Suspend User"></i></a>
                                                    @endif
                                                        <a href="{{route('admin.view-user-details', ['id' => $user->idusers])}}" class="view-icon"><i class="fa fa-eye-slash" aria-hidden="true" title="View Details"></i></a>
                                                    @if($user->role_id == 1 )
                                                         <a href="{{route('admin.make-admin', ['id' => $user->idusers])}}" class="pencil-icon"><i class="fa fa-user-plus" aria-hidden="true" title="Make Admin"></i></a>
                                                    @endif
                                                    @if($user->role_id == 2)
                                                        <a href="{{route('admin.remove-admin', ['id' => $user->idusers])}}" class="delete-icon"><i class="fa fa-user-secret" aria-hidden="true" title="Remove Admin"></i></a>
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
            </div>
        </div>
    </div>
@endsection