@extends('admin.layouts.app')

@section('content')
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
                            <button id="add-btn"
                                class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-green-500"><i
                                    class="fa fa-plus text-xs"></i></button>
                            <button id="edit-btn"
                                class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-orange-500"><i
                                    class="fa fa-edit text-xs"></i></button>
                            <button id="delete-btn"
                                class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-red-500"><i
                                    class="fa fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- some modal --}}
{{-- add --}}
<div id="add-modal"
    class="modal-wrapper w-[600px] h-fit absolute top-10 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-white z-30 hidden"
    id="add-modal">
    <div class="close-add flex items-center justify-center absolute right-2 top-2 bg-red-500 text-white w-[18px] h-[18px] rounded-full cursor-pointer"
        id="close-add">
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
<div id="edit-modal"
    class="modal-wrapper w-[600px] h-fit absolute top-10 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-white z-30 hidden"
    id="add-modal">
    <div class="close-add flex items-center justify-center absolute right-2 top-2 bg-red-500 text-white w-[18px] h-[18px] rounded-full cursor-pointer"
        id="close-edit">
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
<div id="delete-modal"
    class="modal-wrapper w-[600px] h-fit absolute top-10 left-1/2 -translate-x-1/2 shadow-sm p-5 bg-white z-30 hidden"
    id="add-modal">
    <div class="close-add flex items-center justify-center absolute right-2 top-2 bg-red-500 text-white w-[18px] h-[18px] rounded-full cursor-pointer"
        id="close-delete">
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

    btn_add.click(function() {
        bg_back.removeClass('hidden')
        modal_add.removeClass('hidden')
        console.log('popup')
    })

    close_add.click(function() {
        bg_back.addClass('hidden')
        modal_add.addClass('hidden')
        console.log('close popup')
    })

    // edit
    const modal_delete = $("#delete-modal");
    const btn_delete = $("#delete-btn");
    const close_delete = $("#close-delete");

    btn_delete.click(function() {
        bg_back.removeClass('hidden')
        modal_delete.removeClass('hidden')
        console.log('popup')
    })

    close_delete.click(function() {
        bg_back.addClass('hidden')
        modal_delete.addClass('hidden')
        console.log('close popup')
    })

    // delete
    const modal_edit = $("#edit-modal");
    const btn_edit = $("#edit-btn");
    const close_edit = $("#close-edit");

    btn_edit.click(function() {
        bg_back.removeClass('hidden')
        modal_edit.removeClass('hidden')
        console.log('popup')
    })

    close_edit.click(function() {
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
@endsection