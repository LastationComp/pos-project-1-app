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
                
    
                <a href="{{ route('history_page') }}" class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-slate-300 shadow-md"><i class="bi bi-arrow-clockwise mr-2"></i> refresh</a>
                
            </div>
        </div>

    </div>
    
    <div class="table-wrapper w-[70%] h-[90%] overflow-auto no-scrollbar pt-40 -z-0">
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

        <div class="wrapper-detail overflow-y-auto w-full h-[70%] bg-[#E5E5E5] rounded-lg no-scrollbar p-3 text-sm" style="z-index: -1;">
            <div class="text-center mx-auto">
                <i class="fa fa-caret-up text-slate-400 text-4xl"></i>
            </div>

            <div class="text-center  font-semibold mt-3">
                <div>{{ $transaction_detail[0]->employee->admin->client->client_name }}</div>
            </div>

            <div class="border-dashed border-slate-500 p-3 flex justify-between">
                <div>
                    <p><span class="font-semibold">Kasir :</span> {{ $transaction_detail[0]->employee->name }}</p>
                    <p><span class="font-semibold">Waktu :</span>{{ $date }}</p>
                </div>

                <div>
                    <p><span class="font-semibold">Member :</span> {{ $transaction_detail[0]->customer->name ?? '-' }}</p>
                    <p class="text-center">{{ $time }}</p>
                </div>
            </div>

            <div class="border-y-2 border-dashed border-slate-500 ">
                <table class="w-full" cellpadding="4">
                    <thead class="">
                        <tr class=" font-semibold border-b-2 border-dashed border-slate-500">
                            <td>Produk</td>
                            <td>qty</td>
                            <td>Harga</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    
                    <tbody class="" >
                        @foreach ($transaction_detail as $transaction)
                        @foreach ($transaction->transaction_lists as $transaction_list)
                        <tr>
                        <td>{{ $transaction_list->selling_unit->product->product_name }}</td>
                        <td>{{ $transaction_list->quantity }}</td>
                        <td>{{ $transaction_list->selling_unit->price }}</td>
                        <td>{{ $transaction_list->total_price }}</td>
                    </tr> 
                        @endforeach
                        
                            
                              
                        @endforeach


                    </tbody>
                </table>
            </div>

            <div class="w-[60%] text-sm p-3 gap-1">
                <div class="flex justify-between">
                    <span class="font-semibold">Total</span><span>:</span><span>Rp. {{ $transaction_detail[0]->total_price }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Tunai</span><span>:</span><span>Rp. {{ $transaction_detail[0]->pay }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Kembali</span><span>:</span><span>Rp. {{ $transaction_detail[0]->change }}</span>
                </div>
            </div>

            <div class="text-center border-t-2 border-dashed border-slate-500 p-3">
                <p class="font-semibold text-xs mt-5">Terimakasih telah berkunjung <br>
                Periksa kembali barang bawaan anda <br>
                Barang yang sudah dibeli tidak dapat dikembalikan</p>
            </div>
        </div>
    </div>

    
</div>
@endsection