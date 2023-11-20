<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-50">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>
        Revisão de Veículos
    </title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @inertiaHead
</head>
<body>


<nav class="bg-white shadow border-b border-gray-100 mb-8">
    <ul class="flex justify-center">
        <a href="{{ route('owners.index') }}"
           class="p-2 border-b-4 border-blue-500 font-bold text-blue-500 hover:bg-blue-500 hover:text-white cursor-pointer transition duration-150">
            Proprietários
        </a>
    </ul>
</nav>

<div class="">
    @inertia
</div>
</body>
</html>
