@extends('Admin.admin_app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-sm-6 align-self-center">
            <h3>Users - {{$user->fullname}}</h3>
        </div>
        <div class="col-md-6 col-sm-6 text-right font-12"> <a href="{{route('admin.dashboard')}}">Admin</a> </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4> General </h4>
                    <div class="row">
                        <div class="form-wrap form-wrap2 col-12">
                            <form class="form-horizontal">
                                <div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">Full Name</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="{{$user->fullname}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">Email</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="{{$user->email}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">Sex</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="@if($user->sex){{$user->sex == 1? "Female" : "Male" }} @else Null @endif" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">Local Government</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="@if($user->lgs){{$user->lgs->lgs}} @else Nill @endif"  disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">State</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="@if($user->state){{$user->state->names}} @else Nill @endif" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">Address</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="@if($user->address){{$user->address}} @else Nill @endif" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">Marital Status</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="@if($user->marital_status){{$user->marital_status == 1 ? "Single" : " Married"}} @else Nill @endif" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-12 mb-10">
                                                <label class="control-label font-16 mb-1">DOB</label>
                                                <div>
                                                    <input type="email" class="form-control font-14" value="@if($user->dob) {{$user->dob}} @else Nill @endif" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4> Next of Kin </h4>
                    @if(!empty($next_of_kin))
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label class="control-label font-14 mb-1">Phone Number</label>
                                    <div>
                                        <input type="text" class="form-control font-14" value="{{$next_of_kin->phone_number}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label class="control-label font-14 mb-1">Email</label>
                                    <input type="text" class="form-control font-14" value="{{$next_of_kin->email}}" disabled >
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label class="control-label font-14 mb-1">Relationship</label>
                                    <input type="text" class="form-control font-14" value="{{$next_of_kin->relationship}}" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="control-label font-14 mb-1">Address</label>
                                    <div>
                                        <input type="text" class="form-control font-14" value="{{$next_of_kin->address}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label class="control-label font-14 mb-1">State</label>
                                    <input type="text" class="form-control font-14" value="{{$next_of_kin->state->names}}" disabled >
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label class="control-label font-14 mb-1">Local Goverment</label>
                                    <input type="text" class="form-control font-14" value="{{$next_of_kin->lgs->lgs}}" disabled >
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <span class="control-label font-14 mb-1 text-danger">Next Of Kin Information is not Updated Yet by the User</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection