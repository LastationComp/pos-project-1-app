<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List-Product</title>
    @vite('resources/css/app.css')
</head>
<body class="overflow-x-hidden bg-black">
    
    {{-- navbar --}}
        <nav class="w-full">
            <header class="W-full h-full bg-white px-5 py-3">

                <div class="flex justify-between translate-x-20">
                    {{-- searchbar --}}
                    <div class="searchbar flex items-center w-[350px] h-[35px] bg-slate-300 relative ">
                        <div class="w-[40%] h-[50%] bg-slate-400 mx-5"></div>
                    </div>

                    {{-- profile --}}
                    <div class="profile" style="transform: translateX(-100px);">
                        <div class="flex gap-2">
                            <div class="w-[30px] h-[30px] bg-slate-400"></div>
                            <div class="profile-name flex flex-col gap-1">
                                <div class="w-[100px] h-[15px] bg-slate-400"></div>
                                <div class="w-[50px] h-[10px] bg-slate-300"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- sidebar --}}
            <div class="fixed top-0 left-0 sidebar h-full bg-white p-3 flex flex-col gap-5 items-center">
                <div class="w-[15px] h-[15px] bg-slate-400 rounded-sm mb-5"></div>
                <div class="bg-slate-400 p-2">
                    <div class="w-[15px] h-[15px] bg-slate-300 rounded-sm"></div>
                </div>
                <div class="w-[15px] h-[15px] bg-slate-300 rounded-sm"></div>
                <div class="w-[15px] h-[15px] bg-slate-300 rounded-sm"></div>
                <div class="w-[15px] h-[15px] bg-slate-300 rounded-sm"></div>
                <div class="w-[15px] h-[15px] bg-slate-300 rounded-sm"></div>
            </div>
        </nav>

        <div class="container relative translate-x-14 gap-5 flex p-10">
            {{-- content card --}}
            <div class=" flex flex-wrap gap-5 w-[900px] h-ful">
                {{-- card --}}
                <div class="card flex flex-col gap-5 bg-slate-50 p-5 w-fit h-fit">
                    <div class="flex justify-between gap-5">
                        <div class="flex flex-col gap-1">
                            <div class="w-[150px] h-[20px] bg-slate-400"></div>
                            <div class="w-[250px] h-[20px] bg-slate-300"></div>
                            <div class="w-[180px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="w-[60px] h-[25px] sbg-slate-300"></div>
                    </div>

                    <div class="flex justify-between gap-5 mt-5">
                        <div class="w-[60px] h-[25px] bg-slate-400"></div>

                        <div class="flex gap-2 px-3 py-1 border border-slate-400 rounded-sm">
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-400 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                        </div>
                    </div>
                </div>
            
                {{-- card --}}
                <div class="card flex flex-col gap-5 bg-slate-50 p-5 w-fit h-fit">
                    <div class="flex justify-between gap-5">
                        <div class="flex flex-col gap-1">
                            <div class="w-[150px] h-[20px] bg-slate-400"></div>
                            <div class="w-[250px] h-[20px] bg-slate-300"></div>
                            <div class="w-[180px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="w-[60px] h-[25px] sbg-slate-300"></div>
                    </div>

                    <div class="flex justify-between gap-5 mt-5">
                        <div class="w-[60px] h-[25px] bg-slate-400"></div>

                        <div class="flex gap-2 px-3 py-1 border border-slate-400 rounded-sm">
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-400 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                        </div>
                    </div>
                </div>
            
                {{-- card --}}
                <div class="card flex flex-col gap-5 bg-slate-50 p-5 w-fit h-fit">
                    <div class="flex justify-between gap-5">
                        <div class="flex flex-col gap-1">
                            <div class="w-[150px] h-[20px] bg-slate-400"></div>
                            <div class="w-[250px] h-[20px] bg-slate-300"></div>
                            <div class="w-[180px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="w-[60px] h-[25px] sbg-slate-300"></div>
                    </div>

                    <div class="flex justify-between gap-5 mt-5">
                        <div class="w-[60px] h-[25px] bg-slate-400"></div>

                        <div class="flex gap-2 px-3 py-1 border border-slate-400 rounded-sm">
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-400 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                        </div>
                    </div>
                </div>

                {{-- card --}}
                <div class="card flex flex-col gap-5 bg-slate-50 p-5 w-fit h-fit">
                    <div class="flex justify-between gap-5">
                        <div class="flex flex-col gap-1">
                            <div class="w-[150px] h-[20px] bg-slate-400"></div>
                            <div class="w-[250px] h-[20px] bg-slate-300"></div>
                            <div class="w-[180px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="w-[60px] h-[25px] sbg-slate-300"></div>
                    </div>

                    <div class="flex justify-between gap-5 mt-5">
                        <div class="w-[60px] h-[25px] bg-slate-400"></div>

                        <div class="flex gap-2 px-3 py-1 border border-slate-400 rounded-sm">
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-400 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                        </div>
                    </div>
                </div>

                {{-- card --}}
                <div class="card flex flex-col gap-5 bg-slate-50 p-5 w-fit h-fit">
                    <div class="flex justify-between gap-5">
                        <div class="flex flex-col gap-1">
                            <div class="w-[150px] h-[20px] bg-slate-400"></div>
                            <div class="w-[250px] h-[20px] bg-slate-300"></div>
                            <div class="w-[180px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="w-[60px] h-[25px] sbg-slate-300"></div>
                    </div>

                    <div class="flex justify-between gap-5 mt-5">
                        <div class="w-[60px] h-[25px] bg-slate-400"></div>

                        <div class="flex gap-2 px-3 py-1 border border-slate-400 rounded-sm">
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-400 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                        </div>
                    </div>
                </div>

                {{-- card --}}
                <div class="card flex flex-col gap-5 bg-slate-50 p-5 w-fit h-fit">
                    <div class="flex justify-between gap-5">
                        <div class="flex flex-col gap-1">
                            <div class="w-[150px] h-[20px] bg-slate-400"></div>
                            <div class="w-[250px] h-[20px] bg-slate-300"></div>
                            <div class="w-[180px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="w-[60px] h-[25px] sbg-slate-300"></div>
                    </div>

                    <div class="flex justify-between gap-5 mt-5">
                        <div class="w-[60px] h-[25px] bg-slate-400"></div>

                        <div class="flex gap-2 px-3 py-1 border border-slate-400 rounded-sm">
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-400 w-[20px] h-[20px]"></div>
                            <div class="bg-slate-300 w-[20px] h-[20px]"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- cart --}}
            <div class="cart w-[400px] h-fit bg-slate-100 p-3 flex flex-col gap-5">
                <div class="w-[80px] h-[25px] bg-slate-400 mb-5"></div>

                <div class="cart-item flex justify-between">
                    <div class="flex flex-col gap-2">
                        <div class="w-[200px] h-[20px] bg-slate-400"></div>
                        <div class="w-[50px] h-[20px] bg-slate-300"></div>
                        <div class="w-[200px] h-[20px] bg-slate-300"></div>
                    </div>

                    <div class="w-[70px] h-[25px] bg-slate-300 self-end"></div>
                </div>

                <div class="cart-item flex justify-between">
                    <div class="flex flex-col gap-2">
                        <div class="w-[200px] h-[20px] bg-slate-400"></div>
                        <div class="w-[50px] h-[20px] bg-slate-300"></div>
                        <div class="w-[200px] h-[20px] bg-slate-300"></div>
                    </div>

                    <div class="w-[70px] h-[25px] bg-slate-300 self-end"></div>
                </div>

                <div class="cart-item flex justify-between">
                    <div class="flex flex-col gap-2">
                        <div class="w-[200px] h-[20px] bg-slate-400"></div>
                        <div class="w-[50px] h-[20px] bg-slate-300"></div>
                        <div class="w-[200px] h-[20px] bg-slate-300"></div>
                    </div>

                    <div class="w-[70px] h-[25px] bg-slate-300 self-end"></div>
                </div>

                <div class="cart-item flex justify-between">
                    <div class="flex flex-col gap-2">
                        <div class="w-[200px] h-[20px] bg-slate-400"></div>
                        <div class="w-[50px] h-[20px] bg-slate-300"></div>
                        <div class="w-[200px] h-[20px] bg-slate-300"></div>
                    </div>

                    <div class="w-[70px] h-[25px] bg-slate-300 self-end"></div>
                </div>

                {{--  --}}
                <div class="flex flex-col gap-2 px-3">
                    <div class="w-[120px] h-[20px] bg-slate-400 mb-2"></div>
                    <div class="flex justify-between border-b-2 border-slate-300 pb-2">
                        <div class="flex flex-col gap-2">
                            <div class="w-[60px] h-[20px] bg-slate-300"></div>
                            <div class="w-[60px] h-[20px] bg-slate-300"></div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <div class="w-[60px] h-[20px] bg-slate-400"></div>
                            <div class="w-[60px] h-[20px] bg-slate-400"></div>
                        </div>
                    </div>

                    <div class="flex justify-between ">
                        <div class="w-[60px] h-[20px] bg-slate-300"></div>
                        <div class="w-[60px] h-[20px] bg-slate-400"></div>
                    </div>

                    
                </div>

                {{--  --}}
                <div class="mt-5 flex justify-between">
                    <div class="submit flex items-center justify-center w-[45%] h-[30px] bg-slate-300 relative ">
                        <div class="w-[50%] h-[50%] bg-slate-400"></div>
                    </div>

                    <div class="submit flex items-center justify-center w-[45%] h-[30px] bg-slate-300 relative ">
                        <div class="w-[50%] h-[50%] bg-slate-400"></div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>