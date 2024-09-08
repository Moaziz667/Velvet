<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>VELVET</title>
<style>
/* Custom Styles */
body {
    font-family: 'Playfair Display', serif;
}

.bg-primary {
    background-color: #FED9A5;
}

.text-primary {
    color: #333333;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Crimson Text', serif;
}

img {
    border-radius: 0.5rem;
}

.form-container {
    max-width: 400px;
    margin: auto;
}

.shadow-2xl {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.bg-white {
    background-color: #ffffff;
}

</style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
<!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600|crimson-text:400,400i,600&display=swap" rel="stylesheet" />
    <style>
        /* Custom Tailwind Config for Rich Aesthetic */
        @import url('https://fonts.bunny.net/css?family=playfair-display:400,500,600|crimson-text:400,400i,600&display=swap');
     
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@include('layouts.navigation')

<body class="font-serif text-primary antialiased bg-primary">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primary">
        <div class="w-full max-w-6xl mx-auto sm:flex sm:flex-row bg-white shadow-lg sm:rounded-lg border border-primary">
            <!-- Left Side - Big Image -->
            <div class="w-full sm:w-1/2">
                <img src="{{asset('storage/images/VELVET.png')}}" alt="Large Image"      class="object-cover"   style="width: 800px; height: 620px;">
            </div>

            <!-- Right Side - Form -->
            <div class="w-full sm:w-1/2 p-6 bg-white shadow-lg sm:rounded-r-lg">
                <div class="form-container">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
<x-footer/>
</html>
