<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recipie</title>
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
</head>
<body class="text-gray-600">
    <div class="min-h-screen grid md:grid-cols-8">
        <div class="md:col-span-1"> <!-- メニュー　-->
            <nav>
                <div>
                    <h1 class="font-bold uppercase p-4 border-b border-gray-100">
                        <a href="/" class=""></a>
                     </h1>
                </div>
                <ul>
                    <li class="text-gray-700 font-bold">
                        <a href="/post">
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Mypage</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>About</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="px-16 py-6 bg-gray-100 md:col-span-7"> <!-- メインコンテンツ　-->
            <headder>
                <h2 class="text-gray-700 text-6xl font-semibold">今日のごはん</h2>
                <h3 class="text-2xl font-semibold">みんなのごはん</h3>
                <x-alert />
            </headder>

            <content>
                @yield('content')
            </content>
        </main>
    </div>
    <footer class="bg-gray-200">
        <p class="p-2 text-center text-xs">Copyright © 2020 All Rights Reserved.</p>
    </footer>
</body>
</html>