@extends('Admin.layouts.master')

@section('title','SeatPriceList')

@section('mainContent')
<h1 class="text-2xl font-semibold mb-4">Cinemas Room Seats Prices</h1>
<table class="min-w-full bg-white text-black border border-gray-300">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">Id</th>
            <th class="py-2 px-4 border-b">RoomName</th>
            <th class="py-2 px-4 border-b">Row Name</th>
            <th class="py-2 px-4 border-b">Seat Price</th>
            <th class="py-2 px-4 border-b">Action</th>
            <th class="py-2 px-4 border-b"></th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample Data -->
        @if (count($seatPrices) !== 0)
            @foreach ($seatPrices as $roomseat)
                <tr>
                    <td class="text-center py-2 px-3 border-b">{{ $roomseat->id }}</td>
                    <td class="text-center py-2 px-3 border-b">{{ $roomseat->room_name }}{{ $roomseat->room_number }}</td>
                    <td class="text-center py-2 px-3 border-b">{{ $roomseat->row_name }}</td>
                    <td class="text-center py-2 px-3 border-b">{{ $roomseat->seat_price }} Ks</td>
                    <td class=" text-center  py-2 px-2 border-b">
                        <form action="{{route('Admin#editseatprice', $roomseat->id)}}" method="post">
                            @csrf
                            <button class="bg-blue-500 text-white px-4 py-1 rounded-md" type="submit">Edit</button>
                        </form>
                    </td>
                    <td class=" text-center  py-2 px-2 border-b">
                        <form action="{{route('Admin#deleteseatPrice', $roomseat->id)}}" method="post">
                            @csrf
                            <button class="bg-red-500 text-white px-2 py-1 rounded-md" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-2xl font-extrablod text-center">There is no Movies for cinema!!</td>
            </tr>
        @endif
        <!-- Add more rows as needed -->
    </tbody>
</table>
<!-- Create Button -->
<div class="mt-4">
    <a href="{{route('Admin#createseatpricePage')}}"><button class="bg-blue-500 text-white py-2 px-4 rounded">Create
            CinemasRoomSeatsPrices</button></a>
</div>

@if (session('deletesuccess'))
    <div class="realtive flex justify-end">
        <div id="toast-danger"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{session('deletesuccess')}}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@endif
@if (session('updateSuccess'))
<div class="realtive flex justify-end">
    <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
          {{session('updateSuccess')}}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>
</div>
@endif
@endsection
