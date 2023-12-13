@extends('employee.layouts.main')

@section('content')
    <div class="user-welcome flex flex-col gap-1 text-white mt-3">
        <h2 class="text-2xl font-semibold">Selamat Datang {{ session()->get('employeeName') }}</h2>
        <p class="font-light text-sm">{{ \Carbon\Carbon::Now()->toDateString() }}</p>
        
        
    </div>
    <div class="wrapper w-[100%] h-[75vh]  mt-5 bg-[#F1F1F1] rounded-lg border shadow-2xl p-3 relative">
        <form  action="{{ route('transaction_page') }}" method="GET">
            
            <div class="relative border rounded-md flex items-center">
                <button  type="submit" class="absolute left-0 ml-3">
                    <i class="fa fa-search text-sm"></i>
                </button>
                <input type="search" name="search"
                    class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md w-full rounded-md focus: focus:border-slate-400 focus:outline-none"
                    placeholder="Search Kode Obat">
            </div>
        </form>
        <form action="{{ route('submit_checkbox_product') }}" method="POST" class="">
            <div class="search-wrapper  top-0 left-0 w-full flex justify-between p-3">
                @csrf
                <h2 class="text-2xl font-bold">Pencarian Produk</h2>

<<<<<<< HEAD
        <div class="table-wrapper w-full h-full overflow-auto no-scrollbar mt-10">
            <table class="w-full mt-5 text-md border-collapse rounded-corners rounded-t-xl overflow-hidden" cellpadding="7" cellspacing="0" border="5">
                <thead>
                    <tr class=" bg-[#4B4B4B] text-white font-semibold">
                        <td class=" border border-l-0 border-t-0  border-black capitalize text-center">pilih</td>
                        <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%]">kode obat</td>
                        <td class=" border border-l-0 border-t-0 border-black capitalize w-[20%]">nama obat</td>
                        <td class=" border border-l-0 border-t-0 border-black capitalize w-[8%]">sisa stok</td>
                        <td class="  border border-l-0 border-t-0 border-r-0 border-black capitalize">catatan obat</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="">
                        <td class=" border border-t-0 border-black">
                            <div class="flex justify-center items-center">
                                {{-- <a href="{{ url('employee/beli/OBT1614120001') }}" class="px-3  bg-green-500 text-white">beli</a> --}}
                                <input type="checkbox"  
                                @if (session('cart'))
                                @foreach ( session()->get('cart') as $cart )
                                    {{ $cart['kode'] == 'OBT1614120001' ? 'disabled checked' :  '' }}
                                @endforeach
                                @endif 
                                name="OBT1614120001" value="OBT1614120001" class="accent-white">
=======
                <div class="flex w-[70%] gap-2 justify-end">
                    

                    <div
                        class="relative rounded-md py-1 pr-7 pl-3 flex items-center gap-3 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md">
                        <button id="member-dropdown" data-dropdown-toggle="dropdown-member" class="flex items-center gap-2">
                            <span class="bi bi-people"></span>
                            <span
                                class="w-[.3px] h-[17px] rounded-full border-r-2 border border-l-0 border-t-0 border-black"></span>
                            <span class="font-light text-sm">kode member</span>
                            <div class="absolute right-0 top-0 bg-slate-300 rounded-r-md h-full flex items-center px-1">
                                <i class="bi bi-chevron-down font-bold"></i>
>>>>>>> 496b2c473b119a31668ff93b3368d11f04747fd7
                            </div>
                        </button>

<<<<<<< HEAD
                    <tr class="">
                        <td class=" border border-t-0 border-black">
                            <div class="flex justify-center items-center">
                                {{-- <a href="{{ url('employee/beli/OBT1614120003') }}" class="px-3  bg-green-500 text-white">beli</a> --}}
                                <input type="checkbox"  
                                @if (session('cart'))
                                @foreach ( session()->get('cart') as $cart )
                                    {{ $cart['kode'] == 'OBT1614120003' ? 'disabled checked' :  '' }}
                                @endforeach
                                @endif 
                                name="OBT1614120003" value="OBT1614120003" class="accent-white">
                            </div>
                        </td>
                        <td class=" border border-l-0 border-t-0 border-black font-medium">OBT1614120003</td>
                        <td class=" border border-l-0 border-t-0 border-black">Nganyobion</td>
                        <td class=" border border-l-0 border-t-0 border-black">
                            <div class="rounded-full bg-green-500 text-black text-center text-sm w-fit px-5 mx-auto">15</div>
                        </td>
                        <td class=" border border-l-0 border-t-0 border-black"><p>{{ Str::limit('Nganyobion adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya', 65) }}</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
=======
>>>>>>> 496b2c473b119a31668ff93b3368d11f04747fd7

                        <div id="dropdown-member" class="z-10 hidden ">
                            <ul class="bg-white divide-y border" aria-labelledby="member-dropdown">
                                <li class="px-2">
                                    <a href="#" class="text-slate-400 text-sm">member <i
                                            class="bi bi-person-fill-check ml-2"></i></a>
                                </li>
                                <li class="px-2">
                                    <a href="#" class="text-slate-400 text-sm">non member <i
                                            class="bi bi-clipboard-x ml-2"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button type="submit"
                        class="px-3 py-1 rounded-md  pl-3 flex items-center gap-3 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md">check
                        out</button>
                </div>
            </div>

            <div class="table-wrapper w-full h-full overflow-auto no-scrollbar mt-10">
                <table class="w-full mt-5 text-md border-collapse rounded-corners rounded-t-xl overflow-hidden"
                    cellpadding="7" cellspacing="0" border="5">
                    <thead>
                        <tr class=" bg-[#4B4B4B] text-white font-semibold">
                            <td class=" border border-l-0 border-t-0  border-black capitalize text-center">pilih</td>
                            <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%]">kode obat</td>
                            <td class=" border border-l-0 border-t-0 border-black capitalize w-[20%]">nama obat</td>
                            <td class="  border border-l-0 border-t-0 border-r-0 border-black capitalize">catatan obat</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr class="">
                                <td class=" border border-t-0 border-black">
                                    <div class="flex justify-center items-center">

                                        <input type="checkbox" name="product[]" value="{{ $item->id }}"
                                            @if (session()->has('cart_product')) {{ in_array($item->id, session()->get('cart_product')) ? 'checked' : '' }} @endif>
                                    </div>
                                </td>
                                <td class=" border border-l-0 border-t-0 border-black font-medium">{{ $item->barcode }}</td>
                                <td class=" border border-l-0 border-t-0 border-black">{{ $item->product_name }}</td>
                                <td class=" border border-l-0 border-t-0 border-black">
                                    <p>{{ Str::limit($item->catatan_obat, 65) }}</p>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </form>
        
    </div>
@endsection
