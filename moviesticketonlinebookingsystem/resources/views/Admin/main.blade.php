@extends('Admin.layouts.master')

@section('title','adminMain')

@section('mainContent')
<h1 class="text-2xl font-semibold mb-4">Dashboard Overview</h1>
<div class="grid grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-2">Total Users</h2>
        <p class="text-gray-600">500</p>
    </div>
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-2">Revenue</h2>
        <p class="text-gray-600">$50,000</p>
    </div>
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-2">Revenue</h2>
        <p class="text-gray-600">$50,000</p>
    </div>
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-2">Revenue</h2>
        <p class="text-gray-600">$50,000</p>
    </div>
</div>
@endsection
