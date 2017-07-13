<div class="form-group message_div alert alert-info" style="min-height:400px;overflow:auto">
	@foreach($message as $msg)
      <span>{{ ($msg->to==$to)? 'Me' : $to_name }}</span>: &nbsp;&nbsp;<span class="even">{{ $msg->message }}</span><span style="position:relative;float:right">{{ date('H:i',strtotime($msg->created_at)) }}</span><br/>
    @endforeach
    
</div>
<div class="form-group">
    <form action="javascript:void(0)" method="post" id="d_chat_form">
	    {{ csrf_field() }}
	    <input type="hidden" name="to" value="{{ $to }}">
	    <div class="col-md-8"><input type="text" name="message" required placeholder="Enter a message" autofocus class="form-control"/></div>
	    <div class="col-md-2"><input type="submit" class="btn btn-primary" value="Send"/></div>
	</form>
</div