@extends('layouts.admin')

@section('title', 'Users - Admin')
@section('header', 'Users')

@section('content')
    
    <h2 class="text-2xl font-semibold text-gray-800 mb-1">Users</h2>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.css"></script>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table id="usertable" class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-2 py-2 text-left font-semibold text-gray-700">No</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Created At</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-600">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-gray-600">
                            {{ optional($user->created_at)->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                            Belum ada user terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <script>new DataTable('#usertable');</script>
        </table>
    </div>
@endsection

