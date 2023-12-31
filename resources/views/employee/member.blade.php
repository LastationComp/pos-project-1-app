@extends('employee.layouts.main')

@section('content')
    <div class="wrapper w-[100%] h-[90vh] bg-white p-3 mt-3 overflow-hidden rounded-lg border shadow-2xl relative">

        <div class="top-head absolute top-0 left-0 w-full px-3 bg-white">
            <div class="text-center border-b-2 border-emerald-500 p-3 w-full ">
                <h2 class="text-3xl font-light capitalize">Data member</h2>
            </div>

            <form action="{{ route('member_page') }}" method="GET" class="search-wrapper w-full mt-3">
                <div class="flex w-[70%] gap-2">
                    <div class="relative border rounded-md flex items-center">
                        <button type="submit" class="absolute left-0 ml-3">
                            <i class="fa fa-search text-sm"></i>
                        </button>

                        <input type="search" name="search"
                            class="px-10 py-1 border-r-[2px] border-b-[1px] text-sm border-white bg-white shadow-md w-full rounded-md focus: focus:border-slate-400 focus:outline-none"
                            placeholder="Search Kode Member">
                    </div>


                    <a href="{{ route('member_page') }}"
                        class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-slate-300 shadow-md"><i
                            class="bi bi-arrow-clockwise mr-2"></i> refresh</a>
                    <a href="{{ route('add_data_member') }}"
                        class=" border border-white rounded-lg px-3 py-1 flex justify-center items-center text-sm bg-green-500 text-white shadow-md"><i
                            class="bi bi-plus mr-2"></i> Tambah</a>
                </div>
            </form>

        </div>
        

        <div class="table-wrapper w-full h-[90%] overflow-auto no-scrollbar pt-28 -z-0">
            {{-- <p class="text-sm text-slate-500 mb-2 font-light">Menampilkan 1 - 10 data dari total 10M data</p> --}}
            @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ $message }}</span>
          </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-1/2" role="alert">
                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
                <p class="ml-6">{{ $message }}</p>
            </div>
        @endif
        @if ($errors->any())
        <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg mb-3 w-1/2" role="alert">
            <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            
                

        @endif
            <table class="w-full text-md border-collapse rounded-corners rounded-t-xl overflow-hidden" cellpadding="7"
                cellspacing="0" border="5">
                <thead classs="sticky top-0 w-full">
                    <tr class=" bg-[#4B4B4B] text-white font-semibold">
                        <td class=" border border-l-0 border-t-0  border-black capitalize text-center">no. </td>
                        <td class=" border border-l-0 border-t-0 border-black capitalize w-[25%]">nama member</td>
                        <td class=" border border-l-0 border-t-0 border-black capitalize">kode member</td>
                        <td class=" border border-l-0 border-t-0 border-black capitalize">no. telepon</td>
                        <td class="  border border-l-0 border-t-0 border-black capitalize w-[25%]">email</td>
                        <td class="  border border-l-0 border-t-0 border-black capitalize text-center">poin</td>
                        <td class="  border border-l-0 border-t-0 border-r-0 border-black capitalize text-center">aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="">
                            <td class=" border border-t-0 border-black text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class=" border border-l-0 border-t-0 border-black">{{ $item->name }}</td>
                            <td class=" border border-l-0 border-t-0 border-black font-bold">{{ $item->customer_code }}</td>
                            <td class=" border border-l-0 border-t-0 border-black italic">{{ $item->phone }}</td>
                            <td class=" border border-l-0 border-t-0 border-black font-light italic">{{ $item->email }}
                            </td>
                            <td class=" border border-l-0 border-t-0 border-black text-center font-semibold">
                                {{ $item->point }}</td>
                            <td class=" border border-l-0 border-t-0 border-black">
                                <div class="btn-group mx-auto w-fit text-white text-sm flex gap-3">
                                    <a href="{{ route('update_data_member', $item->customer_code) }}"
                                        class="w-[25px] h-[25px] p-1 bg-green-500 flex justify-center items-center"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('delete_data_member_employee', $item->customer_code) }}"
                                        method="POST">
                                        @csrf


                                        <button onclick="return confirm('yakin ingin menghapus data {{ $item->name }}')"
                                            type="submit"
                                            class="w-[25px] h-[25px] p-1 bg-red-500 flex justify-center items-center"><i
                                                class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="pagination mt-5 flex items-center w-full absolute bottom-3 left-3">
        <a href="" class=""><i class="bi px-3 py-1 bg-slate-400 bi-arrow-left"></i></a>
        <div class="page bg-slate-300 ">
            <a href="" class="border border-slate-400 px-3">1</a>
            <a href="" class="border border-slate-400 px-3">2</a>
            <a href="" class="border border-slate-400 px-3">3</a>
            <a href="" class="border border-slate-400 px-3">4</a>
            <a href="" class="border border-slate-400 px-3">5</a>
        </div>
        <a href="" class=""><i class="bi px-3 py-1 bg-slate-400 bi-arrow-right"></i></a>
    </div> --}}
    </div>
@endsection
