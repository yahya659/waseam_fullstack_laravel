<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $meta_title ?? null ? $meta_title . ' | ' . ($settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام')) : $settings['site_name'] ?? config('app.name', 'مؤسسة صاحب الوسام') . ' | ' . ($page_title ?? 'الصفحة الرئيسية') }}
    </title>
    @if (!empty($meta_description ?? null))
        <meta name="description" content="{{ $meta_description }}">
    @endif
    @if (!empty($meta_keywords ?? null))
        <meta name="keywords" content="{{ $meta_keywords }}">
    @endif
    <meta property="og:title" content="{{ $meta_title ?? ($settings['site_name'] ?? 'مؤسسة صاحب الوسام') }}">
    @if (!empty($meta_description ?? null))
        <meta property="og:description" content="{{ $meta_description }}">
    @endif

    @if (isset($settings['site_favicon']))
        <link rel="icon" href="{{ asset('storage/' . $settings['site_favicon']) }}">
    @endif


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/app.css')

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#061e29',
                        secondary: '#c6c9cc',
                        accent: '#c99a2c',
                    },
                    fontFamily: {
                        sans: ['Tajawal', 'sans-serif'],
                    },
                    container: {
                        center: true,
                        padding: '1rem',
                        screens: {
                            sm: '600px',
                            md: '728px',
                            lg: '984px',
                            xl: '1240px',
                            '2xl': '1280px',
                        },
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="bg-gray-50 text-gray-800 font-sans overflow-x-hidden selection:bg-accent selection:text-white">
    {{-- <div class="min-h-screen flex flex-col"> --}}
    @include('partials.header')

    {{-- <main class="flex-grow"> --}}
    @yield('content')
    {{-- </main> --}}

    @include('partials.footer')
    {{-- </div> --}}


    <!-- Scripts -->
    <!-- Lightbox Modal -->
    {{-- <div id="lightbox"
        class="fixed inset-0 z-50 bg-black/90 hidden  justify-center items-center opacity-0 transition-opacity duration-300">
        <button id="lightbox-close"
            class="absolute top-5 right-5 text-white text-4xl hover:text-accent transition-colors">&times;</button>
        <button id="lightbox-prev"
            class="absolute left-5 text-white text-4xl hover:text-accent transition-colors hidden md:block"><i
                class="fa-solid fa-chevron-left"></i></button>
        <button id="lightbox-next"
            class="absolute right-5 text-white text-4xl hover:text-accent transition-colors hidden md:block"><i
                class="fa-solid fa-chevron-right"></i></button>
        <img id="lightbox-img" src="" alt="Full Image"
            class="max-h-[90vh] max-w-[90vw] object-contain shadow-2xl rounded-lg transform scale-95 transition-transform duration-300">
    </div> --}}

    <!-- Lightbox -->
    <div id="lightbox"
        class="fixed inset-0 z-[60] bg-black/95 hidden opacity-0 transition-opacity duration-300 flex items-center justify-center">
        <!-- Controls -->
        <div class="absolute top-6 right-6 flex items-center gap-4 z-50">
            <button id="lightbox-zoom"
                class="text-white text-2xl hover:text-accent transition-colors focus:outline-none"
                title="تكبير/تصغير"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
            <button id="lightbox-close"
                class="text-white text-4xl hover:text-accent transition-colors focus:outline-none" title="إغلاق"><i
                    class="fa-solid fa-times"></i></button>
        </div>

        <button id="lightbox-prev"
            class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-accent transition-colors p-4 focus:outline-none bg-black/20 hover:bg-black/40 rounded-full w-12 h-12 flex items-center justify-center z-10"><i
                class="fa-solid fa-chevron-left"></i></button>
        <button id="lightbox-next"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-accent transition-colors p-4 focus:outline-none bg-black/20 hover:bg-black/40 rounded-full w-12 h-12 flex items-center justify-center z-10"><i
                class="fa-solid fa-chevron-right"></i></button>

        <!-- Image Container -->
        <div class="relative max-h-[90vh] max-w-[90vw] overflow-hidden flex flex-col items-center">
            <img id="lightbox-img" src="" alt="Full size"
                class="max-h-[85vh] max-w-full object-contain transform scale-95 transition-transform duration-500 select-none cursor-grab">
            <p id="lightbox-caption"
                class="text-white text-center mt-4 text-lg font-medium opacity-0 transition-opacity duration-300 transform translate-y-2">
            </p>
        </div>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
