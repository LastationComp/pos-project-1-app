@extends('admin.layouts.main')

@section('content')

<div class="wrapper w-[650px]">
        <h2 class="text-2xl font-semibold mb-1">Settings</h2>
        <form method="POST" action="{{ url('submit_settings') }}">
            <div class="mb-3">
                <div class="permission-group flex gap-2 items-center">
                    <input type="checkbox" name="can_login" class="border-slate-400 w-[15px] h-[15px]"> 
                    <h3 class="text-slate-600 font-semibold">Employee Can Login</h3>
                </div>
                <p class="text-slate-400 text-md font-thin">This option make all employee can login through this web</p>
            </div>

            <div class="mb-3">
                <div class="permission-group flex gap-2 items-center">
                    <input type="checkbox" name="can_login" class="border-slate-400 w-[15px] h-[15px]"> 
                    <h3 class="text-slate-600 font-semibold">Employee Can Create Product</h3>
                </div>
                <p class="text-slate-400 text-md font-thin">This option make all employee can Create product in your Business</p>
            </div>


            <div class="mb-3">
                <div class="permission-group flex gap-2 items-center">
                    <input type="checkbox" name="can_login" class="border-slate-400 w-[15px] h-[15px]"> 
                    <h3 class="text-slate-600 font-semibold">Employee Can Update Product</h3>
                </div>
                <p class="text-slate-400 text-md font-thin">This option make all employee can Update the product through your Business</p>
            </div>

            <div class="mb-3">
                <div class="permission-group flex gap-2 items-center">
                    <input type="checkbox" name="can_login" class="border-slate-400 w-[15px] h-[15px]"> 
                    <h3 class="text-slate-600 font-semibold">Employee Can Delete Product</h3>
                </div>
                <p class="text-slate-400 text-md font-thin">This option make all employee can Update the product through your Business. <span class="text-red-500">Please configure this option to avoid of <span class="font-bold">Deleted Products</span></span></p>
            </div>

            <button type="submit" class="rounded-md px-3 py-1 text-white bg-green-500 mt-3">save</button>
        </form>
    </div>
@endsection