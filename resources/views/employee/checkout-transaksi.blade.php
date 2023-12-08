@extends('employee.layouts.main')

@section('content')
    @if( session('cart') )
        <div class="wrapper w-[100%]  h-[83vh] mt-5 bg-white rounded-lg border-2 shadow-md">
            <div class="text-center border-emerald-500 p-4 ">
                <h2 class="text-3xl font-light">Pembelian Obat</h2>
            </div>

            <div class="flex gap-5 p-5 h-[85%] py-2 justify-evenly">
                <div class="list-checkout-wrapper border border-black rounded-lg w-[50%] h-full overflow-auto">
                    <div class="btn-group flex gap-3 bg-slate-300 rounded-lg p-3">
                        <a href="" class="px-3 py-1 bg-green-500 text-white rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-plus mr-2"></i> Tambah</a>
                        <a href="" class="px-3 py-1 bg-slate-100 rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-repeat mr-2"></i> Reset</a>
                        <a href="{{ url('employee/batal') }}" class="px-3 py-1 bg-red-500 text-white rounded-md border-2 border-slate-300 text-sm flex items-center"><i class="fa fa-angle-double-left mr-2"></i> Kembali</a>
                        <div class="relative rounded-md flex items-center">
                            <a href="" class="absolute left-0 ml-3">
                                <i class="fa fa-search "></i>
                            </a>
                            <input type="text" class="px-10 py-1 border-2 bg-slate-300 w-full rounded-md focus:border-slate-400 focus:outline-none">
                        </div>
                    </div>

                    <div class="list-item p-3 rounded-lg h-full">
                        @foreach ( session('cart') as $cart )
                            <div class="item flex justify-between p-3 border-b-2 border-slate-600">
                                <div>
                                    <h3 class="font-semibold text-xl">{{ $cart['nama'] }}</h3>
                                    <a href="#" class="text-sm">Lembar <i class="fa fa-chevron-down ml-2"></i></a>
                                </div>

                                <div class="flex gap-5 justify-center items-center">
                                    <div class="btn-group flex justify-center items-center gap-2">
                                        <div class="flex justify-center items-center px-2 py-1 rounded-md bg-slate-300 border border-slate-400 w-fit h-fit">
                                            <a href="{{ url('/employee/kurang/' . $cart['kode']) }}" class="w-[18px] h-[18px] border border-black rounded-full flex justify-center items-center text-sm"><i class="fa fa-minus"></i></a>
                                        </div>
                                        <div class="px-5 rounded-md border border-slate-400 w-fit h-fit flex justify-center items-center">
                                            <span>{{ $cart['jumlah'] }}</span>
                                        </div>
                                        <div class="flex justify-center items-center px-2 py-1 rounded-md bg-slate-300 border border-slate-400 w-fit h-fit">
                                            <a href="{{ url('/employee/tambah/' . $cart['kode']) }}" class="w-[18px] h-[18px] border border-black rounded-full flex justify-center items-center text-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-semibold">Rp. 10. 000</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="member-form p-5 w-[45%] h-fit border border-black shadow-md rounded-lg">
                    <form action="" method="POST">
                        @csrf

                        <div class="flex flex-col gap-3">
                            <div class="input-group flex w-full justify-between items-center">
                                <label class="text-md font-semibold" for="member" class="w-[30%]">Member</label>
                                <input type="text" name="member" id="member" class="w-[80%] h-[35px] border rounded-md border-black p-3">
                            </div>
        
                            <div class="input-group flex w-full justify-between items-center">
                                <label class="text-md font-semibold" for="no" class="w-[30%]">No</label>
                                <input type="text" name="no" id="no" class="w-[80%] h-[35px] border rounded-md border-black p-3">
                            </div>
        
                            <div class="input-group flex w-full justify-between items-center">
                                <label class="text-md font-semibold" for="point" class="w-[30%]">Point</label>
                                <input type="text" name="point" id="point" class="w-[80%] h-[35px] border rounded-md border-black p-3">
                            </div>
                        </div>

                        <div class="flex flex-col mt-10 p-5">
                            <div class="flex justify-between w-[70%]">
                                <h3 class="text-2xl font-bold">Total</h3>
                                <h3 class="text-2xl font-bold">Rp.</h3>
                            </div>

                            <div class="flex flex-col gap-3 mt-5">
                                <div class="input-group flex w-[65%] justify-between items-center">
                                    <label class="text-md font-semibold" for="bayar" class="w-[30%]">bayar</label>
                                    <input type="text" name="bayar" id="bayar" class="w-[70%] h-[35px] border rounded-md border-black p-3">
                                </div>
            
                                <div class="input-group flex w-[65%] justify-between items-center">
                                    <label class="text-md font-semibold" for="kembali" class="w-[30%]">kembali</label>
                                    <input type="text" name="kembali" id="kembali" class="w-[70%] h-[35px] border rounded-md border-black p-3">
                                </div>
            
                                <div class="input-group flex w-[65%] justify-between items-center">
                                    <label class="text-md font-semibold" for="pajak" class="w-[30%]">pajak</label>
                                    <input type="text" name="pajak" id="pajak" class="w-[70%] h-[35px] border rounded-md border-black p-3">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <script>
            window.location.replace('/employee');
        </script>
    @endif
@endsection