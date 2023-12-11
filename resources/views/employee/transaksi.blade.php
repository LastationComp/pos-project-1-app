@extends('employee.layouts.main')

@section('content')
    <div class="user-welcome flex flex-col gap-2">
        <h2 class="text-emerald-500 text-2xl font-semibold">Selamat Datang {{session()->get('employeeName')}}</h2>
        <p class="text-white font-light">{{\Carbon\Carbon::Now()->toDateString()}}</p>
    </div>

    <div class="wrapper w-[100%]  h-[90vh] overflow-auto no-scrollbar mt-5 bg-white rounded-lg border-2  shadow-md p-3">
        <div class="search-wrapper w-full flex justify-between mb-5">
            <h2 class="text-2xl font-semibold">Pencarian Produk</h2>

            <div class="flex w-[40%] gap-2">
                <div class="relative w-full bg-sky-500 rounded-md flex items-center">
                    <a href="" class="absolute left-0 ml-3">
                        <i class="fa fa-search "></i>
                    </a>
                    <input type="text" class="px-10 py-1 border-2 border-black w-full rounded-md focus: focus:border-slate-400 focus:outline-none">
                </div>
                <button type="submit" class="bg-slate-300 px-5 rounded-md">CheckOut</button>
            </div>
        </div>

        <table class="w-full mt-5" cellpadding="5">
            <thead class="">
                <tr class="bg-slate-500 text-white">
                    <td class="border-[2px] border-black">#</td>
                    <td class="border-[2px] border-black">kode obat</td>
                    <td class="border-[2px] border-black">nama obat</td>
                    <td class="border-[2px] border-black">sisa stok</td>
                    <td class="border-[2px] border-black">catatan obat</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border-[2px] border-black">
                        <div class="flex justify-center items-center">
                            <a href="{{ url('employee/beli/OBT1004') }}" class="px-3  bg-green-500 rounded-md">beli</a>
                        </div>
                    </td>
                    <td class="border-[2px] border-black">OBT1004</td>
                    <td class="border-[2px] border-black">Sangobion</td>
                    <td class="border-[2px] border-black">
                        <div class="px-2 rounded-full bg-red-500 text-white text-center font-semibold">4</div>
                    </td>
                    <td class="border-[2px] border-black"><p>{{ Str::limit('Sangobion adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya', 74) }}</p></td>
                </tr>

                <tr>
                    <td class="border-[2px] border-black">
                        <div class="flex justify-center items-center">
                            <a href="{{ url('employee/beli/OBT7008') }}" class="px-3  bg-green-500 rounded-md">beli</a>
                        </div>
                    </td>
                    <td class="border-[2px] border-black">OBT7008</td>
                    <td class="border-[2px] border-black">Benadin</td>
                    <td class="border-[2px] border-black">
                        <div class="px-2 rounded-full bg-red-500 text-white text-center font-semibold">4</div>
                    </td>
                    <td class="border-[2px] border-black"><p>{{ Str::limit('Benadin adalah vitamin penambah darah dengan kandungan gerrous gluconate di dalamnya', 74) }}</p></td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <div class="w-[25%] fixed top-[20vh] right-0 h-[80vh] bg-slate-300 p-3 ">
        <div class="flex justify-center items-center h-full hidden">
            <div>Belum ada product</div>
        </div>

        <div class="item p-3 rounded-lg">

            <h2 class="text-xl font-semibold">Sangobion</h2>
            <div class="btn-group flex">
                <a href="#" class="bg-red-500 px-3">-</a>
                <span class="px-2 bg-white">1</span>
                <a href="#" class="bg-green-500 px-3">+</a>
            </div>
        </div>
    </div> --}}
@endsection