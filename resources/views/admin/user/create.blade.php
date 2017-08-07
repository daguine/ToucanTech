@extends('layouts.admin')

@section('content')


<h1>{{trans('file.create')}} {{trans('file.user')}}</h1>

@include('share.success')
@include('share.custom_error')
@include('share.error')
{!! Form::open(['method'=>'POST','action'=>'UserController@store','files'=>true])!!}

<div class="form-group">
    {!! Form::label(trans('file.name'),trans('file.name').':')!!}
    {!!Form::text('name',null,['class'=>'form-control input-lg','required'=>'required'])!!}
</div>

<div class="form-group">
    {!! Form::label(trans('file.email'),trans('file.email').':')!!}
    {!!Form::email('email',null,['class'=>'form-control input-lg','required'=>'required'])!!}
</div>

<div class="form-group">
    {!! Form::label(trans('file.password'),trans('file.password').':')!!}
    {!!Form::password('password',['class'=>'form-control input-lg','required'=>'required'])!!}
</div>

<div class="form-group">
    {!! Form::label(trans('file.school'),trans('file.school').':')!!}
    {!!Form::select(
        'schools[]',$schools,null,
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
    {!!Form::submit(trans('file.save'),['class'=>'btn btn-success btn-lg'])!!}
</div>

{!! Form::close() !!}
@stop