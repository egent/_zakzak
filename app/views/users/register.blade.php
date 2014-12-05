@extends('layouts.default')
@section('body')
<div class="col-md-4">
{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
{{Form::label('email','Email')}}
{{Form::text('email', null,array('class' => 'form-control'))}}
{{Form::label('password','Password')}}
{{Form::password('password',array('class' => 'form-control'))}}
{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
{{ Form::close() }}
</div>

@stop