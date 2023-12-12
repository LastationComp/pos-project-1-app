@extends('employee.layouts.main')

@section('content')
    <div class="wrapper w-[100%] h-[88vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Tambah Selling Unit Product</h2>
        </div>

        <div class="form-wrapper px-5 py-2 h-[75vh]">
            <div class="btn-group flex items-center">
                <div class="btn-detail-obat px-3 py-1 border-t-4 rounded-t-md border-blue-500 bg-slate-200">
                    <button class="border-2 border-slate-100 bg-slate-300 px-3 py-1 rounded-md shadow-md">Tambah
                        Selling Unit</button>
                </div>

            </div>

            <form action="{{ route('submit_add_selling_unit', $product->id) }}" method="POST"
                class="bg-slate-200 p-5 rounded-b-md h-[90%] overflow-auto no-scrollbar">
                @csrf

                <div class="detail-obat-wrapper">
                    @if ($message = Session::get('error'))
                        <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-1/2"
                            role="alert">
                            <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </span>
                            <p class="ml-6">{{ $message }}</p>
                        </div>
                    @endif
                    <div class="input-group flex items-center justify-between w-[80%] mb-3 rounded-b-md">
                        <label for="name" class="text-lg font-semibold">Nama obat</label>
                        <input name="name" id="name" type="text" value="{{ $product->product_name }}" disabled
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>

                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="kode" class="text-lg font-semibold">Barcode</label>
                        <input name="kode" id="kode" type="text" value="{{ $product->barcode }}" disabled
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>


                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="catatan" class="text-lg font-semibold">Catatan obat</label>
                        <input name="catatan" id="catatan" type="text" value="{{ $product->catatan_obat }}" disabled
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
                    <p class="text-xl text-slate-500 font-medium mb-2 mt-5">Satuan Unit</p>
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
                    <a href="{{ route('product_page') }}"
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
