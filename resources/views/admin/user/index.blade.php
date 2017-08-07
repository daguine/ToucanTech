@extends('layouts.admin')

@section('content')
<h1>{{trans('file.user')}}</h1>
<br />
@include('share.success')
@include('share.custom_error')
@include('share.error')
<table class="table">
    <thead>
        <tr>
            <th>{{trans('file.id')}}</th>
            <th>{{trans('file.photo')}}</th>
            <th>{{trans('file.name')}}</th>
            <th>{{trans('file.email')}}</th>
            <th>
                {!!Form::select('schools',[''=>'School','0'=>'All']+$schools->toArray(),null,['class'=>'form-control input-sm','id'=>'selSchool'])!!}
            </th>
            <th>{{trans('file.role')}}</th>
            <th>{{trans('file.created_at')}}</th>
            <th>{{trans('file.action')}}</th>
        </tr>
    </thead>
    @if(isset($users))
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img alt="profile image" height="100" width="100" src="{{$user->photo?asset('images/upload/'.$user->photo->file):'http://image.flaticon.com/icons/svg/38/38808.svg'}}" class="img-responsive img thumbnail"	>	
            </td>
            <td><a href="{{route('user.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>
                @foreach($user->schools as $school)
                <p><span class="btn btn-sm">{{$school->name}}</span></p>
                @endforeach
            </td>
            <td>
                @foreach($user->roles as $role)
                <p><span class="btn btn-sm {{ $role->name == 'Member'?'btn-primary':'btn-warning'}}">{{$role->name}}</span></p>
                @endforeach
            </td>

            <td>{{$user->created_at->diffForHumans()}}</td>

            <td>
                {!! Form::model($user,['method'=>'DELETE','action'=>['UserController@destroy',$user->id]])!!}
                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-lg'])!!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endForeach
    </tbody>
    @endif
</table>
{{ $users->links() }}
@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#selSchool').change(function (e) {
            e.preventDefault();
            if ($(this).val() === '0') {
                 window.location.href = "/admin/user/";
            } else {
                window.location.href = "/admin/user/" + $(this).val() + '/filter';
            }
        });
    });
</script>
@endsection