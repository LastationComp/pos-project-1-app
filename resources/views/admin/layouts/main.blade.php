<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction</title>
    @vite('resources/css/app.css')
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style >

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body class="overflow-hidden">

    {{-- navbar --}}
    <nav class="w-full h-fit bg-blue-500">
        <div class="header-wrapper w-full h-fit p-3 text-white relative z-10 flex items-center justify-between ml">
            <div class="left-side">
                <div class="flex gap-3 ">
                    <h2 class="font-mono text-2xl font-bold ml-10">Dashboard</h2>
                    <p class="self-end">Selamat datang admin majoo</p>
                </div>
    
                <ul class="flex gap-3 items-center mt-3 text-sm ml-14">
                    <li class="{{ Request::is('admin/dashboard') ? 'border-b-2 border-green-400' : '' }}"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="{{ Request::is('admin/dashboard/profile') ? 'border-b-2 border-green-400' : '' }}"><a href="{{ url('admin/dashboard/profile') }}">Profile</a></li>
                    <li class="{{ Request::is('admin/dashboard/settings') ? 'border-b-2 border-green-400' : '' }}"><a href="{{ url('admin/dashboard/settings') }}">Settings</a></li>
                </ul>
            </div>

            <div class="right-side">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="font-semibold text-center px-4 py-2 mr-5 bg-white text-black rounded-md text-sm">LogOut</button>
                </form>
            </div>
        </div>

        <div class="sidebar fixed left-0 top-0 h-full bg-blue-500 p-3 z-10 rounded-br-full">
            <div class="sidebar-wrapper h-full">
                <ul class="flex flex-col translate-y-20 mt-10 gap-5">
                    <li class="{{ Request::is('admin/dashboard') ? 'bg-white text-black' : 'text-white' }} rounded-full w-[30px] h-[30px] flex justify-center items-center transition-all"><a href="{{ url('admin/dashboard') }}" class=""><i class="fa fa-desktop "></i></a></li>
                    <li class="{{ Request::is('admin/profile') ? 'bg-white text-black' : 'text-white' }} rounded-full w-[30px] h-[30px] flex justify-center items-center transition-all"><a href="{{ url('admin/profile') }}" class=""><i class="fa fa-users "></i></a></li>
                    <li class="{{ Request::is('admin/settings') ? 'bg-white text-black' : 'text-white' }} rounded-full w-[30px] h-[30px] flex justify-center items-center transition-all"><a href="{{ url('admin/settings') }}" class=""><i class="fa fa-cog "></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content ml-[54px] p-5">
        @yield('content')
    </div>
        

    <script>
        console.log(document.querySelector('.sidebar').clientWidth)
    </script>
</body>
</html>