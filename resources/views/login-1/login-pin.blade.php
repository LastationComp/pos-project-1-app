<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Member</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-200">

    <div class="form-wrapper absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white p-10 w-[500px]">
        <div class="mb-5">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi9M3pDdacqV6oVu8qqaucvymZZpPi7sMskf-3aGYF9xqac77-X-Jv7TTDv_Wl3T4PcoX0B5O5DkImk8S_5C5bOwI-UOQ8jeWjOk2C1pNusrYWnU_4vVDyfUADj4BZf_K00X9oFncLybmqBx7ATmDaE87GiXHuCESYDf668RuKtLqZ99YGMeo6NaPt-/w400-h309-rw/Logo%20Bstation.png" alt="" width="100" class="mx-auto">
            <h2 class="text-center mt-2 font-bold text-2xl">Login Member</h2>
        </div>

        <form action="" class="">
            <div class="input-group mb-7">
                <label for="email" class="text-lg text-slate-400 font-bold"><h2>Email</h2></label>
                <input type="text" name="email" id="email" class="w-full px-3 py-1 border border-[#5BCFC5] rounded-sm mt-1" placeholder="example@gmail.com">
            </div>

            <div class="input-group mb-7">
                <label for="password" class="text-lg text-slate-400 font-bold"><h2>Pin</h2></label>
                <input type="password" name="password" id="password" class="w-full px-3 py-1 border border-[#5BCFC5] rounded-sm mt-1" placeholder="example@gmail.com">
            </div>

            <button class="w-full p-2 bg-[#5BCFC5] text-white font-semibold rounded-xl">Sign Me In</button>
            <p class="text-center underline mt-2 text-slate-400"><a href="#" class="translate-y-52">Login with Barcode</a></p>
        </form>

    </div>

</body>
</html>