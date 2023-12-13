@extends('employee.layouts.main')

@section('content')
<div class="wrapper w-[100%] h-[85vh]  mt-5 bg-[#F1F1F1] rounded-lg border shadow-2xl p-3 relative">
    
        <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
            <h2 class="text-3xl font-light capitalize">Pembelian Obat</h2>
        </div>

<div class="flex gap-5 px-5 h-[85%] justify-evenly relative mt-3">
    <div class="list-checkout-wrapper border border-black rounded-lg w-[50%] h-full relative">
        <div class="btn-group flex gap-3 bg-slate-300 rounded-lg p-3 absolute top-0 left-0 z-10 w-full">
            <a href="{{ route('back_to_check_product') }}" onclick="return confirm('apakah yakin ingin membatalkan transaksi?')" class="px-3 py-1 bg-red-500 text-white rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-angle-double-left mr-2"></i> Batal</a>
        </div>

        <div class="list-item p-3 rounded-lg overflow-auto no-scrollbar h-full pt-14 relative -z-0 divide-y-2">
            @foreach ($transaction_list as $transaction_list)
                
            
                <div class="2-full item flex justify-between p-3 border-slate-600">
                    <div>
                        <h3 class="font-semibold text-xl">{{ $transaction_list->selling_unit->product->product_name }}</h3>
                        <span class="text-md font-normal text-black">{{ $transaction_list->quantity }} x {{ $transaction_list->selling_unit->unit->name }}</span>
                    </div>

                    <div class="flex gap-5 justify-between   items-center">
                        <div class="btn-group flex justify-center items-center gap-2">
                                <span class="font-bold">Rp. </span><input class="font-bold" value="{{ $transaction_list->total_price }}" type="number" disabled>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>

    <div class="member-form p-5 w-[45%] h-fit border border-black shadow-md rounded-lg">
        <form action="{{ route('submit_payment') }}" method="POST">
            @csrf
            @if (session()->has('customer_code'))
            <div class="flex flex-col gap-3">
                <div class="input-group flex w-full justify-between items-center">
                    <label class="text-md font-semibold" for="member" class="w-[30%]">Member</label>
                    <input type="text" name="member" id="member" class="w-[80%] h-[35px] border rounded-md border-black p-3" value="{{ $transaction_list->transaction->customer->name }}" disabled>
                </div>

                <div class="input-group flex w-full justify-between items-center">
                    <label class="text-md font-semibold" for="no" class="w-[30%]">No</label>
                    <input type="text" name="no" id="no" class="w-[80%] h-[35px] border rounded-md border-black p-3" value="{{ $transaction_list->transaction->customer->phone }}" disabled>
                </div>

                <div class="input-group flex w-full justify-between items-center">
                    <label class="text-md font-semibold" for="point" class="w-[30%]">Point</label>
                    <input type="text" name="point" id="point" class="w-[80%] h-[35px] border rounded-md border-black p-3" value="{{ $transaction_list->transaction->customer->point }}" disabled>
                </div>
            </div>  
            @endif
            

            <div class="flex flex-col {{ session()->has('customer_code') ? 'mt-10' : '' }}  p-5">
                <div class="flex flex-between w-[70%] gap-5">
                    <h3 class="text-2xl font-bold">Total</h3>
                    <h3 class="text-2xl font-bold"> Rp. <span id="total_price">{{ $transaction_list->transaction->total_price}} </span></h3>
                </div>

                <div class="flex flex-col gap-3 mt-5">
                    <div class="input-group flex w-[65%] justify-between items-center">
                        <label class="text-md font-semibold" for="bayar" class="w-[30%]">bayar</label>
                        <input type="number" name="bayar" id="bayar" class="w-[70%] h-[35px] border rounded-md border-black p-3" onchange="totalPrice(this.value)" required>
                    </div>

                    <div class="input-group flex w-[65%] justify-between items-center">
                        <label class="text-md font-semibold" for="kembali" class="w-[30%]">kembali</label>
                        <input type="number" name="kembali" id="kembali" class="w-[70%] h-[35px] border rounded-md border-black p-3" required readonly>
                    </div>
                    <div>
                        <input type="number" name="total_price" value="{{ $transaction_list->transaction->total_price }}" hidden >
                    </div>
                    <div class="flex justify-center mt-1">
                        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Bayar</button>
                    </div>
                    
                </div>
                
            </div>
        </form>
    </div>
</div>

        
</div>
    
@endsection

@section('content-js')
<script>
 function totalPrice(val)  {
    var input_bayar = val;
    var total_price = Number($('#total_price').html());
    document.getElementById('kembali').value= input_bayar - total_price;
    
 }
</script>
    
@endsection