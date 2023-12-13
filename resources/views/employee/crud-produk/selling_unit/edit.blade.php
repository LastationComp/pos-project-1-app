@extends('employee.layouts.main')

@section('content')
    <div class="wrapper w-[100%] h-[88vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Detail Selling Unit</h2>
        </div>

        <div class="form-wrapper px-5 py-2 h-[75vh]">
            <div class="btn-group flex items-center">
                <div class="btn-detail-obat px-3 py-1 border-t-4 rounded-t-md border-blue-500 bg-slate-200">
                    <button class="border-2 border-slate-100 bg-slate-300 px-3 py-1 rounded-md shadow-md">Detail
                        Obat</button>
                    </div>
                    
                </div>
                
            <div  class="bg-slate-200 p-5 rounded-b-md h-[90%]">
                <form action="{{ url('kosong') }}" method="POST" class="w-full h-full overflow-y-auto no-scrollbar">
                    @csrf

                
                <div class="detail-obat-wrapper">
                    <div class="input-group flex items-center justify-between w-[80%] mb-3 rounded-b-md">
                        <label for="name" class="text-lg font-semibold">Nama obat</label>
                        <input name="name" id="name" type="text" value="{{$product->product_name}}" disabled
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>

                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="kode" class="text-lg font-semibold">Barcode</label>
                        <input name="kode" id="kode" type="text" value="{{$product->barcode}}" disabled
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>


                    <div class="input-group flex items-center justify-between w-[80%] mb-3">
                        <label for="catatan" class="text-lg font-semibold">Catatan obat</label>
                        <input name="catatan" id="catatan" type="text" value="{{$product->catatan_obat}}" disabled
                            class=" w-[80%] h-[35px] rounded-md border border-black p-5">
                    </div>
                    <p class="text-xl text-slate-500 font-medium mb-2 mt-5">List Selling Unit</p>
                    <table class="w-full text-md border-collapse rounded-corners rounded-t-xl" cellpadding="7" cellspacing="0" >
                        <thead>
                            <tr class=" bg-[#4B4B4B] text-white font-semibold">
                                <td class=" border border-l-0 border-t-0  border-black capitalize text-center">no. </td>
                                <td class=" border border-l-0 border-t-0 border-black capitalize text-center">aksi</td>
                                <td class=" border border-l-0 border-t-0 border-black capitalize w-[15%] text-center">Satuan</td>
                                <td class=" border border-l-0 border-t-0 border-black capitalize text-center">Satuan Terkecil?</td>
                                <td class="  border border-l-0 border-t-0 border-black capitalize text-center">Stock</td>
                                <td class=" border border-l-0 border-t-0 border-r-0 border-black capitalize w-[25%] text-center">Price </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selling_unit as $item)
                            <tr class="">
                                <td class=" border border-t-0 border-black text-center">
                                    {{$loop->iteration}}
                                </td>
                                <td class=" border border-l-0 border-t-0 border-black font-medium">
                                    <div class="btn-group mx-auto w-fit text-white text-sm flex gap-3">
                                        <a href="{{ route('edit_data_selling_unit', $item->id)}}" class="w-[25px] h-[25px] p-1 bg-green-500 flex justify-center items-center"><i class="bi bi-pencil-square"></i></a>
                                        @if ($item->is_smallest == false)
                                        <form action="{{ route('delete_selling_unit', ["product_id" => $product->id, "selling_unit_id" => $item->id]) }}" method="POST">
                                            @csrf
                                            
                                            <button onclick="return confirm('yakin ingin menghapus data Sangobion ?')" type="submit" class="w-[25px] h-[25px] p-1 bg-red-500 flex justify-center items-center"><i class="bi bi-trash3"></i></button>
                                        </form>
                                        @endif

                                    </div>
                                </td>
                                <td class=" border border-l-0 border-t-0 border-black font-medium">{{$item->name}}</td>
                                <td class=" border border-l-0 border-t-0 border-black font-bold">{{$item->is_smallest ? 'iya' : 'tidak'}}</td>
                                <td class=" border border-l-0 border-t-0 border-black text-center font-light">{{$item->stock}}</td>
                                <td class=" border border-l-0 border-t-0 border-black font-semibold">Rp. {{$item->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="btn-group flex justify-between items-center mt-10">

                    <a href="{{route('product_page')}}"
                        class="px-3 py-1 border-2 border-slate-200 text-semibold text-white rounded-md shadow-md flex items-center w-fit bg-blue-500"><i
                            class="bi bi-box-arrow-in-left mr-2"></i> kembali</a>
                </div>
            </form>
            </div>
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
