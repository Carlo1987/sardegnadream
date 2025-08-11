<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Reset Password') }}</title>
    <style>
        .theme{
            background-color:rgb(118, 189, 228);
            color: white;
        }
        .button{
            display:inline-block; 
            text-decoration: none; 
            font-weight: bold; 
            border-radius: 5px;
            padding: 10px 20px; 
        }
    </style>
</head>
    <body>
        <x-header-mail class="theme">
            {{ __('Reset Password') }}
        </x-header-mail>

        <h4>Ciao {{ $user->name }}</h4>

        <p>Per reimpostare la password, clicca il pulsante qui sotto:</p>

        <main style="text-align:center;">
            <a href="{{ $resetUrl }}" class="button theme">
                Reimposta Password
            </a>
        </main>

        <p>Se non hai richiesto il reset, ignora questa email.</p>
    </body>
</html>