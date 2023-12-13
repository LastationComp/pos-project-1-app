@extends('employee.layouts.main')

@section('content')

<div class="user-welcome flex flex-col gap-1 text-white mt-3">
    <h2 class="text-2xl font-semibold">Selamat Datang {{session()->get('employeeName')}}</h2>
    <p class="font-light text-sm">{{\Carbon\Carbon::Now()->toDateString()}}</p>
</div>

<div class="wrapper w-[100%] h-[75vh]  mt-5 bg-[#F1F1F1] rounded-lg border shadow-2xl p-3 relative">
    <form action="{{ url('employee/beli') }}" method="POST" class="w-full h-full">
    <div class="search-wrapper absolute top-0 left-0 w-full flex justify-between p-3">
            @csrf
            <h2 class="text-2xl font-bold">Pencarian Produk</h2>

            <div class="flex w-[70%] gap-2 justify-end">
                <div class="relative border rounded-md flex items-center">
                    <a href="" class="absolute left-0 ml-3">
                        <i class="fa fa-search text-sm"></i>
                    </a>

                    <input type="text" class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md w-full rounded-md focus: focus:border-slate-400 focus:outline-none" placeholder="search/scan barcode">
                </div>
                
                <div class="relative rounded-md py-1 pr-7 pl-3 flex items-center gap-3 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md">
                    <button id="member-dropdown" data-dropdown-toggle="dropdown-member" class="flex items-center gap-2">
                        <span class="bi bi-people"></span>
                        <span class="w-[.3px] h-[17px] rounded-full border-r-2 border border-l-0 border-t-0 border-black"></span>
                        <span class="font-light text-sm">kode member</span>
                        <div class="absolute right-0 top-0 bg-slate-300 rounded-r-md h-full flex items-center px-1">
                            <i class="bi bi-chevron-down font-bold"></i>
                        </div>
                    </button>


                    <div id="dropdown-member" class="z-10 hidden ">
                        <ul class="bg-white divide-y border" aria-labelledby="member-dropdown">
                            <li class="px-2">
                                <a href="#" class="text-slate-400 text-sm">member <i class="bi bi-person-fill-check ml-2"></i></a>
                            </li>
                            <li class="px-2">
                            <a href="#" class="text-slate-400 text-sm">non member <i class="bi bi-clipboard-x ml-2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <button type="submit" class="px-3 py-1 rounded-md  pl-3 flex items-center gap-3 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md">check out</button>
            </div>
        </div>

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
                            </div>
                        </td>
                        <td class=" border border-l-0 border-t-0 border-black font-medium">OBT1614120001</td>
                        <td class=" border border-l-0 border-t-0 border-black">Sangobion</td>
                        <td class=" border border-l-0 border-t-0 border-black">
                            <div class="rounded-full bg-red-500 text-white text-center text-sm w-fit px-5 mx-auto">4</div>
                        </td>
                        <td class=" border border-l-0 border-t-0 border-black"><p>{{ Str::limit('Sangobion adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya', 65) }}</p></td>
                    </tr>

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

    @if( session('cart') )
    <div class="cart-wrapper w-[80%] h-[45vh] bg-slate-300 rounded-t-lg border shadow-2xl p-5 fixed bottom-0 left-0 ml-[240px] transition-all">
        <div class="btn-updown absolute z-50 -top-6 left-1/2 -translate-x-1/2">
            <button class="text-xl bg-white rounded-full flex justify-center items-center w-[35px] h-[35px] shadow-sm border"><i class="fa fa-chevron-down"></i></button>
        </div>
        <div class="flex gap-5 px-5 h-full w-full justify-evenly relative mt-3">
            <div class="list-checkout-wrapper border border-black rounded-lg w-full h-full relative">
                <div class="btn-group flex gap-3 bg-slate-300 rounded-lg p-3 absolute top-0 left-0 z-10 w-full">
                    <div class="relative rounded-md flex items-center">
                        <a href="" class="absolute left-0 ml-3">
                            <i class="fa fa-search "></i>
                        </a>
                        <input type="text" class="px-10 py-1 border-2 bg-slate-300 w-full rounded-md focus:border-slate-400 focus:outline-none">
                    </div>
                    <a href="{{ url('employee/transaction') }}" class="px-3 py-1 bg-green-500 text-white rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-plus mr-2"></i> Tambah</a>
                    <a href="" class="px-3 py-1 bg-slate-100 rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-repeat mrf-2"></i> Reset</a>
                    <a href="{{ url('employee/batal') }}" onclick="return confirm('apakah yakin ingin membatalkan transaksi?')" class="px-3 py-1 bg-red-500 text-white rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-angle-double-left mr-2"></i> Batal</a>
                </div>

                <div class="list-item p-3 rounded-lg overflow-auto no-scrollbar h-full pt-14 relative -z-0 divide-y-2">
                    @foreach ( session('cart') as $cart )
                        <div class="item flex justify-between p-3 border-slate-600">
                            <div>
                                <h3 class="font-semibold text-xl">{{ $cart['nama'] }}</h3>
                                
                                <select name="satuan" id="" class="bg-transparent">
                                    <option value="lembar">Lembar</option>
                                    <option value="biji">biji</option>
                                </select>
                            </div>

                            <div class="flex gap-5 justify-center items-center">
                                <div class="btn-group flex justify-center items-center gap-2">
                                    <div class="flex justify-center items-center px-2 py-1 rounded-md bg-slate-300 border border-slate-400 w-fit h-fit">
                                        <a href="{{ url('/employee/kurang/' . $cart['kode']) }}" class="w-[18px] h-[18px] border border-black rounded-full flex justify-center items-center text-sm"><i class="fa fa-minus"></i></a>
                                    </div>
                                    <div class="px-5 rounded-md border border-slate-400 w-fit h-fit flex justify-center items-center">
                                        <span>{{ $cart['jumlah'] }}</span>
                                    </div>
                                    <div class="flex justify-center items-center px-2 py-1 rounded-md bg-slate-300 border border-slate-400 w-fit h-fit">
                                        <a href="{{ url('/employee/tambah/' . $cart['kode']) }}" class="w-[18px] h-[18px] border border-black rounded-full flex justify-center items-center text-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <h3 class="text-xl font-semibold">Rp.` 10. 000</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        
        $('.btn-updown').click(function(){
            $('.cart-wrapper').toggleClass('h-0 h-[45vh]')
            $('.btn-updown button i').toggleClass('fa-chevron-down fa-chevron-up')
        });

    </script>
@endsection