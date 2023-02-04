<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>D7</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="">
            <img class="relative "
                src="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_2560,h_1122/https://www.tvu.edu.vn/wp-content/uploads/2022/12/banner-tet-scaled.jpg"
                alt="" style="width: 100%; height: 100vh; opacity: 0.8;">
            <div>
                @if (Route::has('login'))
                    <div class="hidden fixed top-4 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/KL') }}" class="rounded bg-lime-500 hover:bg-lime-600 text-white font-bold py-3 px-12">
                                Trang chủ
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-12">
                                Đăng nhập
                            </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    </div>
</body>

</html>
