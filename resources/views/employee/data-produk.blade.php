@extends('employee.layouts.main')

@section('content')
<div class="wrapper w-[100%] h-[90vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">

    <div class="top-head absolute top-0 left-0 w-full px-3 bg-white">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Data Obat</h2>
        </div>
    
        <div class="search-wrapper w-full mt-3">
            <div class="flex w-[70%] gap-2">
                <div class="relative border rounded-md flex items-center">
                    <a href="" class="absolute left-0 ml-3">
                        <i class="fa fa-search text-sm"></i>
                    </a>
    
                    <input type="text" class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-white shadow-md w-full rounded-md focus: focus:border-slate-400 focus:outline-none" placeholder="search">
                </div>
                
    
                <a href="" class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-slate-300 shadow-md"><i class="bi bi-arrow-clockwise mr-2"></i> refresh</a>
                <a href="{{ url('employee/data-produk/create') }}" class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-green-500 text-white shadow-md"><i class="bi bi-plus mr-2"></i> Tambah</a>
            </div>
        </div>

    </div>
    
    <div class="table-wrapper w-full h-[90%] overflow-auto no-scrollbar pt-28 -z-0">
        <p class="text-sm text-slate-500 font-light mb-2">Menampilkan 1 - 10 data dari total 10M data</p>

        <table class="w-full text-md border-collapse rounded-corners rounded-t-xl overflow-hidden" cellpadding="7" cellspacing="0" border="5">
            <thead>
                <tr class=" bg-[#4B4B4B] text-white font-semibold">
                    <td class=" border border-l-0 border-t-0  border-black capitalize text-center">no. </td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize text-center">aksi</td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%]">nama obat</td>
                    <td class=" border border-l-0 border-t-0 border-black capitalize">kode obat</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">sisa stok</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">satuan unit</td>
                    <td class="  border border-l-0 border-t-0 border-black capitalize text-center">harga</td>
                    <td class=" border border-l-0 border-t-0 border-r-0 border-black capitalize w-[25%]">catatan obat</td>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td class=" border border-t-0 border-black text-center">
                        1
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">
                        <div class="btn-group mx-auto w-fit text-white text-sm flex gap-3">
                            <a href="{{ url('employee/data-produk/Sangobion/edit') }}" class="w-[25px] h-[25px] p-1 bg-green-500 flex justify-center items-center"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ url('employee/data-produk/Sangobion') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button onclick="confirm('yakin ingin menghapus data Sangobion ?')" type="button" class="w-[25px] h-[25px] p-1 bg-red-500 flex justify-center items-center"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">Sangobion</td>
                    <td class=" border border-l-0 border-t-0 border-black font-bold">OBT1614120001</td>
                    <td class=" border border-l-0 border-t-0 border-black italic text-sm">
                        <div class="px-5 rounded-full text-white bg-red-500 w-fit mx-auto">4</div>
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black text-center font-light">Biji</td>
                    <td class=" border border-l-0 border-t-0 border-black text-center font-semibold">Rp. 7.500</td>
                    <td class=" border border-l-0 border-t-0 border-black font-semibold">2 x 1 dewasa</td>
                </tr>

                <tr class="bg-[#DFDFDF]">
                    <td class=" border border-t-0 border-black text-center">
                        2
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">
                        <div class="btn-group mx-auto w-fit text-white text-sm flex gap-3">
                            <a href="{{ url('employee/data-produk/Catafalm/edit') }}" class="w-[25px] h-[25px] p-1 bg-green-500 flex justify-center items-center"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ url('employee/data-produk/Catafalm') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button onclick="confirm('yakin ingin menghapus data Catafalm ?')" type="button" class="w-[25px] h-[25px] p-1 bg-red-500 flex justify-center items-center"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black font-medium">Catafalm</td>
                    <td class=" border border-l-0 border-t-0 border-black font-bold">OBT1614120002</td>
                    <td class=" border border-l-0 border-t-0 border-black italic text-sm">
                        <div class="px-5 rounded-full bg-green-500 w-fit mx-auto">11</div>
                    </td>
                    <td class=" border border-l-0 border-t-0 border-black text-center font-light">Biji</td>
                    <td class=" border border-l-0 border-t-0 border-black text-center font-semibold">Rp. 7.500</td>
                    <td class=" border border-l-0 border-t-0 border-black font-semibold">2 x 1 dewasa</td>
                </tr>
            </tbody>
        </table>
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