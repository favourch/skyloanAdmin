@extends('Admin.admin_app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-sm-6 align-self-center">
            <h3>System Settings</h3>
        </div>
        <div class="col-md-6 col-sm-6 text-right font-12"> <a href="{{route('admin.dashboard')}}">Admin</a> </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4>Add / Update State</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-state')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">State</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" name="name" class="form-control font-14" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add State</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="state" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($states) > 0)
                                    @foreach($states as $key => $state)
                                        <tr>
                                            <td>{{$state->idstates}}</td>
                                            <td>{{$state->names}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#state{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-state', ['id'=> $state->idstates])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h5> No record Found</h5>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add / Update Local government</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-lgs')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Local Government</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="name" name="name" class="form-control font-14" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add LGS</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($lgs) > 0)
                                    @foreach($lgs as $key => $lg)
                                        <tr>
                                            <td>{{$lg->idlgs}}</td>
                                            <td>{{$lg->lgs}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#lgs{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-lgs', ['id'=> $lg->idlgs])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h5> No record Found</h5>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @foreach($lgs as $key => $lg)
        <div class="modal fade" id="lgs{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-lgs', ['id' => $lg->idlgs])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Name</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="name" name="name" value="{{$lg->lgs}}" class="form-control font-14" placeholder="{{$lg->lgs}}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update LGS</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($states as $key => $state)
        <div class="modal fade" id="state{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update State</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-state', ['id' => $state->idstates])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Name</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="name" name="name" value="{{$state->names}}" class="form-control font-14" placeholder="{{$state->names}}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update State</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection