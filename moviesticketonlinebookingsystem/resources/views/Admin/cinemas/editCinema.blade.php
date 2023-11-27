@extends('Admin.layouts.master')

@section('title','editcinemas')

@section('mainContent')
<div class="container mx-auto grid place-items-center h-screen">
    <div class="border p-3 w-[40%]">

        <h2 class="text-center font-extrabold">Create Cinema</h2>
        <form action="{{route('Admin#editCinema')}}" method="post">
            @csrf
            <div>
                <label for="">Name</label>
                <input type="hidden" name="cinemaId" value="{{$cinemas->id}}">
                <input class="block w-[100%] h-[33px] rounded-lg" type="text" name="cinemaName" value="{{old('cinemaName', $cinemas->name)}}" id="">
            </div>
            <div>
                <label for="">Location</label>
                <input class="block w-[100%] h-[33px] rounded-lg" type="text" name="cinemaLocation" value="{{old('cinemaLocation',$cinemas->location)}}" id="">
            </div>
            <div class="my-2">
                <button class="border text-sm px-2 py-1 dropshadow-lg rounded-lg" type="submit">submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
