@extends('employee.layouts.main')

@section('content')
    <div class="wrapper w-[100%] h-[88vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Tambah Obat</h2>
        </div>

        <div class="form-wrapper px-5 py-2 h-[75vh]">
            <div class="btn-group flex items-center">
                <div class="btn-detail-obat px-3 py-1 border-t-4 rounded-t-md border-blue-500 bg-slate-200">
                    <button class="border-2 border-slate-100 bg-slate-300 px-3 py-1 rounded-md shadow-md">Detail
                        Obat</button>
                </div>

            </div>

            <form action="{{ route('submit_add_data_product') }}" method="POST" class="bg-slate-200 p-5 rounded-b-md h-[90%] overflow-auto no-scrollbar">
                @csrf

                <div class="detail-obat-wrapper">
                    <div class="input-group flex items-center justify-between w-[80%] mb-3 rounded-b-md">
                        <label for="name" class="text-lg font-semibold">Nama obat</label>
                        <input name="name" id="name" type="text"
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>

                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="kode" class="text-lg font-semibold">Barcode</label>
                        <input name="kode" id="kode" type="text"
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>


                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="catatan" class="text-lg font-semibold">Catatan obat</label>
                        <input name="catatan" id="catatan" type="text"
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
                    <p class="text-xl text-slate-500 font-medium mb-2 mt-5">Satuan Terkecil</p>
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="smallest_unit" class="text-lg font-semibold">Unit</label>
                        <select name="smallest_unit" id="smallest_unit"
                            class=" w-[80%] h-[35px] rounded-md border border-black ">
                            @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="stock" class="text-lg font-semibold">Stock</label>
                        <input name="stock" id="catatan" type="number"
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="price" class="text-lg font-semibold">Price</label>
                        <input name="price" id="price" type="number"
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
                </div>

                <div class="btn-group flex justify-between items-center mt-10">
                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-3 py-1 border-2 border-slate-200 text-semibold text-white bg-green-500 rounded-md shadow-md flex items-center w-fit"><i
                                class="bi bi-check-lg mr-2"></i> simpan</button>

                        <a href=""
                            class="px-3 py-1 border-2 border-slate-200 text-semibold text-white bg-slate-500 rounded-md shadow-md flex items-center w-fit"><i
                                class="bi bi-arrow-repeat mr-2"></i> reset</a>
                    </div>
                    <a href="{{route('product_page')}}"
                        class="px-3 py-1 border-2 border-slate-200 text-semibold text-white rounded-md shadow-md flex items-center w-fit bg-blue-500"><i
                            class="bi bi-box-arrow-in-left mr-2"></i> kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // const btn_detail_obat = $('.btn-detail-obat button');
        // const btn_detail_satuan = $('.btn-detail-satuan button');

        // const detail_obat_wrapper = $('.detail-obat-wrapper');
        // const detail_satuan_wrapper = $('.detail-satuan-wrapper');

        // btn_detail_obat.click(function(){
        //     detail_obat_wrapper.removeClass('hidden');
        //     detail_satuan_wrapper.addClass('hidden');
        // })

        // btn_detail_satuan.click(function(){
        //     detail_obat_wrapper.addClass('hidden');
        //     detail_satuan_wrapper.removeClass('hidden');
        // })
    </script>
@endsection
