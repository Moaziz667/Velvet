<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> VELVET</title>

    <link rel="icon" href="{{asset('/storage/images/logo.png')}}"type="image/x-icon"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600|crimson-text:400,400i,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Tailwind Config for Rich Aesthetic */
        @import url('https://fonts.bunny.net/css?family=playfair-display:400,500,600|crimson-text:400,400i,600&display=swap');
        body {
            font-family: 'Crimson Text', serif;
            background-color: #f5f5f4;
        }
/* Container for the ticker */
.ticker-container {
    display: flex;
    white-space: nowrap;
    animation: ticker-scroll 20s linear infinite;
}

/* Scrolling text style */
.ticker-text {
    padding: 0 2rem; /* Space between repeats of the text */
    font-size: 1.25rem; /* Adjust size as needed */
    font-weight: bold;
}

/* Animation keyframes for the scrolling effect */
@keyframes ticker-scroll {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

/* Make sure to adjust the container to prevent overflow */
.relative {
    position: relative;
    width: 100%;
}
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        .bg-primary {
            background-color: #ffffff; /* Light beige, rich background */
        }
        .text-primary {
            color: #2c3e50; /* Rich dark blue for text */
        }
        .border-primary {
            border-color: #d3c0a5; /* Elegant border color */
        }
    </style>

    <!-- Scripts --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://js.stripe.com/v3/"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-primary" id="app">
    <div class="min-h-screen">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow border-b border-[#eae3d2]">
            <div class=" px-8 py-3  ">
                <h1 class="text-[#eae3d2] text-2xl font-semibold">{{ $header }}</h1>
            </div>
        </header>
    @endif
    

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <x-footer/>
</body>
</html>
