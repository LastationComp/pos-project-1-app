<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pin 2</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="form-wrapper w-full flex justify-between">
        <div class="left-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center">
            <h2 class="mb-3 font-bold text-3xl">Sign In Admin or Employee</h2>
            @if ($message = Session::get('success'))
                <div class="alert alert-success" id="success-msg" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-1/2" role="alert">
                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                </span>
                <p class="ml-6">{{ $message }}</p>
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
            @if (!Session::has('license_key'))
            <form action="{{ route('check_license_key')}}" method="POST" class="flex flex-col justify-center items-center">
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
            @else
            <form action="{{ route('login_admin_employee') }}" method="POST" class="flex flex-col justify-center items-center">
                @csrf
                <div class="input-group border border-black rounded-lg overflow-hidden mb-5">
                    <i class="fa fa-user border-r-[1px] border-black text-xl p-2"></i>
                    <input type="text" name="username" placeholder="yourusername"
                        class="w-[350px] p-2 rounded-lg rounded-l-none">
                </div>

                <div class="input-group border border-black rounded-lg overflow-hidden mb-5">
                    <i class="fa fa-lock border-r-[1px] border-black text-xl p-2"></i>
                    <input type="password" name="password" placeholder="***********"
                        class="w-[350px] p-2 rounded-lg rounded-l-none">
                </div>
                <div class="grid grid-cols-2 mb-6">
                    <div class="flex items-center mr-5">
                        <input id="role" type="radio" value="admin" name="role"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                    </div>
                    <div class="flex items-center">
                        <input checked id="role" type="radio" value="employee" name="role"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employee</label>
                    </div>
                </div>
                <button type="submit"
                    class="mx-auto text-center px-3 py-1 bg-[#283845] rounded-lg text-sm text-white">Sign Me In</button>
            </form>
            @endif

        </div>

        <div class="right-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center bg-[#283845]">
            <div class="flex flex-col">
                <img src="https://img.freepik.com/free-vector/qr-code-concept-illustration_114360-5853.jpg?size=626&ext=jpg&ga=GA1.1.1103412834.1697761862&semt=ais "
                    alt="" class="mx-auto rounded-xl mb-5" width="300">
                
            </div>
        </div>
    </div>

</body>

</html>
