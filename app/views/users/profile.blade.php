@extends('layouts.default')
<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {{ Auth::user()->email }}</p>
            <p>{{ $user_id }}</p>
            <p>{{ $user->role[0]['id'] }} {{ $user->role[0]['role'] }}</p>
            <p>{{ $user->item }}</p>
            
            <p>{{ Form::selectMonth('month') }}</p>			
            <p>{{ Form::input('number', 'off') }}</p>
         @endif
    </div>
</div>