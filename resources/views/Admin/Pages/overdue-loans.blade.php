@extends('Admin.admin_app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-sm-6 align-self-center">
            <h3>All Loans</h3>
        </div>
        <div class="col-md-6 col-sm-6 text-right font-12"> <a href="{{route('admin.dashboard')}}">Admin</a> </div>
    </div>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="card">
                <h5 class="pt-3 pl-3">Loan Management</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        {{--<th>Email</th>--}}
                                        <th>Loan Type</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Days Used</th>
                                        <th>Loan Information</th>
                                        <th>Approved Amount</th>
                                        <th>Expected Payment</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loans as $key =>$loan)
                                            <tr>
                                                <td>{{$loan->user->fullname}}</td>
                                                {{--<td>{{$loan->user->email}}</td>--}}
                                                <td>{{$loan->loanRange->name}}</td>
                                                <td>
                                                    @if($loan->loan_status == 3)
                                                        <span class="btn waves-effect waves-light btn-rounded open-bt">Overdue</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($loan->loan_status == 1)
                                                        Nill
                                                    @else
                                                        {{$loan->loan_start_date}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <?php
                                                        $date =  new \Carbon\Carbon($loan->loan_start_date);
                                                        $end_date = $date->addDays($loan->loanDuration->duration);
                                                        $end_date = $end_date->format('Y-m-d');
                                                    ?>
                                                    {{$end_date}}
                                                </td>
                                                 <td>
                                                     {{$loan_parameters[$key]['noOfDays']}}
                                                 </td>
                                                <td>
                                                     <a  data-toggle="modal" data-target="#information{{$key}}" ><span class="btn waves-effect waves-light btn-rounded close-bt">View Loan Information</span></a>
                                                 </td>
                                                <td>
                                                    {{number_format($loan->approvedAmount)}}
                                                 </td>
                                                <td>
                                                    {{number_format($loan_parameters[$key]['loanToPay'])}}
                                                 </td>
                                                <td>
                                                    <a href="{{route('admin.view-user-details', ['id' => $loan->user_id])}}" class="view-icon"><i class="fa fa-eye" aria-hidden="true" title="View User Details"></i></a>
                                                    <a  data-toggle="modal" data-target="#bank{{$key}}" class="pencil-icon" ><i class="fa fa-bank" aria-hidden="true" title="View Bank Account"></i></a>
                                                     @if($loan->loan_status == 3)
                                                        <a data-toggle="modal" data-target="#send{{$key}}" class="pencil-icon"><i class="fa fa-mail-forward" aria-hidden="true" title="Send Reminder Email"></i></a>
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
    @foreach($loans as $key => $information)
        <div class="modal fade" id="information{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reason For Loan Application</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{$information->loan_info}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($loans as $key => $bank)
        <div class="modal fade" id="bank{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bank Account Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php $bank_info = \App\BankInformation::where('user_id', $bank->user_id)->first() @endphp
                    <div class="modal-body">
                        <div class="col-12 mb-5">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label class="control-label font-16 mb-1">Name</label>
                                        <input type="text" name="name" class="form-control font-14" value="{{$loan->user->fullname}}" placeholder="{{$loan->user->fullname}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label font-16 mb-1">Account Number</label>
                                        <input type="number" name="min_range" class="form-control font-14" value="{{$bank_info->account_number}}" placeholder="{{$bank_info->account_number}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label font-16 mb-1">Account Name</label>
                                        <input type="text" name="max_range" class="form-control font-14" value="{{$bank_info->bank->name}}" placeholder="{{$bank_info->bank->name}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label font-16 mb-1">BVN</label>
                                        <input type="number" name="max_range" class="form-control font-14" value="{{$bank_info->bvn}}" placeholder="{{$bank_info->bvn}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($loans as $key => $approve)
        <div class="modal fade" id="send{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Reminder Message to the User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.send-loan-reminder', ['id' => $approve->idloans])}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <textarea name="mail" class="form-control font-14" required>
                                        Message Here
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success">Send Mail</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection