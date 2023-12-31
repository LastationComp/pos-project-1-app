@extends('admin.layouts.app')

@section('content')
    <div class="px-[100px] py-[25px]">
        <p class="">Profile Dari {{ $dataAdmin[0]->name }}</p>
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
        <form action="{{route('submit_profile_update', $dataAdmin[0]->username)}}"class="max-w-2xl" method="POST">
            @csrf
            <div>
                <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Client Name</label>
            <input type="text" id="disabled-input" aria-label="disabled input" class="mb-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $dataAdmin[0]->client_name}}" disabled>
            </div>

            <div>
                <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="disabled-input" aria-label="disabled input" class="mb-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $dataAdmin[0]->name }}" disabled>
            </div>

            <div>
                <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" id="disabled-input" aria-label="disabled input" class="mb-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $dataAdmin[0]->username }}" disabled>
            </div>

            <div class="grid grid-cols-3 mb-2">
                <div class="">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Set New Password</label>
                    <input name="new_password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  </div>
                  <div class="ml-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Re-enter Password</label>
                    <input name="reenter_password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  </div>
                  <div class="ml-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                    <input name="old_password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  </div>
                  <span class=" col-span-3 text-xs text-gray-500">Please fill if you Want to change password</span>
            </div>

            <button data-confirm-delete="true" type="submit" onclick="return confirm('apakah anda yakin untuk mengubah password?')" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
          </form>
    </div>
@endsection
