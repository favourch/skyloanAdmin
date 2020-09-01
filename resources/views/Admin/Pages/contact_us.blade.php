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
                <h5 class="pt-3 pl-3">View Contact Messages</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($messages as $key =>$message)
                                            <tr>
                                                <td>{{$message->user->fullname}}</td>
                                                <td>{{$message->user->email}}</td>
                                                 <td>
                                                     <a  data-toggle="modal" data-target="#information{{$key}}" ><span class="btn waves-effect waves-light btn-rounded close-bt">View Message</span></a>
                                                 </td>
                                                <td>
                                                    @if($message->attended_to == 0)
                                                        <span class="btn waves-effect waves-light btn-rounded pending-bt">Pending</span>
                                                    @else
                                                        <span class="btn waves-effect waves-light btn-rounded close-bt">Attended To</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.view-user-details', ['id' => $message->user_id])}}" class="view-icon"><i class="fa fa-eye" aria-hidden="true" title="View User Details"></i></a>
                                                    <a data-toggle="modal" data-target="#send{{$key}}" class="pencil-icon"><i class="fa fa-mail-forward" aria-hidden="true" title="Reply"></i></a>
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
    @foreach($messages as $key => $information)
        <div class="modal fade" id="information{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message from the User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="modal-title" id="exampleModalLabel">
                            {{$information->message}}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($messages as $key => $approve)
        <div class="modal fade" id="send{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reply Customer's Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{route('admin.reply-mail', ['id' => $approve->idcontactus])}}">
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