@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Chat Room</div>

                <div class="panel-body">
                    <div class="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="alert alert-danger">
                                    <div class="user_list" style="overflow:auto;min-height:360px">
                                        @foreach($users as $user)
                                            <i class="fa fa-circle {{ $user->status==1 ?'online':'offline'}}"></i><a href="javascript:void(0)" class="btn" data-value="{{$user->id}}">{{$user->name}}</a><br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" id="chat_box">
                                @if ($errors->any())
                                    <div class="">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group message_div alert alert-info" style="min-height:400px;overflow:auto">
                                    <span class="even">{{ 'Sample Text' }}</span>
                                </div>
                                <div class="form-group">
                                    <form action="javascript:void(0)" method="post" id="d_chat_form">
                                    {{ csrf_field() }}
                                    <div class="col-md-8"><input type="text" name="message" required placeholder="Enter a message" autofocus class="form-control"/></div>
                                    <div class="col-md-2"><input type="submit" class="btn btn-primary" value="Send"/></div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
