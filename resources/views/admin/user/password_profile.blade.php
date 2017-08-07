@extends(Auth::user()->isAdmin() ?'layouts.admin':'layouts.app')

@section('content')

@if(!Auth::user()->isAdmin())
    <div class="col-md-4 col-md-offset-4">
@endif
<h1>{{trans('file.password')}}</h1>

@include('share.success')
@include('share.custom_error')
@include('share.error')
<!-- /user form-->
<div id="password_block">
    {!! Form::open(['method'=>'patch','action'=>['PasswordController@update',Auth::user()->id],'id'=>'frmPassword'])!!}
        @include('share.password')
        <div class="form-group">
            {!!Form::submit(trans('file.update'),['class'=>'btn btn-warning btn-lg'])!!}
        </div>
    {!! Form::close() !!}  

</div>
@if(!Auth::user()->isAdmin())
    </div>
@endif
@endsection



@section('scripts')
    <script src="{{asset('js/inputValidate.js')}}" type="text/javascript"></script>
@endsection