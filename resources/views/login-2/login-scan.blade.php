<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Scan 2</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="form-wrapper w-full flex justify-between">
        <div class="left-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center order-2">
            <h2 class="mb-3 font-bold text-3xl">Sign In Members</h2>
            <form action="" method="POST" class="flex flex-col justify-center items-center">
                <div class="input-group border border-black rounded-lg overflow-hidden mb-5">
                    <i class="fa fa-user border-r-[1px] border-black text-xl p-2"></i>
                    <input type="text" name="email" placeholder="johndoe@gmail.com" class="w-[350px] p-2 rounded-lg rounded-l-none">
                </div>

                <div class="input-group mb-3">
                    <img src="https://www.qr-code-generator.com/phpqrcode/getCode.php?cht=qr&chl=AlfaXAlyca%0A&chs=180x180&choe=UTF-8&chld=L|0" alt="" class="mx-auto" width="150">
                </div>

                <button type="submit" class="mx-auto text-center px-3 py-1 bg-[#283845] rounded-lg text-sm text-white">Sign Me In</button>
            </form>
        </div>

        <div class="right-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center bg-[#283845] order-1">
            <div class="flex flex-col">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnPH2gmfniByETVksTCD8-Yl-tn4zntyteyxqISgmHvw&s" alt="" class="mx-auto rounded-xl mb-5" width="300">
                <button class="bg-white rounded-full mx-auto text-center px-4 py-2 text-sm flex items-center"><i class="fa fa-chevron-left text-xl mr-4 font-bold text-slate-500"></i> Login with Pin</button>
            </div>
        </div>
    </div>
    
</body>
</html>