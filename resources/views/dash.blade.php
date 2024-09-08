<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - VELVET</title>
    <link rel="icon" href="{{ asset('/storage/images/logo.png') }}" type="image/x-icon"/>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        
    </style>
</head>
<body class="antialiased ">
    <div id="app">
        <div class="min-h-screen flex flex-col">
            <!-- Header with Logout Button -->
            <header class="bg-gray-500 flex justify-end gap-3 items-center p-1 ">
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                
                    <button type="submit" class="flex items-center justify-center p-2 rounded-full bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition ease-in-out duration-300">
                        <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            />
                        </svg>
                    </button>
                </form>
                
                  
                </form>
                <div class="flex items-center gap-3 space-x-4">
                    <!-- Include Notification Component -->
                    
                    <p class="text-white">{{ auth()->user()->name }}</p>
                    <notif  />
                  
                </div>
                
                
            </header>
            
            <main class="flex-1">
                <div id="modal"></div> <!-- Teleport target for modal -->
                <admin-nav />
                <!-- Vue Application Content -->
            </main>
        </div>
    </div>
</body>

</html>
