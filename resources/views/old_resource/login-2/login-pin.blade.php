<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pin 2</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="form-wrapper w-full flex justify-between">
        <div class="left-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center">
            <h2 class="mb-3 font-bold text-3xl">Sign In Members</h2>
            <form action="" method="POST" class="flex flex-col justify-center items-center">
                @if('error' == 'eror')
                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-full" role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                    <p class="ml-6">ini error cuy</p>
                </div>
                @endif

                <div class="input-group border border-black rounded-lg overflow-hidden mb-5">
                    <i class="fa fa-user border-r-[1px] border-black text-xl p-2"></i>
                    <input type="text" name="email" placeholder="johndoe@gmail.com" class="w-[350px] p-2 rounded-lg rounded-l-none">
                </div>

                <div class="input-group border border-black rounded-lg overflow-hidden mb-5">
                    <i class="fa fa-lock border-r-[1px] border-black text-xl p-2"></i>
                    <input type="password" name="password" placeholder="***********" class="w-[350px] p-2 rounded-lg rounded-l-none">
                </div>

                <button type="submit" class="mx-auto text-center px-3 py-1 bg-[#283845] rounded-lg text-sm text-white">Sign Me In</button>
            </form>
        </div>

        <div class="right-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center bg-[#283845]">
            <div class="flex flex-col">
                <img src="https://img.freepik.com/free-vector/qr-code-concept-illustration_114360-5853.jpg?size=626&ext=jpg&ga=GA1.1.1103412834.1697761862&semt=ais " alt="" class="mx-auto rounded-xl mb-5" width="300">
                <button class="bg-white rounded-full mx-auto text-center px-4 py-2 text-sm flex items-center">Login with Barcode <i class="fa fa-chevron-right text-xl ml-4 font-bold text-slate-500"></i></button>
            </div>
        </div>
    </div>
    
</body>
</html>