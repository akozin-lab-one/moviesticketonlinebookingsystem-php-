@extends('Admin.layouts.master')

@section('title', 'editcinemasroom')

@section('mainContent')
    <div class="container mx-auto grid place-items-center h-screen">
        <div class="border p-3 w-[40%]">
            <h2 class="text-center font-extrabold">Edit CinemasRoomsSeat</h2>
            <form action="{{route('Admin#editroomSeat')}}" method="post">
                @csrf
                <div>
                    <label for="">Room Name</label>
                    <select class="block w-[100%] h-[37px] text-sm rounded-lg text-black" name="roomName" id="">
                        <option value=""></option>
                        @if (count($rooms) !== 0)
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" @if ($room->id === $roomseat[0]->id) selected
                                    @endif>
                                    {{ $room->room_name }} {{ $room->room_number }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="">Seat No</label>
                    <input type="hidden" name="roomseatId" value="{{$roomseat[0]->id}}">
                    <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="roomSeatNo" id="" value="{{old('roomSeatNo', $roomseat[0]->seat_no)}}">
                </div>
                <div>
                    <label for="">Row Name</label>
                    <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="roomRowName" id="" value="{{old('roomRowName', $roomseat[0]->row_name)}}">
                </div>
                <div>
                    <label for="">Seat Type</label>
                    <input class="block w-[100%] h-[33px] rounded-lg text-black" type="text" name="roomSeatType" id="" value="{{old('roomSeatType', $roomseat[0]->seat_type)}}">
                </div>
                <div class="my-2">
                    <button class="border text-sm px-2 py-1 dropshadow-lg rounded-lg" type="submit">submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
