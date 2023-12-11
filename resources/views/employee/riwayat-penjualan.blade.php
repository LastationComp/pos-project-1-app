@extends('employee.layouts.main')

@section('content')
<div class="wrapper w-[100%] h-[88vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">

    <div class="top-head absolute top-0 left-0 w-full px-3 bg-white">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Riwayat penjualan</h2>
        </div>
    
        <div class="search-wrapper w-full flex flex-col gap-4 mt-3">
            <div class="w-[70%] flex items-center gap-3">
                <span for="" class="text-sm font-semibold">Periode Pencarian</span>
                <div class="relative rounded-md py-1 pr-7 pl-3 flex items-center gap-3 border-r-[2px] border-b-[1px] text-sm border-white bg-white shadow-md w-[150px]">
                    <button id="member-dropdown" data-dropdown-toggle="dropdown-member" class="flex items-center gap-2 w-full h-full">
                        <span class="font-light text-sm">hari ini</span>
                        <div class="absolute right-0 top-0 bg-slate-300 rounded-r-md h-full flex items-center px-1">
                            <i class="bi bi-chevron-down font-bold"></i>
                        </div>
                    </button>
    
                    <div id="dropdown-member" class="z-10 hidden ">
                        <ul class="bg-white divide-y border" aria-labelledby="member-dropdown">
                            <li class="px-2">
                                <a href="#" class="text-slate-400 text-sm">hari ini <i class="bi bi-calendar-event ml-2"></i></a>
                            </li>
                            <li class="px-2">
                            <a href="#" class="text-slate-400 text-sm">abad kemarin <i class="bi bi-calendar2-x ml-2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex w-[70%] gap-2">
                <div class="relative border rounded-md flex items-center">
                    <a href="" class="absolute left-0 ml-3">
                        <i class="fa fa-search text-sm"></i>
                    </a>
    
                    <input type="text" class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-white shadow-md w-full rounded-md focus: focus:border-slate-400 focus:outline-none" placeholder="search">
                </div>
                
    
                <a href="" class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-slate-300 shadow-md"><i class="bi bi-arrow-clockwise mr-2"></i> refresh</a>
                <a href="" class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-green-500 text-white shadow-md"><i class="bi bi-plus mr-2"></i> Tambah</a>
            </div>
        </div>

    </div>
    
    <div class="table-wrapper w-[70%] h-[90%] overflow-auto no-scrollbar pt-40 -z-0">
        <table class="w-full text-md border-collapse rounded-corners rounded-t-xl overflow-hidden text-sm" cellpadding="7" cellspacing="0" border="5">
            <thead>
                <tr class=" bg-[#4B4B4B] text-white font-semibold">
                    <td class=" border border-l-0 border-t-0  border-black capitalize text-center">no. </td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize text-center">waktu pembelian</td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%]">nama pembeli</td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize">no transaksi</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">total harga</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">aksi</td>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-[#DFDFDF]">
                    <td class=" border border-t-0 border-black text-center">1</td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">23 Nov 2020 - 06.02.57</td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">Heru eddi winarto</td>
                    <td class=" border border-l-0 border-t-0 border-black font-bold">20230908-111111</td>
                    <td class=" border border-l-0 border-t-0 border-black italic text-sm">
                        Rp. 7.500
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black text-center font-light">
                        <div class="btn-group flex gap-3 text-white w-fit mx-auto">
                            <a href="" class="bg-sky-500 px-3 rounded-md border border-white">detail</a>
                            <a href="" class="bg-slate-500 px-3 rounded-md border border-white">print</a>
                        </div>
                    </td>
                </tr>
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
                <div>Toko Anda</div>
                <div>jl. xxxxxxx Raya. xxxxx</div>
            </div>

            <div class="border-dashed border-slate-500 p-3 flex justify-between">
                <div>
                    <p><span class="font-semibold">Kasir :</span> Lorem</p>
                    <p><span class="font-semibold">Waktu :</span> 16/11/2023</p>
                </div>

                <div>
                    <p><span class="font-semibold">Member :</span> John Doe</p>
                    <p class="text-center">08:52:40</p>
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
                        <tr>
                            <td>Sangobion</td>
                            <td>2</td>
                            <td>12.000</td>
                            <td>24.000</td>
                        </tr>

                        <tr>
                            <td>Histigo</td>
                            <td>1</td>
                            <td>8.000</td>
                            <td>8.000</td>
                        </tr>

                        <tr>
                            <td>Bodrex</td>
                            <td>1</td>
                            <td>8.000</td>
                            <td>8.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="w-[60%] text-sm p-3 gap-1">
                <div class="flex justify-between">
                    <span class="font-semibold">Total</span><span>:</span><span>Rp. 42.000,-</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Tunai</span><span>:</span><span>Rp. 50.000,-</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Kembali</span><span>:</span><span>Rp. 8.000,-</span>
                </div>
            </div>

            <div class="text-center border-t-2 border-dashed border-slate-500 p-3">
                <p class="font-semibold text-xs mt-5">Terimakasih telah berkunjung <br>
                Periksa kembali barang bawaan anda <br>
                Barang yang sudah dibeli tidak dapat dikembalikan</p>
            </div>
        </div>
    </div>

    <div class="pagination mt-5 flex items-center w-full absolute bottom-3 left-3">
        <a href="" class=""><i class="bi px-3 py-1 bg-slate-400 bi-arrow-left"></i></a>
        <div class="page bg-slate-300 ">
            <a href="" class="border border-slate-400 px-3">1</a>
            <a href="" class="border border-slate-400 px-3">2</a>
            <a href="" class="border border-slate-400 px-3">3</a>
            <a href="" class="border border-slate-400 px-3">4</a>
            <a href="" class="border border-slate-400 px-3">5</a>
        </div>
        <a href="" class=""><i class="bi px-3 py-1 bg-slate-400 bi-arrow-right"></i></a>
    </div>
</div>
@endsection