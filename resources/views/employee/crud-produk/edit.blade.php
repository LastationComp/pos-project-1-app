@extends('employee.layouts.main')

@section('content')
    <div class="wrapper w-[100%] h-[88vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Edit Obat</h2>
        </div>

        <div class="form-wrapper px-5 py-2 h-[75vh]">
            <div class="btn-group flex items-center">
                <div class="btn-detail-obat px-3 py-1 border-t-4 rounded-t-md border-blue-500 bg-slate-200">
                    <button class="border-2 border-slate-100 bg-slate-300 px-3 py-1 rounded-md shadow-md">Detail Obat</button>
                </div>
    
                <div class="btn-detail-satuan px-3 py-1 bg-white">
                    <button class="border-2 px-3 py-1 rounded-md shadow-md border-slate-100 bg-slate-300">Detail Satuan</button>
                </div>
            </div>

            <form action="{{ url('employee/data-produk') }}" method="POST" class="bg-slate-200 p-5 rounded-b-md h-[90%]">
                @csrf

                <div class="detail-obat-wrapper">
                    <div class="input-group flex items-center justify-between w-[80%] mb-3 rounded-b-md">
                        <label for="nama" class="text-lg font-semibold">Nama obat</label>
                        <input value="" name="nama" id="nama" type="text" class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
    
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="kode" class="text-lg font-semibold">Kode obat</label>
                        <input value="" name="kode" id="kode" type="text" class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
    
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="min_stok" class="text-lg font-semibold">Minimal stok</label>
                        <input value="" name="min_stok" id="min_stok" type="text" class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
    
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="catatan" class="text-lg font-semibold">Catatan obat</label>
                        <input value="" name="catatan" id="catatan" type="text" class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
    
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="exp" class="text-lg font-semibold">Exp date</label>
                        <input value="" name="exp" id="exp" type="text" class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
                </div>

                <div class="detail-satuan-wrapper flex-col gap-5 w-[60%] h-[80%] overflow-y-auto no-scrollbar hidden">
                    <div class="w-full py-3 border-b-2 border-blue-500">
                        <div class="input-group flex items-center justify-between w-full mb-3 rounded-b-md">
                            <label for="satuan" class="text-md font-semibold">Satuan terkecil</label>
                            <div class="w-[68%] h-[35px] rounded-md relative">
                                <button id="satuan-dropdown" data-dropdown-toggle="dropdown-satuan" type="button" type="text" class="w-full h-full rounded-md border border-black flex items-center justify-between bg-white">
                                    <div class="flex h-full items-center gap-3">
                                        <div class="h-full w-[35px] rounded-md flex items-center justify-center border-r border-black">1</div>
                                        <span>biji</span>
                                    </div>

                                    <div class="flex h-full items-center gap-3">
                                        <div class=""><i class="bi bi-chevron-down"></i></div>
                                        <div class="bg-sky-500 h-full w-[35px] rounded-md flex items-center justify-center text-white border-l border-black"><i class="bi bi-plus-lg"></i></div>
                                    </div>
                                </button>

                                <div id="dropdown-satuan" class="z-10 hidden w-full">
                                    <ul class="bg-white divide-y border" aria-labelledby="satuan-dropdown ">
                                        <li class="px-2 w-full text-center">
                                            <a href="#" class="text-slate-400 text-sm w-full inline-block">biji <i class="bi bi-capsule ml-2"></i></a>
                                        </li>
                                        <li class="px-2 w-full text-center">
                                        <a href="#" class="text-slate-400 text-sm w-full inline-block">lembar <i class="bi bi-prescription ml-2"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
        
                        <div class="input-group flex items-center justify-between w-full mb-3">
                            <label for="barcode" class="text-md font-semibold">Barcode obat</label>
                            <input value="" name="barcode" id="barcode" type="text" class=" w-[68%] h-[35px] rounded-md border border-black p-3">
                        </div>
        
                        <div class="input-group flex items-center justify-between w-full mb-3">
                            <label for="harga" class="text-md font-semibold">Harga jual</label>
                            <input value="" name="harga" id="harga" type="text" class=" w-[68%] h-[35px] rounded-md border border-black p-3">
                        </div>
        
                        <div class="input-group flex items-center justify-between w-full mb-3">
                            <label for="diskon" class="text-md font-semibold">Harga diskon</label>
                            <input value="" name="diskon" id="diskon" type="text" class=" w-[68%] h-[35px] rounded-md border border-black p-3">
                        </div>
                    </div>

                    <div class="flex gap-2 mt-3 text-sm">
                        <button type="submit" href="" class="px-3 py-1 border-2 border-slate-200 text-semibold text-white bg-sky-500 rounded-md shadow-md flex items-center w-fit"><i class="bi bi-plus mr-2"></i> tambah satuan</button>

                        <a href="" class="px-3 py-1 border-2 border-slate-200 text-semibold text-white bg-red-500 rounded-md shadow-md flex items-center w-fit"><i class="bi bi-trash2 mr-2"></i> hapus satuan</a>
                    </div>
                </div>

                <div class="btn-group flex justify-between items-center mt-10">
                    <div class="flex gap-2">
                        <button type="submit" href="" class="px-3 py-1 border-2 border-slate-200 text-semibold text-white bg-green-500 rounded-md shadow-md flex items-center w-fit"><i class="bi bi-check-lg mr-2"></i> simpan</button>

                        <a href="" class="px-3 py-1 border-2 border-slate-200 text-semibold text-white bg-slate-500 rounded-md shadow-md flex items-center w-fit"><i class="bi bi-arrow-repeat mr-2"></i> reset</a>
                    </div>
                    <a href="" class="px-3 py-1 border-2 border-slate-200 text-semibold text-white rounded-md shadow-md flex items-center w-fit bg-blue-500"><i class="bi bi-box-arrow-in-left mr-2"></i> kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script>

        const btn_detail_obat = $('.btn-detail-obat button');
        const btn_detail_satuan = $('.btn-detail-satuan button');

        const detail_obat_wrapper = $('.detail-obat-wrapper');
        const detail_satuan_wrapper = $('.detail-satuan-wrapper');

        btn_detail_obat.click(function(){
            detail_obat_wrapper.removeClass('hidden');
            detail_satuan_wrapper.addClass('hidden');
        })

        btn_detail_satuan.click(function(){
            detail_obat_wrapper.addClass('hidden');
            detail_satuan_wrapper.removeClass('hidden');
        })

    </script>
@endsection