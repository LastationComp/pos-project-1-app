@extends('admin.layouts.app')

@section('content')
    <div class="px-[100px] py-[25px]">
        <div class="mb-6">
            <a href="{{ route('add_data_employee') }}"
            class=" px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Add Data Employee</a>
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
                        <td class="border-[2px] border-slate-300">{{ $person['name'] }}</td>
                        <td class="border-[2px] border-slate-300">other</td>
                        <td class="border-[2px] border-slate-300">other 2</td>
                        <td class="border-[2px] border-slate-300">other 3</td>
                        <td class="border-[2px] border-slate-300">
                            <div class="action-group flex gap-2">
                                <a href="{{ url('admin/dashboard/create/') }}"
                                    class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-green-500"><i
                                        class="fa fa-plus text-xs"></i></a>
                                <a href="{{ url('admin/dashboard/' . $person['name'] . '/edit') }}"
                                    class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-orange-500"><i
                                        class="fa fa-edit text-xs"></i></a>
                                <form action="{{ url('admin/dashboard/' . $person['name']) }}" method="POST" class=>
                                    @csrf
                                    @method('delete')
    
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data {{ $person['name'] }}?')"
                                        class="flex justify-center items-center w-[25px] h-[25px] rounded-full text-white bg-red-500"><i
                                            class="fa fa-trash text-xs"></i></button>
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
