<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if (Request::is('admin/dashboard'))
        Dashboard
     @elseif  (Request::is('admin/dashboard/settings/*'))
        Setting
    @elseif (Request::is('admin/dashboard/profile/*'))
        Profile
    @endif</title>
    @vite('resources/css/app.css')
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="overflow-hidden monsterrat">

    <div class="bg-back opacity-80 w-full h-full absolute left-0 top-0 right-0 bottom-0 bg-black z-20 hidden"
        id="bg-back"></div>

    {{-- navbar --}}
    <nav class="w-full h-fit bg-blue-500">
        <div class="header-wrapper w-full h-fit p-3 text-white relative z-10 flex items-center justify-between">
            <div class="left-side">
                <div class="flex gap-3 ">
                    <h2 class="font-mono text-2xl font-bold ml-10">Dashboard</h2>
                    <p class="self-end">Selamat datang {{ session()->get('nameAdmin') }}</p>
                </div>

                <ul class="flex gap-3 items-center mt-3 text-sm ml-14">
                    <li class="{{ Request::is('admin/dashboard') ? 'border-b-2 border-green-400' : '' }}"><a href="{{ route('dashboard_admin') }}">Home</a></li>
                    <li class="{{Request::is('admin/dashboard/settings/*') ? 'border-b-2 border-green-400' : ''}}"><a href="{{ route('settings_admin_page', session()->get('adminUsername')) }}">Settings</a></li>
                    <li class="{{ Request::is('admin/dashboard/profile/*') ? 'border-b-2 border-green-400' : ''}}"><a href="{{ route('profile_update', session()->get('adminUsername'))}}">Profile</a></li>
                </ul>
            </div>

            <div class="right-side">
                <a href="{{route('admin_logout')}}"
                    class="font-semibold text-center px-4 py-2 mr-5 bg-white text-black rounded-md text-sm">LogOut</a>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>