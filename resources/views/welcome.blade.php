<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @livewireStyles
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body x-data="{message: 'hello'}">
    <h1 x-text="message" class="text-3xl font-bold underline"></h1>
    @livewireScripts
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>