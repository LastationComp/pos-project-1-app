<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-[100vh] flex flex-col justify-center items-center">

    <div class="text-slate-600 mx-auto w-[400px] h-[400px]] border border-slate-500 rounded-lg p-5">
        <div class="text-center">
            <h2 class="font-bold text-2xl">POST APOTEK APP</h2>
            <span class="font-semibold text-lg">Login To Discover</span>
        </div>

        <form action="" method="POST" class="mt-5 flex flex-col gap-3">
            @csrf

            <div class="input-group flex flex-col">
                <label for="email" class="font-semibold">Email :</label>
                <input type="text" name="email" id="email" class="d-block border border-slate-500 ml-5 h-8 mt-2">
            </div>

            <div class="input-group flex flex-col">
                <label for="password" class="font-semibold">Password :</label>
                <input type="password" name="password" id="password" class="d-block border border-slate-500 ml-5 h-8 mt-2">
            </div>

            <button type="submit" class="mt-4 text-center bg-blue-500 text-white w-full p-1">Login</button>
        </form>
    </div>
    
</body>
</html>