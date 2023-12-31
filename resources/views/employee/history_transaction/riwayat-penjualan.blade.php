@extends('employee.layouts.main')

@section('content')
<div class="wrapper w-[100%] h-[88vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">

    <div class="top-head absolute top-0 left-0 w-full px-3 bg-white">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Riwayat penjualan</h2>
        </div>
    
        <div class="search-wrapper w-full flex flex-col gap-4 mt-3">
            

            <div class="flex w-[70%] gap-2">
                <div class="relative border rounded-md flex items-center">
                    <a href="" class="absolute left-0 ml-3">
                        <i class="fa fa-search text-sm"></i>
                    </a>
    
                    <input type="text" class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-white shadow-md w-full rounded-md focus: focus:border-slate-400 focus:outline-none" placeholder="search">
                </div>
                
    
                <a href="" class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-slate-300 shadow-md"><i class="bi bi-arrow-clockwise mr-2"></i> refresh</a>
                
            </div>
        </div>

    </div>
    
    <div class="table-wrapper w-[70%] h-[75%] overflow-auto no-scrollbar -z-0 mt-28">
        <table class="w-full text-md border-collapse rounded-corners rounded-t-xl overflow-hidden text-sm" cellpadding="7" cellspacing="0" border="5">
            <thead>
                <tr class=" bg-[#4B4B4B] text-white font-semibold">
                    <td class=" border border-l-0 border-t-0  border-black capitalize text-center">no. </td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize text-center">waktu pembelian</td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize">no transaksi</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">total harga</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction as $item)
                <tr class="bg-[#DFDFDF]">
                    <td class=" border border-t-0 border-black text-center">{{ $loop->iteration }}</td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">{{ $item->updated_at }}</td>
                    <td class=" border border-l-0 border-t-0 border-black font-bold">{{ $item->no_ref }}</td>
                    <td class=" border border-l-0 border-t-0 border-black italic text-sm">
                        Rp. {{ $item->total_price }}
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black text-center font-light">
                        <div class="btn-group flex gap-3 text-white w-fit mx-auto">
                            <a href="{{ route('detail_history_transaction', $item->id) }}" class="bg-sky-500 px-3 rounded-md border border-white">detail</a>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="wrapper-alert absolute right-0 top-16 z-10 w-[330px] h-full rounded-lg shadow-sm border-l-4 border-emerald-500 p-3">
        <div class="text-center border-b-2 border-emerald-500 p-2 w-full  mb-3">
            <h2 class="text-xl font-light capitalize">Rincian detail transaksi</h2>
        </div>

        
    </div>

    {{-- <div class="pagination mt-5 flex items-center w-full absolute bottom-3 left-3">
        <a href="" class=""><i class="bi px-3 py-1 bg-slate-400 bi-arrow-left"></i></a>
        <div class="page bg-slate-300 ">
            <a href="" class="border border-slate-400 px-3">1</a>
            <a href="" class="border border-slate-400 px-3">2</a>
            <a href="" class="border border-slate-400 px-3">3</a>
            <a href="" class="border border-slate-400 px-3">4</a>
            <a href="" class="border border-slate-400 px-3">5</a>
        </div>
        <a href="" class=""><i class="bi px-3 py-1 bg-slate-400 bi-arrow-right"></i></a>
    </div> --}}
</div>
@endsection