@extends('employee.layouts.main')

<div class="bg-page absolute -z-10 w-full h-full">
    <div class="w-full h-[100vh] bg-gradient-to-r from-[#28A446] to-[#28656A]"></div>
</div>

@section('content')

    <div class="wrapper w-[60%] h-fit bg-[#c9c2c2] rounded-lg  relative left-1/2 -translate-x-1/2 border shadow-xl mt-20 p-3">
        <form action="{{ url('employee/member') }}" method="POST" class="w-full h-full bg-white border shadow-xl p-5 rounded-lg">
            @csrf

            <h2 class="capitalize text-blue-500 text-2xl font-medium mb-5">Tambah Member</h2>

            <div class="input-group flex flex-col gap-2 mb-3">
                <label for="name" class="text-xl font-semibold">Name</label>
                <input name="name" id="name" type="text" class="w-full border border-black rounded-lg p-3 h-[45px] text-slate-500 text-lg font-semibold" placeholder="Masukkan nama member baru">
            </div>

            <div class="flex w-full mb-3 gap-5">
                <div class="input-group flex flex-col gap-2 w-full">
                    <label for="phone" class="text-xl font-semibold">Phone</label>
                    <input name="phone" id="phone" type="text" class="w-full border border-black rounded-lg p-3 h-[45px] text-slate-500 text-lg font-semibold" placeholder="Masukkan no telepon">
                </div>

                <div class="input-group flex flex-col gap-2 w-full">
                    <label for="email" class="text-xl font-semibold">Email</label>
                    <input name="email" id="email" type="text" class="w-full border border-black rounded-lg p-3 h-[45px] text-slate-500 text-lg font-semibold" placeholder="Masukkan email">
                </div>
            </div>

            <div class="btn-group flex gap-3 w-fit mx-auto text-white font-semibold mt-16">
                <button type="submit" class="px-3 py-1 rounded-md shadow-md border  bg-green-500">Tambah</button>
                <a href="{{ url('employee/member') }}" class="px-3 py-1 rounded-md shadow-md border  bg-red-500">Batal</a>
            </div>
        </form>
    </div>
@endsection