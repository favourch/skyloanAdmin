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
                    <h4>Add / Update Users' Relationship</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-relationship')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Name</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="name" name="name" class="form-control font-14" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add Relationship</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="relationship" class="display nowrap table table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($relationships) > 0)
                                @foreach($relationships as $key => $relationship)
                                    <tr>
                                        <td>{{$relationship->idrelationship}}</td>
                                        <td>{{$relationship->name}}</td>
                                        <td>
                                            <a  data-toggle="modal" data-target="#relationship{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                            <a href="{{route('admin.delete-relationship', ['id'=> $relationship->idrelationship])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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
            <div class="card">
                <div class="card-body">
                    <h4>Add / Update Passcode</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-passcode')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="password" name="password" class="form-control font-14" placeholder="Passcode Here" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add/Update Passcode</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add / Update Bank</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-bank')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Name</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="name" name="name" class="form-control font-14" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add Bank</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="bank" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($banks) > 0)
                                    @foreach($banks as $key => $bank)
                                        <tr>
                                            <td>{{$bank->idbanks}}</td>
                                            <td>{{$bank->name}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#bank{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-bank', ['id'=> $bank->idbanks])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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

    @foreach($relationships as $key => $relationship)
        <div class="modal fade" id="relationship{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-relationship', ['id' => $relationship->idrelationship])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Name</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="name" name="name" value="{{$relationship->name}}" class="form-control font-14" placeholder="{{$relationship->name}}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update Relationship</button>
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
    @foreach($banks as $key => $bank)
        <div class="modal fade" id="bank{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-bank', ['id' => $bank->idbanks])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Name</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="name" name="name" value="{{$bank->name}}" class="form-control font-14" placeholder="{{$bank->name}}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update Bank</button>
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