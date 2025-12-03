@extends('layouts.admin')

@section('title', 'Settings - Admin')
@section('header', 'Settings')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Settings</h2>
    <p class="text-gray-600 text-sm mb-4">
        Draft halaman Settings. Nanti bisa diisi pengaturan aplikasi atau profil admin.
    </p>

    <div class="bg-white rounded-lg shadow p-4">
        <p class="text-gray-500 text-sm">
            Contoh: toggle dark mode, ganti nama aplikasi, ganti password admin, dll.
        </p>
    </div>
@endsection
