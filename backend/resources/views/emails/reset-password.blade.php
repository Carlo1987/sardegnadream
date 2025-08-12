@extends('components.head-mail') 

@section('email-body')

    <x-header-mail class="theme">
        {{ __('Reset Password') }}
    </x-header-mail>

    <div id="content">
        <h4> {{ __('common.hello') }} {{ $user->name }}</h4>

        <p> {{ __('email.resetPassword_brief') }} </p>

        <div style="text-align:center;">
            <a href="{{ $resetUrl }}" class="button theme">
                {{ __('email.resetPassword_button') }}
            </a>
        </div>

        <p> {{ __('email.resetPassword_ignore') }} </p>
    </div>

@endsection
