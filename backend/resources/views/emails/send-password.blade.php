@extends('components.head-mail') 

@section('email-body')

    <x-header-mail class="theme">
        {{ __('profile.newUser_data') }}
    </x-header-mail>

    <div id="content">
        <h4> {{ __('common.hello') }} {{ $name }}</h4>

        <p> {{ $text }} </p>

        <div class="theme" style="width: 240px; padding: 8px; margin: 8px auto; border-radius: 10px;">
           <p> <strong> {{ __('profile.email') }}: </strong> {{ $user['email'] }} </p>
           <p> <strong> {{ __('Password') }}: </strong> {{ $user['password'] }} </p> 
        </div>

        <p> {{ __('email.ignore') }} </p>
    </div>

@endsection
