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
    <style>

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body class="overflow-hidden">

    {{-- navbar --}}
    <nav>
        <header class="w-full bg-white">
            <div class="flex justify-between items-center w-[80%] h-[60px] p-3 mx-auto ">
                <h2 class="text-slate-600 text-2xl font-light">Transaction</h2>

                <a href="" class="px-3 py-2 bg-[#635DFF] text-white rounded-md">Logout</a>
            </div>
        </header>

        {{-- sidebar --}}
        <div class="sidebar fixed left-0 top-0 h-full w-fit bg-white shadow-md flex flex-col justify-between items-center">
            <div>
                <div class="p-3 w-[70px] h-[60px] border-r-2 border-b-2 border-black flex justify-center items-center">
                    <a href=""><i class="fa fa-caret-up text-3xl"></i></a>
                </div>
                <div class="flex flex-col items-center p-5 gap-5">
                    <a href="" class="mb-3"><i class="fa fa-th-large fa-lg"></i></a>
                    <a href="" class="mb-3"><i class="fa fa-user fa-lg"></i></a>
                    <a href="" class="mb-3"><i class="fa fa-clock fa-lg"></i></a>
                </div>
            </div>

            <div class="-translate-y-5">
                <a href="" class="mb-3"><i class="fa fa-cogs fa-xl"></i></a>
            </div>
        </div>
        {{-- end sidebar --}}
    </nav>
    {{-- end navbar --}}
    
    <div class="">
        {{-- content --}}
        <div class="content bg-slate-200 w-full h-[92vh] ml-[70px]">
            <div class="headbar w-full bg-[#D9D9D9] p-5">
                <div class="w-[55%] translate-x-8 flex items-center justify-between">
                    <div class="w-[300px] bg-sky-300 border-[1px] border-[#5C5CFF] flex items-center rounded-md overflow-hidden">
                        <i class="fa fa-search absolute text-2xl ml-3"></i>
                        <input type="text" placeholder="Search" name="searchbar" class="pl-12 py-2 w-full rounded-md text-slate-400">
                    </div>
    
                    <div class="btn-group flex gap-3">
                        <button class="btn-table"><i class="fa fa-bars"></i></button>
                        <div class="border-l-[1px] border-black"></div>
                        <button class="btn-card text-[#5C5CFF]"><i class="fa fa-th "></i></button>
                    </div>
                </div>
            </div>
    
            {{-- card version --}}
            <div class="card-wrapper mt-5 w-[62%] h-full translate-x-5 flex gap-3 flex-wrap overflow-y-auto no-scrollbar">
                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>

                <div class="card w-[270px] h-fit bg-white p-3 flex justify-center flex-col rounded-lg border-l-8 border-purple-500 relative">
                    <a href=""><i class="absolute right-3 top-right-3 fa fa-plus-circle text-xl"></i></a>
                    <h2 class="text-lg">Sangobion</h2>
                    <div class="flex justify-around gap-3 text-sm mt-1">
                        <span>0123823812321 <span class="ml-2 border-l-[1px] border-black"></span></span>
                        
                        <span>Lembar</span>
                        <span class="">27 Stok</span>
                    </div>
                    <div class="text-sm mt-3">
                        <p>{{ Str::limit('Dekskripsi: suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 101, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p>
                    </div>
                </div>
            </div>
            {{-- end card version --}}
                
            {{-- table version --}}
                <div class="table-wrapper mt-5 w-[62%] h-full translate-x-5 bg-white rounded-t-2xl overflow-y-auto no-scrollbar hidden">
                    <table class="w-full" cellpadding="15">
                        <thead class="">
                            <tr class="uppercase font-semibold">
                                <td class="text-center">pilih</td>
                                <td class="">produk</td>
                                <td class="">kode</td>
                                <td class="">stok</td>
                                <td class="">satuan</td>
                                <td class="">deskripsi</td>
                            </tr>
                        </thead>

                        <tbody class="body-data-table">
                            <tr class="bg-slate-300">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Sangobion</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 2</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="bg-slate-300">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 3</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 4</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="bg-slate-300">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 3</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 4</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="bg-slate-300">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 3</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 4</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="bg-slate-300">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 3</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 4</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="bg-slate-300">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 3</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>

                            <tr class="">
                                <td class="check-input"><input type="checkbox" class="block mx-auto"></td>
                                <td class="nama">Obat 4</td>
                                <td class="kode">91293921912</td>
                                <td class="stok"><span class="bg-red-400 text-center rounded-full px-5 text-sm">6</span></td>
                                <td class="bentuk">lembar</td>
                                <td class="deskripsi"><p>{{ Str::limit('Sangobion adalah suplemen untuk mengatasi kurang darah (anemia). bahan utama zat besi dalam bentuk ferrous ', 31, '') }} <i class="fa fa-ellipsis-h translate-y-1"></i></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            {{-- end table version --}}
        </div>
        {{-- end content --}}

        {{-- cart --}}
        <div class="cart fixed right-0 bottom-0 h-[92vh] border-l-8 border-t-2 border-[#627293] bg-white rounded-tl-xl overflow-y-hidden">
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

        {{-- endcart --}}
    </div>

    <script>

        $(document).ready(function(){
            $('.btn-table').click(function(){
                $('.table-wrapper').show()
                $('.btn-table').addClass('text-[#5C5CFF]')
                $('.card-wrapper').hide()
                $('.btn-card').removeClass('text-[#5C5CFF]')
            })

            $('.btn-card').click(function(){
                $('.table-wrapper').hide()
                $('.btn-table').removeClass('text-[#5C5CFF]')
                $('.card-wrapper').show()
                $('.btn-card').addClass('text-[#5C5CFF]')
            })

            const check_input = $('.body-data-table tr .check-input input');

            // check_input.each(function(index, element) {
            //     element.click(function(){
            //         console.log('checked element')
            //     })
            // });
        });

    </script>
</body>
</html>