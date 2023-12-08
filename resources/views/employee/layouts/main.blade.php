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
    <link rel="icon" href="https://www.goalkes.com/images/health/apotek.png">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <style >

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body class="overflow-hidden">

    <div class="bg-page absolute -z-10 w-full h-full">
        <div class="w-full h-[50vh] bg-black"></div>
        <div class="w-full h-[50vh] bg-white"></div>
    </div>

    {{-- navbar --}}
    <nav class="">
        <header class="ml-[179px] p-3 bg-black text-white">
            <div class="flex gap-7 justify-end items-center mr-5">
                <div class="border-2 border-orange-500 rounded-lg bg-slate-200  px-3 py-1 flex items-center justify-center text-orange-500">
                    <a href="">API <i class="fa fa-bullhorn ml-2"></i></a>
                </div>
                <div class="user flex gap-3 justify-start items-center">
                    <div class="bg-emerald-500 rounded-full">
                        <img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-512x512-zxne30hp.png" alt="" width="40">
                    </div>

                    <div class="flex flex-col">
                        <h3 class="font-semibold text-xl">Jimmy</h3>
                        <div>Kasir</div>
                    </div>
                </div>
                <a href=""><i class="fa fa-chevron-down"></i></a>
            </div>
        </header>

        {{-- <header class="ml-[200px]">
            <div class="wrapper flex justify-between">
                <h3 class="text-2xl font-semibold">Transaction</h3>

                <form action="">
                    <button class="px-3 py-1 bg-red-500 rounded-md mr-5">logout</button>
                </form>
            </div>
        </header> --}}

        <div class="sidebar fixed left-0 top-0 h-[100vh] bg-black border-r-8 border-emerald-500">
            <h2 class="text-emerald-500 text-3xl font-semibold text-center m-3 italic">Employee</h2>

            <ul class="flex flex-col gap-1 text-white mt-5 w-full">
                <li class="px-3 py-2 justify-between bg-white text-green-500 flex justiy-between items-center">
                    <i class="fa mr-3 fa-credit-card text-blue"></i>
                    <a href="{{ url('employee/transaction') }}" class="w-full">Transaksi </a> 
                </li>
                <li class="px-3 py-2 flex justify-between items-center ">
                    <i class="fa mr-3 fa-medkit"></i>
                    <a href="#" class="w-full">Data Produk </a> 
                </li>
                <li class="px-3 py-2 flex justify-between items-center">
                    <i class="fa mr-3 fa-users"></i>
                    <a href="#" class="w-full">Member </a> 
                </li>
                <li class="px-3 py-2 flex justify-between items-center">
                    <i class="fa mr-3 fa-history"></i>
                    <a href="#" class="w-full">Riwayat Penjualan </a> 
                </li>
                <li class="px-3 py-2 flex justify-between items-center">
                    <i class="fa mr-3 fa-car"></i>
                    <a href="#" class="w-full">Laporan Stok </a> 
                </li>
            </ul>
        </div>
    </nav>
    {{-- end of navbar --}}

    <div class="content ml-[200px] mx-5">

        
            @yield('content')
        </div>
    </div>
</body>
</html>