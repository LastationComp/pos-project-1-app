@extends('admin.layouts.app')

@section('content')
<<<<<<< HEAD
<table class="w-[800px] table-auto" cellpadding="7">
    <thead>
        <tr class="border-l-4 border-b-4 border-sky-500">
            <td class="text-xl font-semibold">#</td>
            <td class="text-xl font-semibold">nama</td>
            <td class="text-xl font-semibold">other</td>
            <td class="text-xl font-semibold">other 2</td>
            <td class="text-xl font-semibold">other 3</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach ( $persons as $person )
        <tr class="">
            <td class="border-[2px] border-slate-300">{{ $loop->iteration }}</td>
            <td class="border-[2px] border-slate-300">{{ $person['name'] }}</td>
            <td class="border-[2px] border-slate-300">other</td>
            <td class="border-[2px] border-slate-300">other 2</td>
            <td class="border-[2px] border-slate-300">other 3</td>
            <td class="border-[2px] border-slate-300">
                <div class="action-group flex gap-2">
                    <a href="{{ url('admin/dashboard/create/') }}" class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-green-500"><i class="fa fa-plus text-xs"></i></a>
                    <a href="{{ url('admin/dashboard/' . $person['name'] . '/edit') }}" class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-orange-500"><i class="fa fa-edit text-xs"></i></a>
                    <form action="{{ url('admin/dashboard/' . $person['name']) }}" method="POST" class=>
                        @csrf
                        @method('delete')

                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data {{ $person['name']; }}?')" class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-red-500"><i class="fa fa-trash text-xs"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
=======
    <div class="px-[100px] py-[25px]">
        <div class="mb-6 grid grid-cols-2">
            <div class="">
                <form action="{{ route('dashboard_admin') }}" method="GET">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" name="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Name" >
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-end ">
                <a href="{{ route('add_data_employee') }}"
                    class=" absolute px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 "><i
                        class="fa fa-user-plus mr-2" aria-hidden="true"></i>Add Data Employee</a>
            </div>
        </div>

        <div>
            <table class="w-[800px] table-auto " cellpadding="7">
                <thead>
                    <tr class="border-l-4 border-b-4 border-sky-500">
                        <td class="text-xl font-semibold">#</td>
                        <td class="text-xl font-semibold">Employee Code</td>
                        <td class="text-xl font-semibold">Name</td>
                        <td class="text-xl font-semibold">Status</td>
                        <td class="text-xl font-semibold">Action</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($dataEmployee as $person)
    -->
                    <tr class="">
                        <td class="border-[2px] border-slate-300">{{ $loop->iteration }}</td>
                        <td class="border-[2px] border-slate-300">{{ $person->employee_code }}</td>
                        <td class="border-[2px] border-slate-300">{{ $person->name }}</td>
                        <td class="border-[2px] border-slate-300">{{ $person->is_active == true ? 'online' : 'offline' }}
                        </td>
                        <td class="border-[2px] border-slate-300">
                            <div class="action-group flex gap-2">
                                <form action="{{ route('deactive_employee', $person->employee_code) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm(`Apakah Anda Ingin Mengubah status employee {{ $person->name }} ?`) "
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Change
                                        Status</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    <!--
    @endforeach -->
                </tbody>
            </table>
        </div>

    </div>
@endsection
>>>>>>> eb22f47afd4e5c1f9874cb9b3c95732c910e6d94
