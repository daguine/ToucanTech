@extends('layouts.admin')

@section('content')
<h1>Edit School</h1>
@include('share.success')
@include('share.custom_error')
@include('share.error')

{!! Form::model($school,['method'=>'PUT','action'=>['SchoolController@update','id'=>$school->id]])!!}

<div class="form-group">
    {!! Form::label(trans('file.name'),trans('file.name').':')!!}
    {!!Form::text('name',null,['class'=>'form-control input-lg','required'=>'required'])!!}
</div>

<div class="form-group">
    {!! Form::label(trans('file.description'),trans('file.description').':')!!}
    {!!Form::textarea('description',null,['class'=>'form-control input-lg','required'=>'required'])!!}
</div>

<div class="form-group">
    {!!Form::submit(trans('file.update'),null,['class'=>'form-control'])!!}
</div>

{!! Form::close() !!}
@stop