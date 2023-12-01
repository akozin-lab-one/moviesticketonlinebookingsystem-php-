@extends('User.layouts.master')

@section('title', 'movieViewPage')

@section('mainContent')
<h4 class="font-bold">Upcoming Movies</h4>
<div class="flex flex-row">
    <div class="flex-1 p-1">
        <div class="flex flex-wrap">
            @if (count($movies) !== 0)
                @foreach ($movies as $movie )
                <div class=" w-32 rounded-lg mr-4 mb-10 h-40 drop-shadow-lg  hover:w-52 hover:duration-400 duration-300">
                    <img class="w-32 h-40 hover:w-52 relative rounded-lg object-cover" src="{{asset('storage/'. $movie->photo)}}" alt="">
                    <h4 class="text-gray-500 text-left mt-2">{{$movie->movie_title}}</h4>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="hidden lg:block lg:min-w-[97px] md:min-w-[250px] basis-1/3">
        <div class=" w-[250px] h-[100%] rounded-lg">
            <ul class="pl-3 pt-3">
                @if (count($categories) !== 0)
                    @foreach ($categories as $category )
                        <li class="border-l-2 border-black pl-1 hover:text-gray-300 cursor-pointer ">{{$category->name}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

<h4 class="mt-10 font-bold">Cinemas</h4>
<div class="flex flex-row">
    <div class="flex-1 p-1">
        <div class="flex flex-wrap">
            @if (count($cinemas) !== 0)
                @foreach ($cinemas as $cinema )
                    <div class="mr-5 rounded-lg w-48 h-40">
                        <img class="w-48 h-40 rounded-lg" src="https://shorturl.at/CHIX2" alt="">
                        <h5 class="text-center text-gray-500">{{$cinema->name}}</h5>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="hidden lg:block lg:min-w-[97px] md:min-w-[250px] basis-1/3">
        <div class=" w-[250px] h-[100%]">
            <ul class="pl-3 pt-3 border drop-shadow-lg rounded-lg border-black pb-3 h-56">
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor sit.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor consectetur.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor sit amet.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor sit.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor consectetur.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor sit amet.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor consectetur.</li>
                <li class="pl-1 hover:text-gray-300 cursor-pointer">Lorem ipsum dolor sit amet.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
