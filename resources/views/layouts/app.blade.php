<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ramadan Tracker')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js for language switching -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                        habit: {
                            active: '#22c55e',
                            activeBg: '#dcfce7',
                        }
                    },
                    fontFamily: {
                        'script': ['Great Vibes', 'cursive'],
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .title-script {
            font-family: 'Great Vibes', cursive;
        }
        
        /* Custom checkbox styling */
        .prayer-check {
            transition: all 0.2s ease-in-out;
        }
        
        .prayer-check:hover {
            transform: scale(1.1);
        }
        
        /* Smooth animations */
        .habit-pill {
            transition: all 0.2s ease-in-out;
        }
        
        .habit-pill:hover {
            transform: translateY(-2px);
        }
        
        /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #fdba74;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #f97316;
        }
    </style>
    
    @livewireStyles
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-amber-50">
    @yield('content')
    
    @livewireScripts
</body>
</html>
