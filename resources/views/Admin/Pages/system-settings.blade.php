@extends('Admin.admin_app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-sm-6 align-self-center">
            <h3>Loan Properties Settings</h3>
        </div>
        <div class="col-md-6 col-sm-6 text-right font-12"> <a href="{{route('admin.dashboard')}}">Admin</a> </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add / Update Loan Duration</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-duration')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Duration</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="number" name="duration" class="form-control font-14" placeholder="Duration (In Months)" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add Duration</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="loan-duration" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($loan_duration) > 0)
                                    @foreach($loan_duration as $key => $duration)
                                        <tr>
                                            <td>{{$duration->idloanduration}}</td>
                                            <td>{{$duration->duration}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#duration{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-duration', ['id'=> $duration->idloanduration])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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
            <div class="card">
                <div class="card-body">
                    <h4>Add / Update Loan Rate</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-rate')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Loan Rate</label>
                                <div class="row">
                                    <div class="col-md-10 mb-2">
                                        <input type="number" name="rate" class="form-control font-14" placeholder="Rate" required>
                                    </div>
                                    <div class="col-md-10 mb-2">
                                        <input type="text" name="description" class="form-control font-14" placeholder="Description" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add Loan Rate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="loan-rate" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Rate</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($loan_rate) > 0)
                                    @foreach($loan_rate as $key => $rate)
                                        <tr>
                                            <td>{{$rate->idloanrate}}</td>
                                            <td>{{$rate->rate}}</td>
                                            <td>{{$rate->description}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#rate{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-rate', ['id'=> $rate->idloanrate])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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
                    <h4>Add / Update Loan Range</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-range')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Loan Range</label>
                                <div class="row ">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="name" class="form-control font-14" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" name="min_range" class="form-control font-14" placeholder="MIN" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" name="max_range" class="form-control font-14" placeholder="MAX" required>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-sm  btn-outline-primary">Add Range</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="loan-range" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Mini</th>
                                    <th>Maxi</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($loan_range) > 0)
                                    @foreach($loan_range as $key => $range)
                                        <tr>
                                            <td>{{$range ->idloanrange}}</td>
                                            <td>{{$range->name}}</td>
                                            <td>{{$range->mini_range}}</td>
                                            <td>{{$range->maxi_range}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#range{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-range', ['id'=> $range->idloanrange])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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
            <div class="card">
                <div class="card-body">
                    <h4>Add / Update Salary Range</h4>
                    <form class="form-horizontal" method="post" action="{{route('admin.add-salary')}}">
                        @csrf
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <label class="control-label font-16 mb-1">Salary Range</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" name="range" class="form-control font-14" placeholder="Range" required>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Add Range</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="relative">
                        <div class="table-responsive">
                            <table id="salary-range" class="display nowrap table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Range</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($salaries) > 0)
                                    @foreach($salaries as $key => $salary)
                                        <tr>
                                            <td>{{$salary->idsalaryrange}}</td>
                                            <td>{{$salary->salary_range}}</td>
                                            <td>
                                                <a  data-toggle="modal" data-target="#salary{{$key}}" class="view-icon "><i class="fa fa-eye-slash" aria-hidden="true" title="Edit"></i></a>
                                                <a href="{{route('admin.delete-salary', ['id'=> $salary->idsalaryrange])}}" class="delete-icon"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
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
    @foreach($loan_range as $key => $range)
        <div class="modal fade" id="range{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Loan Range</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-range', ['id' => $range->idloanrange])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Name</label>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <input type="text" name="name" class="form-control font-14" value="{{$range->name}}" placeholder="{{$range->name}}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="min_range" class="form-control font-14" value="{{$range->mini_range}}" placeholder="{{$range->mini_range}}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="max_range" class="form-control font-14" value="{{$range->maxi_range}}" placeholder="{{$range->maxi_range}}" required>
                                        </div>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update Loan Range</button>
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
    @foreach($salaries as $key => $salary)
        <div class="modal fade" id="salary{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Salary Range</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-salary', ['id' => $salary->idsalaryrange])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Range</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="name" name="range" value="{{$salary->range}}" class="form-control font-14" placeholder="{{$salary->range}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update Salary Range</button>
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
    @foreach($loan_duration as $key => $duration)
        <div class="modal fade" id="duration{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Loan Duration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-duration', ['id' => $duration->idloanduration])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Duration</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="number" name="duration" value="{{$duration->duration}}" class="form-control font-14" placeholder="{{$duration->duration}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update Loan Duration</button>
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
    @foreach($loan_rate as $key => $rate)
        <div class="modal fade" id="rate{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Loan Rate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.update-rate', ['id' => $rate->idloanrate])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Loan Rate</label>
                                    <div class="row">
                                        <div class="col-md-10 mb-2">
                                            <input type="number" name="rate" value="{{$rate->rate}}" class="form-control font-14" placeholder="{{$rate->rate}}" required>
                                        </div>
                                        <div class="col-md-10 mb-2">
                                            <input type="text" name="description" value="{{$rate->description}}" class="form-control font-14" placeholder="{{$rate->description}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary">Update Loan Rate</button>
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