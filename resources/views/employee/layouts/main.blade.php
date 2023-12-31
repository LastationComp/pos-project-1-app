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
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    {{-- icon web --}}
    <link rel="icon" href="https://www.goalkes.com/images/health/apotek.png">
    {{-- font source sans pro --}}
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <style >

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .custom-scrollbar::-webkit-scrollbar {
            position: absolute;
            left: 0;
            width: 5px;
            height: 20px;
            border-radius: 5px;
            background-color: red;
        }

        table.rounded-corners {
            border-collapse: separate;
        }

    </style>
</head>
<body class="overflow-hidden tracking-wide">


    <div class="bg-page absolute -z-20 w-full h-full">
        <div class="w-full h-full bg-gradient-to-r from-[#28A446] to-[#28656A]"></div>
    </div>

    {{-- navbar --}}
    <nav class="">
        <header class="{{ session()->has('transaction_id') ? '' : 'ml-[179px]' }}  text-white p-2 border-b border-slate-300">
            <div class="flex gap-10 justify-end items-center mr-5">
                {{-- <div class="border-2 border-[#FF2204] rounded-xl bg-white flex items-center justify-center text-[#FF2204] px-2 font-bold relative text-sm">
                    <i class="bi bi-megaphone-fill p-1 mr-1"></i>
                    <a href="">API</a>
                    <i class="fa fa-circle absolute -top-1 -right-1 text-xs"></i>
                </div> --}}

                <div class="user flex gap-2 justify-start items-center">
                    <div class="bg-sky-500 w-[35px] h-[35px] rounded-full">
                        <div class="rounded-full w-full h-full bg-cover bg-center" style="background-image: url( {{ asset('images/'. session()->get('avatar_url')) }} );" ></div>
                    </div>

                    <div class="flex flex-col">
                        <h3 class="text-md font-semibold">{{session()->get('employeeName')}}</h3>
                        <p class="text-xs font-medium italic text-slate-300">Kasir</p>
                    </div>
                </div>

                <div class="dropdown-wrapper  {{ session()->has('transaction_id') ? 'opacity-0' : '' }}">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button" class="" ><i class="fa fa-chevron-down"></i>
                    </button>

                    <div id="dropdown" class="z-10 hidden">
                        <ul class="bg-white divide-y" aria-labelledby="dropdownDefaultButton">
                            <li class="px-2">
                                <a href="{{ route('profile_update_employee', session()->get('employee_code')) }}" class="text-slate-400 text-sm">Settings <i class="fa fa-cogs ml-2"></i></a>
                            </li>
                            <li class="px-2">
                              <a href="{{ route('employee_logout')}}" class="text-slate-400 text-sm">Logout <i class="fa fa-key ml-2"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </header>

        <div class="sidebar fixed left-0 top-0 {{ session()->has('transaction_id') ? 'hidden' : 'h-[100vh]' }} bg-black outfit">
            <div class="logo-wrapper flex items-center mx-7 my-3">
                <div><img src="{{ asset('img/Lastation.png') }}" width="30" alt=""></div>
                <h2 class="text-white text-md font-extrabold m-3 leading-5 w-[110px]">
                    Apotek <br>{{ session()->get('client_name') }}
                </h2>
            </div>


            <ul class="flex flex-col gap-1 text-white w-full">
                <li class="px-3 py-2 justify-between {{ Request::is('employee/transaction*') ? 'bg-gradient-to-l from-[#28A446] to-[#28656A]' : '' }} flex justiy-between items-center">
                    <a href="{{ url('employee/transaction') }}" class="w-full"><i class="bi bi-cash-stack mr-2"></i> Transaksi </a>
                </li>
                <li class="px-3 py-2 flex justify-between items-center {{ Request::is('employee/member*') ? 'bg-gradient-to-l from-[#28A446] to-[#28656A]' : '' }}">
                    <a href="{{ route('member_page') }}" class="w-full"><i class="bi bi-people mr-2"></i> Member </a>
                </li>
                <li class="px-3 py-2 flex justify-between items-center {{ Request::is('employee/product*') ? 'bg-gradient-to-l from-[#28A446] to-[#28656A]' : '' }}">
                    <a href="{{ route('product_page') }}" class="w-full"><i class="bi bi-boxes mr-2"></i> Data Produk </a>
                </li>
                <li class="px-3 py-2 flex justify-between items-center {{ Request::is('employee/history*') ? 'bg-gradient-to-l from-[#28A446] to-[#28656A]' : '' }}">
                    <i class="bi bi-calendar-week mr-3"></i>
                    <a href="{{ route('history_page') }}" class="w-full">Riwayat Penjualan </a>
                </li>
                
            </ul>
        </div>
        
        
    </nav>
    {{-- end of navbar --}}

    {{ session()->get('transaction_id') }}


    <div class="content {{ session()->has('transaction_id') ? 'w-[80%] mx-auto' : 'ml-[240px] mx-5' }}">
        @yield('content')
    </div>


        @yield('content-js')
</body>
</html>