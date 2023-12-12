@extends('admin.layouts.app')

@section('content')
<div class="px-[100px] py-[25px]">
    <p class="font-bold text-xl">Setting Dari {{$dataSetting[0]->name}}</p>
    @if ($message = Session::get('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger!</span> {{$message}}
      </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success!</span> {{$message}}
      </div>
    @endif
    <form action="{{route('submit_update_setting_admin', session()->get('adminUsername'))}}"class="max-w-2xl mt-2" method="POST">
        @csrf
        <div class="flex items-center mb-1">
            <input @if ($dataSetting[0]->emp_can_login == true) checked @endif id="default-checkbox" type="checkbox" value="true" name="emp_can_login" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="font-semibold ms-2 text-mb text-black dark:text-gray-300">Employee Can Login</label>
        </div>
        <p class="mb-4 text-sm text-gray-500">This option make your all employee can login to this Web App</p>

        <div class="flex items-center mb-1">
            <input @if ($dataSetting[0]->emp_can_create == true) checked @endif id="default-checkbox" type="checkbox" value="true" name="emp_can_create" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="font-semibold ms-2 text-mb text-black dark:text-gray-300">Employee Can Create Product</label>
        </div>
        <p class="mb-4 text-sm text-gray-500">This option make your all employee can Create the product in Your Bussiness</p>

        <div class="flex items-center mb-1">
            <input @if ($dataSetting[0]->emp_can_update == true) checked @endif id="default-checkbox" type="checkbox" value="true" name="emp_can_update" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="font-semibold ms-2 text-mb text-black dark:text-gray-300">Employee Can Update Product</label>
        </div>
        <p class="mb-4 text-sm text-gray-500">This option make your all employee can Update the product in Your Bussiness</p>

        <div class="flex items-center mb-1">
            <input @if ($dataSetting[0]->emp_can_delete == true) checked @endif id="default-checkbox" type="checkbox" value="true" name="emp_can_delete" class="accent-red-500 w-5 h-5 text-red-500 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="font-semibold ms-2 text-mb text-black dark:text-gray-300">Employee Can <span class="text-red-500">Delete Product</span></label>
        </div>
        <p class="mb-4 text-sm text-gray-500">This option make your all employee can Delete the product in Your Bussiness <span class="text-red-500"><br>Please Configure this
        option avoid of <span class="font-bold">Deleted Product</span></span></p>

        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <div class="grid grid-cols-2 mb-3">
            <div class="">
                <input type="time" class="border-2" value="{{$dataSetting[0]->shop_open}}" name="shop_open" min="">
                <label for="">shop open</label>
            </div>
            <div>
                <input type="time" class="border-2" value="{{$dataSetting[0]->shop_close}}"name="shop_close">
                <label for="">shop close</label>
            </div>
        </div>

        <button type="submit" onclick="return confirm('Apakah Anda Yakin akan mengupdate settingan untuk Pegawai?')" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
      </form>
</div>
@endsection