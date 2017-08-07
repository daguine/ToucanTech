@extends('layouts.admin')

@section('content')
<h1>{{trans('file.role')}}</h1>
<br />
@include('share.success')
@include('share.custom_error')
@include('share.error')

<table class="table">
    <thead>
        <tr>
            <th>{{trans('file.id')}}</th>
            <th>{{trans('file.role')}}</th>
            <th>{{trans('file.description')}}</th>
            <th>{{trans('file.created_at')}}</th>
            <th>{{trans('file.action')}}</th>
        </tr>
    </thead>
    @if(isset($roles))
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td><a href="{{route('role.edit',$role->id)}}">{{$role->name}}</a></td>
            <td>{{$role->description}}</td>
            <td>{{$role->created_at->diffForHumans()}}</td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'action' => ['RoleController@destroy', $role->id]]) }}
                    {{ Form::submit(trans('file.delete'), ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endForeach
    </tbody>
    @endif
</table>
{{ $roles->links() }}
@endsection