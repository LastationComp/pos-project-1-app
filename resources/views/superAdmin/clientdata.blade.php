@extends('layout_superAdmin.app')

@section('content')
    <div class=" flex justify-center  py-[100px]">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-3">
            <div
                class="flex items-start flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                
                <div>
                    <a href="{{ route('superadmin.add_data_client') }}"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Data</a>
                </div>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            License Key
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Client Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Client Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Expired
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="text-base font-semibold">{{ $item->license_key }}</div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->client_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->client_code }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full {{ !$item->is_active ? 'bg-red-500' : 'bg-green-500' }}  me-2"></div>
                                    {{(!$item->is_active ? 'offline' : 'online')}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{$item->expired_at}}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('change_status_client', $item->id) }}" method="POST" class="mb-2">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Anda Yakin Ingin Mengubah Status Client')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline ml-3">Change Status</button>
                                </form>
                                    
                                    <a href="/superadmin/dashboard/client/{{$item->id}}/update/expired" class="font-medium text-blue-600 dark:text-blue-500 hover:underline ml-3">Update Expired</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
