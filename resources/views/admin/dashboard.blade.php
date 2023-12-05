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

    <div class="bg-back opacity-80 w-full h-full absolute left-0 top-0 right-0 bottom-0 bg-black z-20 hidden" id="bg-back"></div>

    {{-- navbar --}}
    <nav class="w-full h-fit bg-blue-500">
        <div class="header-wrapper w-full h-fit p-3 text-white relative z-10 flex items-center justify-between">
            <div class="left-side">
                <div class="flex gap-3 ">
                    <h2 class="font-mono text-2xl font-bold ml-10">Dashboard</h2>
                    <p class="self-end">Selamat datang admin majoo</p>
                </div>
    
                <ul class="flex gap-3 items-center mt-3 text-sm ml-14">
                    <li class="border-b-2 border-green-400"><a href="#">Home</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>

            <div class="right-side">
                <a href="" class="font-semibold text-center px-4 py-2 mr-5 bg-white text-black rounded-md text-sm">LogOut</a>
            </div>
        </div>

        <div class="sidebar fixed left-0 top-0 h-full bg-blue-500 p-3 z-10 rounded-br-full">
            <div class="sidebar-wrapper h-full">
                <ul class="flex flex-col translate-y-20 mt-10 gap-5">
                    <li class="bg-white rounded-full w-[30px] h-[30px] flex justify-center items-center"><a href="" class=""><i class="fa fa-th-large "></i></a></li>
                    <li class="text-white rounded-full w-[30px] h-[30px] flex justify-center items-center"><a href="" class=""><i class="fa fa-clock "></i></a></li>
                    <li class="text-white rounded-full w-[30px] h-[30px] flex justify-center items-center"><a href="" class=""><i class="fa fa-trash "></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content ml-[54px] p-5">
        <div class="admin-index">
            <table class="w-[300px]">
                <thead>
                    <tr class="border-b-2 border-sky-500">
                        <td class="text-xl font-semibold">#</td>
                        <td class="text-xl font-semibold">nama</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    <tr class="border-b-2 border-sky-500">
                        <td>1</td>
                        <td>yova</td>
                        <td>
                            <div class="action-group flex gap-2">
                                <button id="add-btn" class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-green-500"><i class="fa fa-plus text-xs"></i></button>
                                <button id="edit-btn" class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-orange-500"><i class="fa fa-edit text-xs"></i></button>
                                <button id="delete-btn" class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-red-500"><i class="fa fa-trash text-xs"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- some modal --}}
        {{-- add --}}
        <div id="add-modal" class="modal-wrapper w-[600px] h-fit absolute top-10 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-white z-30 hidden" id="add-modal">
            <div class="close-add flex items-center justify-center absolute right-2 top-2 bg-red-500 text-white w-[18px] h-[18px] rounded-full cursor-pointer" id="close-add">
                <i class="fa fa-x text-xs font-semibold"></i>
            </div>

            <form action="" method="POST" class="w-full">
                @csrf

                <h2 class="font-light text-2xl mb-3">Add Data</h2>

                <div class="input-group text-white-500 w-full mb-3">
                    <label for="name">nama</label>
                    <input type="text" name="name" id="name" class="border-2  rounded-lg h-[30px] w-full">
                </div>

                <button type="submit" class="border-2 border-slate-400 px-3 py-1">create</button>
            </form>
        </div>

        {{-- edit --}}
        <div id="edit-modal" class="modal-wrapper w-[600px] h-fit absolute top-10 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-white z-30 hidden" id="add-modal">
            <div class="close-add flex items-center justify-center absolute right-2 top-2 bg-red-500 text-white w-[18px] h-[18px] rounded-full cursor-pointer" id="close-edit">
                <i class="fa fa-x text-xs font-semibold"></i>
            </div>

            <form action="" method="POST" class="w-full">
                @csrf

                <h2 class="font-light text-2xl mb-3">Edit Data</h2>

                <div class="input-group text-white-500 w-full mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="border-2  rounded-lg h-[30px] w-full">
                </div>

                <button type="submit" class="border-2 border-slate-400 px-3 py-1">update</button>
            </form>
        </div>

         {{-- delete --}}
         <div id="delete-modal" class="modal-wrapper w-[600px] h-fit absolute top-10 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-white z-30 hidden" id="add-modal">
            <div class="close-add flex items-center justify-center absolute right-2 top-2 bg-red-500 text-white w-[18px] h-[18px] rounded-full cursor-pointer" id="close-delete">
                <i class="fa fa-x text-xs font-semibold"></i>
            </div>

            <form action="" method="POST" class="w-full">
                @csrf

                <h2 class="font-light text-2xl mb-3">Delete Data</h2>

                <p>Yakin ingin menghapus data ini?</p>

                <button type="submit" class="border-2 border-slate-400 px-3 py-1 mt-3">delete</button>
            </form>
        </div>

        
    {{-- end of modal --}}

    <script>
        console.log(document.querySelector('.sidebar').clientWidth)

        const bg_back = $("#bg-back");

        // add
        const modal_add = $("#add-modal");
        const btn_add = $("#add-btn");
        const close_add = $("#close-add");
        
        btn_add.click(function(){
            bg_back.removeClass('hidden')
            modal_add.removeClass('hidden')
            console.log('popup')
        })

        close_add.click(function(){
            bg_back.addClass('hidden')
            modal_add.addClass('hidden')
            console.log('close popup')
        })

        // edit
        const modal_delete = $("#delete-modal");
        const btn_delete = $("#delete-btn");
        const close_delete = $("#close-delete");

        btn_delete.click(function(){
            bg_back.removeClass('hidden')
            modal_delete.removeClass('hidden')
            console.log('popup')
        })

        close_delete.click(function(){
            bg_back.addClass('hidden')
            modal_delete.addClass('hidden')
            console.log('close popup')
        })

        // delete
        const modal_edit = $("#edit-modal");
        const btn_edit = $("#edit-btn");
        const close_edit = $("#close-edit");

        btn_edit.click(function(){
            bg_back.removeClass('hidden')
            modal_edit.removeClass('hidden')
            console.log('popup')
        })

        close_edit.click(function(){
            bg_back.addClass('hidden')
            modal_edit.addClass('hidden')
            console.log('close popup')
        })

        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>
</body>
</html>