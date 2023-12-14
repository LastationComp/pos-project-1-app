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
            <a href="{{ route('back_to_home_transaction') }}"><i class="fa fa-check text-6xl"></i></a>
        </div> 
        <h2 class="my-5 text-center font-bold text-3xl">Success</h2>

        <div class="wrapper-detail overflow-y-auto w-full h-[80%] bg-[#E5E5E5] rounded-lg no-scrollbar p-3 text-sm" style="z-index: -1;">
            <div class="text-center mx-auto">
                <i class="fa fa-caret-up text-slate-400 text-4xl"></i>
            </div>

            <div class="text-center  font-semibold mt-3">
                <div>{{ $another_data[0]->employee->admin->client->client_name }}</div>
            </div>

            <div class="border-dashed border-slate-500 p-3 flex justify-between">
                <div>
                    <p><span class="font-semibold">Kasir :</span> {{ $another_data[0]->employee->name }}</p>
                    <p><span class="font-semibold">Waktu :</span>{{ $date }}</p>
                </div>

                <div>
                    <p><span class="font-semibold">Member :</span> {{ session()->has('customer_code') ? $another_data[0]->customer->name : '-' }}</p>
                    <p class="text-center">{{ $time }}</p>
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
                        @foreach ($another_data as $transaction)
                        @foreach ($transaction->transaction_lists as $transaction_list)
                        <tr>
                        <td>{{ $transaction_list->selling_unit->product->product_name }}</td>
                        <td>{{ $transaction_list->quantity }}</td>
                        <td>{{ $transaction_list->selling_unit->price }}</td>
                        <td>{{ $transaction_list->total_price }}</td>
                    </tr> 
                        @endforeach
                        
                            
                              
                        @endforeach
                        

                       
                    </tbody>
                </table>
            </div>

            <div class="w-[70%] text-sm p-3 gap-1">
                <div class="flex justify-between">
                    <span class="font-semibold">Total</span><span>:</span><span>Rp. {{ $another_data[0]->total_price }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Tunai</span><span>:</span><span>Rp. {{ $another_data[0]->pay }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Kembali</span><span>:</span><span>Rp. {{ $another_data[0]->change }}</span>
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