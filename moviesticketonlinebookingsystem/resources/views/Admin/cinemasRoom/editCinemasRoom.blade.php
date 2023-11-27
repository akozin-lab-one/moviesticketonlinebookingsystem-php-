@extends('Admin.layouts.master')

@section('title','createcinemasroom')

@section('mainContent')
<div class="container mx-auto grid place-items-center h-screen">
    <div class="border p-3 w-[40%]">
        <h2 class="text-center font-extrabold">Edit CinemasRooms</h2>
        <form action="{{route('Admin#editCinemasRooms')}}" method="post">
            @csrf
            <div>
                <label for="">Cinema Name</label>
                <select class="block w-[100%] h-[35px] text-sm rounded-lg text-black" name="cinemaName" id="">
                    <option value=""></option>
                    @if(count($CinemaId) !== 0)
                        @foreach($CinemaId as $cinema)
                            <option value="{{$cinema->CinemaId}}" @if ($cinema->CinemaId === $cinemaRoom->id)
                                selected
                            @endif>{{$cinema->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div>
                <label for="">Room Name</label>
                <input type="hidden" name="cinemaRoomId" value="{{$cinemaRoom->id}}">
                <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="cinemaRoomName" id="" value="{{old('cinemaRoomName', $cinemaRoom->room_name)}}">
            </div>
            <div>
                <label for="">Room Number</label>
                <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="cinemaRoomNumber" id="" value="{{old('cinemaRoomNumber', $cinemaRoom->room_number)}}">
            </div>
            <div>
                <label for="">Seating Capacity</label>
                <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="cinemaSeatingCapacity" id="" value="{{old('cinemaSeatingCapacity', $cinemaRoom->seating_capacity)}}">
            </div>
            <div class="my-2">
                <button class="border text-sm px-2 py-1 dropshadow-lg rounded-lg text-black" type="submit">submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
