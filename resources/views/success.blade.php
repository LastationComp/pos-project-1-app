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

    <div class="wrapper-alert absolute top-1/2 left-1/2 z-10 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[550px] bg-white p-7 rounded-lg shadow-sm">
        <div class="absolute -translate-y-16 left-1/2 -translate-x-1/2 text-white bg-[#13C39C] border-4 rounded-full border-[#25FFAE] w-[90px] h-[90px] flex items-center justify-center">
            <i class="fa fa-check text-6xl"></i>
        </div> 
        <h2 class="my-5 text-center font-bold text-3xl">Success</h2>

        <div class="wrapper-detail overflow-y-auto w-full h-[80%] bg-[#E5E5E5] rounded-lg no-scrollbar p-3 text-sm" style="z-index: -1;">
            <div class="text-center mx-auto">
                <i class="fa fa-caret-up text-slate-400 text-4xl"></i>
            </div>

            <div class="text-center  font-semibold mt-3">
                <div>Toko Anda</div>
                <div>jl. xxxxxxx Raya. xxxxx</div>
            </div>

            <div class="border-dashed border-slate-500 p-3 flex justify-between">
                <div>
                    <p><span class="font-semibold">Kasir :</span> Lorem</p>
                    <p><span class="font-semibold">Waktu :</span> 16/11/2023</p>
                </div>

                <div>
                    <p><span class="font-semibold">Member :</span> John Doe</p>
                    <p class="text-center">08:52:40</p>
                </div>
            </div>

            <div class="border-y-2 border-dashed border-slate-500 ">
                <table class="w-full">
                    <thead class="">
                        <tr class="translate-x-5 font-semibold border-b-2 border-dashed border-slate-500">
                            <td>Produk</td>
                            <td>qty</td>
                            <td>Harga</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    
                    <tbody class="translate-x-5" >
                        <tr>
                            <td>Sangobion</td>
                            <td>2</td>
                            <td>12.000</td>
                            <td>24.000</td>
                        </tr>

                        <tr>
                            <td>Histigo</td>
                            <td>1</td>
                            <td>8.000</td>
                            <td>8.000</td>
                        </tr>

                        <tr>
                            <td>Bodrex</td>
                            <td>1</td>
                            <td>8.000</td>
                            <td>8.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="w-[50%] text-sm p-3 gap-1">
                <div class="flex justify-between">
                    <span class="font-semibold">Total</span><span>:</span><span>Rp. 42.000,-</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Tunai</span><span>:</span><span>Rp. 50.000,-</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Kembali</span><span>:</span><span>Rp. 8.000,-</span>
                </div>
            </div>

            <div class="text-center border-t-2 border-dashed border-slate-500 p-3">
                <p class="font-semibold text-xs mt-5">Terimakasih telah berkunjung <br>
                Periksa kembali barang bawaan anda <br>
                Barang yang sudah dibeli tidak dapat dikembalikan</p>
            </div>
        </div>
    </div>
    
</body>
</html>