@extends('layouts.admin')

@section('content')
<h1>School List</h1>
<br />
@include('share.success')
@include('share.custom_error')
@include('share.error')

<table class="table">
    <thead>
        <tr>
            <th>{{trans('file.id')}}</th>
            <th>{{trans('file.name')}}</th>
            <th>{{trans('file.description')}}</th>
            <th>{{trans('file.created_at')}}</th>
            <th>{{trans('file.action')}}</th>
        </tr>
    </thead>
    @if(isset($schools))
    <tbody>
        @foreach($schools as $school)
        <tr>
            <td>{{$school->id}}</td>
            <td><a href="{{route('school.edit',$school->id)}}">{{$school->name}}</a></td>
            <td>{{$school->description}}</td>
            <td>{{$school->created_at->diffForHumans()}}</td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'action' => ['SchoolController@destroy', $school->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endForeach
    </tbody>
    @endif
</table>
{{ $schools->links() }}
@stop