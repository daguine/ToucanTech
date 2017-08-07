@extends('layouts.admin')

@section('content')

<h1>{{trans('file.edit')}} {{trans('file.user')}}</h1>
@include('share.success')
@include('share.custom_error')
@include('share.error')
<div class="col-sm-3">
    <img alt="" src="{{$user->photo?$user->photo->file:'http://image.flaticon.com/icons/svg/38/38808.svg'}}" class="img img-responsive">
</div>
<div class="col-md-8">
    <div class="collapse in pn">
        {!! Form::model($user,['method'=>'PUT','action'=>['UserController@update',$user->id],'files'=>true])!!}

        <div class="form-group">
            {!! Form::label(trans('file.name'),trans('file.name').':')!!}
            {!!Form::text('name',null,['class'=>'form-control input-lg','required'=>'required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label(trans('file.email'),trans('file.email').':')!!}
            {!!Form::email('email',null,['class'=>'form-control input-lg','required'=>'required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label(trans('file.school'),trans('file.school').':')!!}
            {!!Form::select(
            'schools',$schools,null,
            ['class'=>'form-control input-lg','required'=>'required','multiple'=>'multiple']
            )!!}
        </div>

        <div class="form-group">
            {!! Form::label(trans('file.role'),trans('file.role').':')!!}
            {!!Form::select('roles[]',$roles,null,
            ['class'=>'form-control input-lg','required'=>'required','multiple'=>'multiple'])!!}
        </div>

        <div class="form-group">
            {!! Form::label(trans('file.photo'),trans('file.photo').':')!!}
            {!! Form::file('photo',['class'=>''])!!}
        </div>

        <div class="form-group">
            {!!Form::submit('Update',['class'=>'btn btn-warning btn-lg'])!!}
            {!!Form::button('Password',['class'=>'btn btn-primary btn-lg','data-toggle'=>'collapse','data-target'=>'.pn'])!!}
        </div>

        {!! Form::close() !!}  
    </div>
    <!-- /user form-->
    <div id="password_block" class="collapse pn">
        {!! Form::open(['method'=>'patch','action'=>['PasswordController@update',$user->id],'id'=>'frmPassword'])!!}
        @include('share.password')
        <div class="form-group">
            {!!Form::submit(trans('file.update'),['class'=>'btn btn-warning btn-lg'])!!}
            {!!Form::button(trans('file.back'),['class'=>'btn btn-primary btn-lg','data-toggle'=>'collapse','data-target'=>'.pn'])!!}
        </div>
        {!! Form::close() !!}  

    </div>


    @endsection


</div>

@section('scripts')
<script src="{{asset('js/inputValidate.js')}}" type="text/javascript"></script>
@endsection