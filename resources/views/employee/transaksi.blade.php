@extends('employee.layouts.main')

@section('content')
    <div class="user-welcome flex flex-col gap-1 text-white mt-3">
        <h2 class="text-2xl font-bold capitalize">Selamat Datang {{ session()->get('employeeName') }}</h2>
        <p class="font-light text-sm">{{ \Carbon\Carbon::Now()->toDateString() }}</p>
    </div>

    <div class="wrapper w-[100%] h-[75vh]  mt-5 bg-[#F1F1F1] rounded-lg border shadow-2xl p-3 relative">
        <form action="{{ route('transaction_page') }}" method="GET">
            <div class="border rounded-md flex items-center w-[40%] pt-10 absolute">
                <button  type="submit" class="absolute left-0 ml-3">
                    <i class="fa fa-search text-sm"></i>
                </button>
                <input type="search" name="search"
                    class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md w-full h-[35px] placeholder-slate-500 rounded-md focus:outline-none focus:bg-white focus:border-[#BBBBBB] transition-all"
                    placeholder="Search Kode Obat .........">
            </div>
        </form>
        <form action="{{ route('submit_checkbox_product') }}" method="POST" class="w-full h-full">
            <div class="search-wrapper absolute top-0 left-0 w-full flex justify-between p-3">
                @csrf
                <h2 class="text-2xl font-bold">Pencarian Produk</h2>

                <div class="flex w-[70%] gap-2 justify-end group">
                    <button type="submit" class="px-3 py-1 rounded-md  pl-3 flex items-center gap-3 border-r-[2px] border-b-[1px] text-sm border-white bg-[#BBBBBB] shadow-md group-hover:bg-white group-hover:border-[#BBBBBB] group-hover:text-[#BBBBBB]  transition-all "><i class="bi bi-cart-plus"></i> checkout</button>
                </div>
            </div>

            <div class="table-wrapper w-full h-[80%] overflow-auto no-scrollbar mt-20">
                <table class="w-full mt-5 text-md border-collapse rounded-corners rounded-t-xl overflow-auto"
                    cellpadding="7" cellspacing="0" border="5">
                    <thead class="sticky top-0 w-full">
                        <tr class=" bg-[#4B4B4B] text-white font-medium w-full">
                            <td class=" border border-l-0 border-t-0  border-black capitalize text-center w-[5%] rounded-tl-md">pilih</td>
                            <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%]">kode obat</td>
                            <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%]">nama obat</td>
                            <td class="  border border-l-0 border-t-0 border-r-0 border-black capitalize w-[50%] rounded-tr-xl">catatan obat</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr class="">
                                <td class=" border border-t-0 border-black">
                                    <div class="flex justify-center items-center">
                                        <input type="checkbox" name="product[]" value="{{ $item->id }}"
                                            @if (session()->has('cart_product')) {{ in_array($item->id, session()->get('cart_product')) ? 'checked' : '' }} 
                                            @endif
                                        >
                                    </div>
                                </td>
                                <td class=" border border-l-0 border-t-0 border-black italic">{{ $item->barcode }}</td>
                                <td class=" border border-l-0 border-t-0 border-black font-medium">{{ $item->product_name }}</td>
                                <td class=" border border-l-0 border-t-0 border-black text-md">
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
