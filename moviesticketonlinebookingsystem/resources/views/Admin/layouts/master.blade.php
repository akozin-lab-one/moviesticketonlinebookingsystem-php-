<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
         <!-- Sidebar -->
         <div class="flex h-screen bg-gray-800 text-white">
            <div class="flex-shrink-0 w-64 bg-gray-700">
                <div class="flex items-center justify-center h-16 bg-gray-600">
                    <span class="text-2xl font-semibold">Admin Dashboard</span>
                </div>
                <nav class="mt-5">
                    <a href="{{route('Admin#movielist')}}" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">Movies</a>
                    <a href="{{route('Admin#category')}}" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">Category</a>
                    <a href="{{route('Admin#cinemalist')}}" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">Cinema</a>
                    <a href="{{route('Admin#cinemasRoomList')}}" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">CinemaRoom</a>
                    <a href="{{route('Admin#roomseatpage')}}" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">CinemaRoomSeat</a>
                    <a href="{{route('Admin#mainseatPriceList')}}" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">CinemaRoomSeatPrice<sss/a>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-600">Tickets Order</a>
                </nav>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-hidden">
                <header class="flex items-center justify-between p-4 bg-white border-b">
                    <span class="text-xl font-semibold">Welcome, Admin!</span>
                    <div class="flex items-center">
                        <span class="mr-2 text-black">{{Auth::user()->name}}</span>
                        <div class="bg-gray-300 text-gray-700 py-1 px-2 rounded-md">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit">logout</button>
                            </form>
                        </div>
                    </div>
                </header>
                <main class="p-4">
                    <!-- Your dashboard content goes here -->
                    <div class="container mx-auto">
                        @yield('mainContent')
                    </div>
                </main>
            </div>
        </div>
</body>
</html>
