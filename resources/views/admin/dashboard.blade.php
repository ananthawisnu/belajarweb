@extends('layouts.admin')

@section('title', 'Dashboard - Admin')
@section('header', 'Dashboard')

@section('content')
    <h2 class="text-gray-800 text-3xl font-semibold">
        Welcome
        <span class="text-blue-700 animate-pulse">
            {{ auth()->user()->name }}
        </span>
        to the Admin Panel
    </h2>

    <div class="grid gap-4 md:grid-cols-3 mt-4">
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition cursor-pointer">
            <p class="text-sm text-gray-500">Total Users</p>
            <p class="text-2xl font-semibold text-gray-800 mt-1">
                {{ $usersCount }}
            </p>
            <p class="text-xs text-green-600 mt-1">+12% this week</p>
        </div>

        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition cursor-pointer">
            <p class="text-sm text-gray-500">Active Sessions</p>
            <p class="text-2xl font-semibold text-gray-800 mt-1">87</p>
            <p class="text-xs text-blue-600 mt-1">Live now</p>
        </div>

        <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition cursor-pointer">
            <p class="text-sm text-gray-500">Errors</p>
            <p class="text-2xl font-semibold text-gray-800 mt-1">3</p>
            <p class="text-xs text-red-600 mt-1">Need attention</p>
        </div>
    </div>
@endsection
