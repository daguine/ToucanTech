@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-3">
                        <img alt="" src="{{Auth::user()->photo?asset("images/upload/".Auth::user()->photo->file):'http://image.flaticon.com/icons/svg/38/38808.svg'}}" class="img img-responsive">
                    </div>
                    <div class="col-md-8">
                        @include('share.success')
                        @include('share.error')
                        <div class="form-group">
                            {!! Form::label('name','Name:')!!}
                            {!!Form::text('name',Auth::user()->name,['class'=>'form-control input-lg','readonly'=>'readonly'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email_id','email:')!!}
                            {!!Form::email('email',Auth::user()->email,['class'=>'form-control input-lg','readonly'=>'readonly'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('School','School:')!!}
                            {!!Form::select('schools[]', Auth::user()->schools->pluck('name'),null,['class'=>'form-control input-lg'
                            ,'readonly'=>'readonly','multiple'=>'multiple'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role','Role:')!!}
                            {!!Form::select('roles[]', Auth::user()->roles->pluck('name'),null,['class'=>'form-control input-lg'
                            ,'readonly'=>'readonly','multiple'=>'multiple'])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


