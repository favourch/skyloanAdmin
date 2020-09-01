@extends('Admin.admin_app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-sm-6 align-self-center">
            <h3>Registered Users</h3>
        </div>
        <div class="col-md-6 col-sm-6 text-right font-12"> <a href="{{route('admin.dashboard')}}">Admin</a> </div>
    </div>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="card">
                <h5 class="pt-3 pl-3">Registered Users</h5>
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
                                        @foreach($users as $user)
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
                                                    <a href="{{route('admin.view-user-details', ['id' => $user->idusers])}}" class="view-icon"><i class="fa fa-eye" aria-hidden="true" title="View Details"></i></a>
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