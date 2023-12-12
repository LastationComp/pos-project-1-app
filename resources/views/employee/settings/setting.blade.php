@extends('employee.layouts.main')

@section('content')
<form action="{{route('submit_profile_update_employee', $data[0]->employee_code)}}" method="POST" class="mt-10"  enctype="multipart/form-data">
    @csrf
    <div class="grid grid-rows-2 ">
        <div class="mx-auto ">
            <div class="max-w-auto p-6 my-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if ($message = Session::get('error'))
            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-1/2" role="alert">
                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                </span>
                <p class="ml-6">{{ $message }}</p>
              </div>
            @endif
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Profile Setting</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Welcome To Profile Setting {{$data[0]->employee_code}}.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 grid grid-cols-3">
                        <div>
                            <img class="w-24 h-24 mb-3 rounded-mb shadow-lg" src="{{asset('images/'. $data[0]->avatar_url)}}" alt="Bonnie image"/>
                        </div>
                        <div class="col-span-2">
                            <h1 class="text-mb items-center font-bold mb-4">Profile Picture</h1>
                            <label for="upload_button" class="text-blue-500 font-bold  bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200  rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Upload</label>
                            <input type="file" name="profile_image" id="upload_button" hidden>

                        </div>

                    </div>
                    <div class="col-span-2">
                        <div class="mb-2">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" id="base-input" value="{{$data[0]->name}}" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                            <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="new_password">
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Re-enter Password</label>
                            <input type="text" id="base-input" name="reenter_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                            <input type="text" id="base-input" name="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Save
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            </div>
        </div>

    </div>

</form>

@endsection
