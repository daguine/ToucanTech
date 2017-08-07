
<div class="form-group">
    {!! Form::label(trans('file.password'),trans('file.password').':')!!}
    {!!Form::password('password',['class'=>'form-control input-lg','required'=>'required','id'=>'password'])!!}
</div>

<div class="form-group">
    {!! Form::label(trans('file.confPassword'),trans('file.confPassword').':')!!}
    {!!Form::password('confPassword',['class'=>'form-control input-lg','required'=>'required','id'=>'confPassword'])!!}
</div>

