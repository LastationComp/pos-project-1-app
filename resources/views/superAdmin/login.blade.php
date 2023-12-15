@extends('layout_superAdmin.app')

@section('content')
    <div class="container flex justify-center items-center h-[100vh]">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 text-sm">
            @if ($message = Session::get('success'))
                <div class="alert alert-success px-4 py-3 bg-green-500 text-white" id="success-msg" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-success px-4 py-3 bg-red-100 text-red-700 text-sm" id="success-msg" role="alert">
                    * {{ $message }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger px-4 py-3 bg-red-100 text-red-700 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>* {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="space-y-6" action="{{ route('login_super_admin') }}" method="POST">
                @csrf
                <h5 class="text-xl font-semibold font-mono text-gray-900 dark:text-white text-center">Super Admin Login </h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Username</label>
                    <input type="text" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@company.com" name="username">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <input type="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        name="password">
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    to your account</button>
            </form>
        </div>

    </div>
@endsection
