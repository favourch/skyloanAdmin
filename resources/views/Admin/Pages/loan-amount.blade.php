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
                                        <th>Email</th>
                                        <th>Loan Type</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>Loan Information</th>
                                        <th>Requested Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loans as $key =>$loan)
                                            <tr>
                                                <td>{{$loan->user->fullname}}</td>
                                                <td>{{$loan->user->email}}</td>
                                                <td>{{$loan->loanRange->name}}</td>
                                                <td>
                                                    @if($loan->loan_status == 1)
                                                        <span class="btn waves-effect waves-light btn-rounded pending-bt">Pending</span>
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
                                                     <a  data-toggle="modal" data-target="#information{{$key}}" ><span class="btn waves-effect waves-light btn-rounded close-bt">View Loan Information</span></a>
                                                 </td>
                                                <td>
                                                    {{number_format($loan->amount)}}
                                                 </td>
                                                <td>
                                                    <a href="{{route('admin.view-user-details', ['id' => $loan->user_id])}}" class="view-icon"><i class="fa fa-eye" aria-hidden="true" title="View User Details"></i></a>
                                                    <a  data-toggle="modal" data-target="#bank{{$key}}" class="pencil-icon" ><i class="fa fa-bank" aria-hidden="true" title="View Bank Account"></i></a>
                                                     @if($loan->loan_status == 1)
                                                         <a data-toggle="modal" data-target="#reject{{$key}}"  {{--href="{{route('admin.reject-loan', ['id' => $loan->idloans])}}"--}} class="delete-icon"><i class="fa fa-trash-o" aria-hidden="true" title="Reject Loan"></i></a>
                                                        <a data-toggle="modal" data-target="#approve{{$key}}" class="pencil-icon"><i class="fa fa-check" aria-hidden="true" title="Approve Loan"></i></a>
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
    {{-- @foreach($loans as $key => $bank)
        <div class="modal fade" id="bank{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bank Account Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @php $bank_info = DB::table('bank_information')->where('user_id', $bank->user_id)->first() @endphp
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
    @endforeach --}}
    @foreach($loans as $key => $form)
        <div class="modal fade" id="reject{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kindly Provide Reasons for Loan Rejection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.reject-loan', ['id' => $form->idloans])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    <label class="control-label font-16 mb-1">Reason</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="loan_reason" class="form-control font-14" required>
                                                No Reason
                                            </textarea>
                                        </div>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-sm  btn-outline-danger">Submit Form</button>
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
    @foreach($loans as $key => $approve)
        <div class="modal fade" id="approve{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kindly Provide Approval Passcode</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.approve-loan', ['id' => $approve->idloans])}}">
                            @csrf
                            <div class="col-12 mb-5">
                                <div class="form-group">
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12 pb-4">
                                            <label class="control-label font-16 mb-1">Passcode</label>
                                           <input name="passcode" type="password" required>
                                        </div>
                                        
                                        <div class="col-md-12 pb-4">
                                            <label class="control-label font-16 mb-1">Approved Amount</label>
                                            <input name="approvedAmount" type="number" required value={{$approve->amount}}>
                                         </div>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-sm  btn-outline-success">Approve Loan</button>
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