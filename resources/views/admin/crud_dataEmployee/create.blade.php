<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction</title>
    @vite('resources/css/app.css')
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style >

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body class="overflow-hidden">

    <div class="form-wrapper w-[600px] h-fit absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-slate-200 rounded-lg">
        <form action="{{route('submit_add_data_employee')}}" method="POST" class="w-full">
            @csrf

            <h2 class="font-light text-2xl mb-3 text-blue-500 text-center">Create Data</h2>

            <div class="input-group text-white-500 w-full mb-3 rounded-full ">
                <label for="name" class="text-slate-600">Nama</label>
                <input type="text" name="name" id="name" class="border-2 rounded-xl focus:outline-blue-500 h-[40px] w-full p-3 text-slate-400">
            </div>

            <button type="submit" class="border-2 border-white bg-sky-500 text-white rounded-xl px-3 py-1 mt-5">create</button>
        </form>
    </div>

    <script>
        console.log(document.querySelector('.sidebar').clientWidth)
    </script>
</body>
</html>