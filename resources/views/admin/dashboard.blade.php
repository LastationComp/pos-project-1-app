@extends('admin.layouts.main')

@section('content')
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