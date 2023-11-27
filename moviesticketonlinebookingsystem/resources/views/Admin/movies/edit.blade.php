@extends('Admin.layouts.master')

@section('title', 'editmovies')

@section('mainContent')
<div class="container mx-auto grid place-items-center h-screen">
    <div class="border p-3 w-[40%]">
        <h2 class="text-center font-extrabold">Edit Movies</h2>
        <form action="{{route('Admin#movieEdit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-2">
                <label for="">Title</label>
                <input type="hidden" name="movieId" value="{{$movies->id}}" >
                <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="movieTitle" value="{{old('movieTitle', $movies->movieTitle)}}" id="">
            </div>
            <div class="my-2">
                <label for="">Category</label>
                <select class="block w-[100%] h-[37px] rounded-lg text-sm text-black" name="movieCategory" id="">
                    <option value="">choose your category</option>
                    @if (count($categories) !== 0)
                        @foreach ($categories as $cate)
                        <option value="{{$cate->id}}" @if( $cate->id === $movies->category_id) selected @endif>{{$cate->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="my-2">
                <label for="">Release_Date</label>
                <input class="block w-[100%] h-[33px] rounded-lg text-black" type="date" name="movieRelease" id="" value="{{old('movieRelease', $movies->releaseDate)}}">
            </div>
            <div class="my-2">
                <label for="">Duration</label>
                <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="movieDuration" id="" value="{{old('movieDuration', $movies->duration)}}">
            </div>
            <div class="my-2">
                <label for="">Photo</label>
                <input class="block w-[100%] h-[33px] bg-white rounded-lg text-black" type="file" name="moviePhoto" id="" value="{{old('moviePhoto', $movies->photo)}}">
            </div>
            <div class="mt-4">
                <button class="border text-sm px-2 py-1 dropshadow-lg rounded-lg" type="submit">submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
