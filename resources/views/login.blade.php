<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pin 2</title>
    @vite('resources/css/app.css')
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style >

        @layer components {
            .bg-red {
                @apply bg-red-500
            }
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body>

    <div class="w-full flex justify-between transition-all absolute z-10" id="form-pin-wrapper">
        <div class="left-slide bg-white w-[50%] h-[100vh] flex flex-col justify-center items-center group transition-all absolute left-0">
            <h2 class="font-bold text-3xl bg-red-50 italic">Pin !</h2>
            <div class="font-light italic mb-4">I'm Admin</div>
            <form action="{{ url('admin/dashboard') }}" method="GET" class="flex flex-col justify-center items-center">
                @csrf

                @if('error' == 'eror')
                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-full" role="alert">
                        <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </span>
                        <p class="ml-6">error cuy</p>
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

        <div class="right-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center bg-[#283845] transition-all absolute right-0">
            <div class="flex flex-col">
                <img src="https://img.freepik.com/free-vector/qr-code-concept-illustration_114360-5853.jpg?size=626&ext=jpg&ga=GA1.1.1103412834.1697761862&semt=ais " alt="" class="mx-auto rounded-xl mb-5" width="300">
                <button class="bg-white rounded-full mx-auto text-center px-4 py-2 text-sm flex items-center" id="btn-barcode-slide">Login with Barcode <i class="fa fa-chevron-right text-xl ml-4 font-bold text-slate-500"></i></button>
            </div>
        </div>
    </div>

    <div class=" w-full flex justify-between absolute opacity-0" id="form-barcode-wrapper">
        <div class="left-slide w-[50%] h-[100vh] flex flex-col justify-center items-center bg-white absolute left-0">
            <h2 class="font-bold text-3xl bg-red-50 italic">Scan !</h2>
            <div class="font-light italic mb-4">I'm Admin</div>
            <form action="{{ url('/admin/dashboard') }}" method="GET" class="flex flex-col justify-center items-center">
                @csrf
                
                @if('error' == 'eror')
                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-full" role="alert">
                        <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </span>
                        <p class="ml-6">error cuy</p>
                    </div>
                @endif

                <div class="input-group border border-black rounded-lg overflow-hidden mb-5">
                    <i class="fa fa-user border-r-[1px] border-black text-xl p-2"></i>
                    <input type="text" name="email" placeholder="johndoe@gmail.com" class="w-[350px] p-2 rounded-lg rounded-l-nones">
                </div>

                <div class="input-group mb-3">
                    <img src="https://www.qr-code-generator.com/phpqrcode/getCode.php?cht=qr&chl=AlfaXAlyca%0A&chs=180x180&choe=UTF-8&chld=L|0" alt="" class="mx-auto" width="150">
                </div>

                <button type="submit" class="mx-auto text-center px-3 py-1 bg-[#283845] rounded-lg text-sm text-white">Sign Me In</button>
            </form>
        </div>

        <div class="right-slide w-[50%] h-[100vh] flex flex-col gap-5 justify-center items-center bg-[#283845] transition-all absolute right-0">
            <div class="flex flex-col">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnPH2gmfniByETVksTCD8-Yl-tn4zntyteyxqISgmHvw&s" alt="" class="mx-auto rounded-xl mb-5" width="300">
                <button class="bg-white rounded-full mx-auto text-center px-4 py-2 text-sm flex items-center" id="btn-pin-slide"><i class="fa fa-chevron-left text-xl mr-4 font-bold text-slate-500 translate-x"></i> Login with Pin</button>
            </div>
        </div>
    </div>
    
    <script>

        $(document).ready(function(){
            function changeSlide() {
                $('#form-pin-wrapper').toggleClass('z-10')
                $('#form-pin-wrapper').toggleClass('opacity-0')
                $('#form-pin-wrapper .left-slide').toggleClass('translate-x-full')
                $('#form-pin-wrapper .right-slide').toggleClass('-translate-x-full')


                $('#form-barcode-wrapper').toggleClass('z-10')
                $('#form-barcode-wrapper').toggleClass('opacity-0')
                $('#form-barcode-wrapper .left-slide').toggleClass('translate-x-full')
                $('#form-barcode-wrapper .right-slide').toggleClass('-translate-x-full')
            }

            $('#btn-barcode-slide').click(function(){
                changeSlide()
            })

            $('#btn-pin-slide').click(function(){
                changeSlide()
            })
        });

    </script>
</body>
</html>