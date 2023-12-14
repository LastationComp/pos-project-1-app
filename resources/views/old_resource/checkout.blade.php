<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success PopUp</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body class="">

    <div class="absolute blur-sm w-full h-full"><div class="w-full h-full" style="background: url(https://images.unsplash.com/photo-1701105778936-9c2f112f9d1c?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=1080&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMTU2NDI0Mw&ixlib=rb-4.0.3&q=80&w=1920);"></div></div>

    <div class="wrapper bg-white w-[400px] p-5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 rounded-xl">
        <h2 class="text-3xl font-bold">Check Out</h2>

        <div class="flex gap-3 w-fit mt-5">
            <div class=" p-2 bg-slate-300 rounded-lg w-[80px] h-[80px] flex items-center justify-center">
                <i class="fa fa-user text-6xl"></i>
            </div>

            <div class="flex flex-col justify-between">
                <div>
                    <h2 class="font-semibold text-xl">Joe dane</h2>
                    <p class="text-light text-sm">08892929384</p>
                </div>
    
                <div class="font-semibold text-sm">Point ( 1137 )</div>
            </div>
        </div>

        <div class="mt-5 w-[90%] flex flex-col gap-2 font-semibold text-slate-700">
            <div class="flex justify-between">
                <span>Bayar</span>
                <span>Rp. <span class="texdsft-slate-300 bg-sldsfate-300">150.000</span></span>
            </div>

            <div class="flex justify-between">
                <span>Kembali</span>
                <span>Rp. <span class="texdsft-slate-300 bg-sldsfate-300">23.000</span></span>
            </div>

            <div class="flex justify-between">
                <span>PNP</span>
                <span>Rp. <span class="texdsft-slate-300 bg-sldsfate-300">1.300</span></span>
            </div>
        </div>

        <div class="mt-5 bg-[#E2E2FF] rounded-lg">
            <div class="flex justify-between p-5 font-bold">
                <span>TOTAL</span>
                <span>Rp. 137.000</span>
            </div>
        </div>

        <div class="mt-5 bg-[#24BC3C] rounded-lg mx-auto text-center px-3 py-2 text-white font-semibold">
            Cetak Struk Pembayarans
        </div>
    </div>

    {{-- cart --}}

    <div class="cart absolute right-0 bottom-0 h-[90vh] border-l-8 border-t-2 border-[#627293] bg-white rounded-tl-xl overflow-y-hidden">
        <h2 class="mt-3 text-center text-xl font-bold">Rincian produk pembeli</h2>

       <div class="h-[50%] w-[400px] overflow-y-auto no-scrollbar p-5">
            <div class="">
                <div class="border border-slate-600 rounded-md p-3 bg-[#E7F0E8] flex justify-between items-center mb-3">
                    <div>
                        <h3 class="text-xl font-semibold">Sangobion</h3>
                        <div class="flex gap-5">
                            <span class="text-sm">Select One <i class="fa fa-chevron-down ml-1 text-md"></i></span>
                            <div class="button-group bg-[#D9D9D9] text-slate-600 w-fit flex gap-4 px-2 rounded-sm">
                                <button><i class="fa fa-minus"></i></button>
                                <span>1</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="text-lg font-bold mr-3">
                        Rp. 12000
                    </div>
                </div>

                <div class="border border-slate-600 rounded-md p-3 bg-[#E7F0E8] flex justify-between items-center mb-3">
                    <div>
                        <h3 class="text-xl font-semibold">Sangobion</h3>
                        <div class="flex gap-5">
                            <span class="text-sm">Select One <i class="fa fa-chevron-down ml-1 text-md"></i></span>
                            <div class="button-group bg-[#D9D9D9] text-slate-600 w-fit flex gap-4 px-2 rounded-sm">
                                <button><i class="fa fa-minus"></i></button>
                                <span>1</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="text-lg font-bold mr-3">
                        Rp. 12000
                    </div>
                </div>

                <div class="border border-slate-600 rounded-md p-3 bg-[#E7F0E8] flex justify-between items-center mb-3">
                    <div>
                        <h3 class="text-xl font-semibold">Sangobion</h3>
                        <div class="flex gap-5">
                            <span class="text-sm">Select One <i class="fa fa-chevron-down ml-1 text-md"></i></span>
                            <div class="button-group bg-[#D9D9D9] text-slate-600 w-fit flex gap-4 px-2 rounded-sm">
                                <button><i class="fa fa-minus"></i></button>
                                <span>1</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="text-lg font-bold mr-3">
                        Rp. 12000
                    </div>
                </div>

                <div class="border border-slate-600 rounded-md p-3 bg-[#E7F0E8] flex justify-between items-center mb-3">
                    <div>
                        <h3 class="text-xl font-semibold">Sangobion</h3>
                        <div class="flex gap-5">
                            <span class="text-sm">Select One <i class="fa fa-chevron-down ml-1 text-md"></i></span>
                            <div class="button-group bg-[#D9D9D9] text-slate-600 w-fit flex gap-4 px-2 rounded-sm">
                                <button><i class="fa fa-minus"></i></button>
                                <span>1</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="text-lg font-bold mr-3">
                        Rp. 12000
                    </div>
                </div>

                <div class="border border-slate-600 rounded-md p-3 bg-[#E7F0E8] flex justify-between items-center mb-3">
                    <div>
                        <h3 class="text-xl font-semibold">Sangobion</h3>
                        <div class="flex gap-5">
                            <span class="text-sm">Select One <i class="fa fa-chevron-down ml-1 text-md"></i></span>
                            <div class="button-group bg-[#D9D9D9] text-slate-600 w-fit flex gap-4 px-2 rounded-sm">
                                <button><i class="fa fa-minus"></i></button>
                                <span>1</span>
                                <button><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="text-lg font-bold mr-3 bg-[#D9D9D9]">
                        Rp. 12000
                    </div>
                </div>
        </div>
       </div>

       <div class="price h-[50%] rounded-t-xl bg-[#D9D9D9] mt-3 p-3 ">
            <div class="w-full border-b-2 border-black p-3">
                <div class="w-[60%]">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-md">PNP</span>
                        <span class="font-semibold text-lg">Rp -</span>
                    </div>
    
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-md">Bayar</span>
                        <span class="font-semibold text-lg">Rp -</span>
                    </div>
    
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-md">Kembalian</span>
                        <span class="font-semibold text-lg">Rp -</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-3 flex w-full">
                <div class="bg-white px-4 py-2 rounded-l-md w-[70%]">Subtotal: <span class="font-bold ml-3">Rp. 137.000</span></div>
                <button class="p-2 rounded-md bg-green-500 text-white font-semibold w-[30%]">Check Out</button>
            </div>
       </div>


    </div>

</body>
</html>