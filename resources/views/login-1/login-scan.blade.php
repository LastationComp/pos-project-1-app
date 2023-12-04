<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Member</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-slate-200">

    <div class="form-wrapper absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white p-10 w-[500px]">
        <div class="">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi9M3pDdacqV6oVu8qqaucvymZZpPi7sMskf-3aGYF9xqac77-X-Jv7TTDv_Wl3T4PcoX0B5O5DkImk8S_5C5bOwI-UOQ8jeWjOk2C1pNusrYWnU_4vVDyfUADj4BZf_K00X9oFncLybmqBx7ATmDaE87GiXHuCESYDf668RuKtLqZ99YGMeo6NaPt-/w400-h309-rw/Logo%20Bstation.png" alt="" width="100" class="mx-auto">
            <h2 class="text-center mt-2 font-bold text-2xl">Login Member</h2>
        </div>

        <form action="" class="">
            <div class="error-message bg-[#FFF3A1] flex justify-between items-center py-2 px-5 mt-1 rounded-sm">
                <div class="flex items-center">
                    <i class="fa fa-exclamation-triangle text-[#FF735C] text-lg mr-2"></i>
                    <p class="font-light text-sm">Login dinonaktifkan, silahkan input email</p>
                </div>
                <i class="fa fa-x text-slate-400 font-extralight"></i>
            </div>
            
            <div class="input-group mb-3 mt-5">
                <label for="email" class="text-lg text-slate-400 font-bold"><h2>Email</h2></label>
                <input type="text" name="email" id="email" class="w-full px-3 py-1 border border-[#5BCFC5] rounded-sm mt-1" placeholder="example@gmail.com">
            </div>

            <div class="input-group mb-3">
                <img src="https://www.qr-code-generator.com/phpqrcode/getCode.php?cht=qr&chl=AlfaXAlyca%0A&chs=180x180&choe=UTF-8&chld=L|0" alt="" class="mx-auto" width="150">
            </div>

            <button type="submit" class="w-full p-2 bg-[#5BCFC5] text-white font-semibold rounded-xl">Sign Me In</button>
            <p class="text-center underline mt-2 text-slate-400"><a href="#" class="translate-y-52">Login with Barcode</a></p>
        </form>

    </div>

</body>
</html>