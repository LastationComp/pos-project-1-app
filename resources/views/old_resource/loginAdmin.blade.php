@extends('layout_superAdmin.app')

@section('content')
    {{-- section form --}}
    <div class="flex justify-center py-[200px]">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" id="success-msg" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-success" id="success-msg" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h5 class="text-xl font-medium text-gray-900 dark:text-white mb-7">Login for Admin or Employee</h5>
            @if (!Session::has('license_key'))
                <form action="{{ route('check_license_key')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Put Your
                            License Key</label>
                        <input type="text" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="xxxx-xxxx-xxxx-xxxx" name="license_key">
                    </div>
                    <div>
                        <button type='submit' class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Submit License Key</button>
                    </div></form>
            @endif

            <form class="space-y-4" action="{{ route('login_admin_employee') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Username</label>
                        @if (Session::has('license_key'))
                        <input type="text" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" name="username">
                        @else
                        <input type="text" id="disabled-input" aria-label="disabled input"
                        class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="Please Insert License Key" disabled>
                        @endif
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Pin</label>
                        @if (Session::has('license_key'))
                        <input type="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        name="password">
                        @else
                        <input type="text" id="disabled-input" aria-label="disabled input"
                        class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="Please Insert License Key" disabled>
                        @endif
                </div>
                @if (Session::has('license_key'))
                <div class="grid grid-cols-2 mb-6">
                    <div class="flex items-center mr-5">
                        <input id="adminradio" type="radio" value="admin" name="role"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                    </div>
                    <div class="flex items-center">
                        <input checked id="employeeradio" type="radio" value="employee" name="role"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employee</label>
                    </div>
                </div>
                @endif
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    to your account</button>
            </form>
        </div>

    </div>

@endsection
