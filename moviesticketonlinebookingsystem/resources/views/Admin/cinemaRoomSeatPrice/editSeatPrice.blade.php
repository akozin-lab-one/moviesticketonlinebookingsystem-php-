@extends('Admin.layouts.master')

@section('title','editcinemasroomseatprices')

@section('mainContent')
<div class="container mx-auto grid place-items-center h-screen">
    <div class="border p-3 w-[40%]">
        <h2 class="text-center font-extrabold">Edit CinemasRoomsSeatPrices</h2>
        <form action="{{route('Admin#seatPriceedit')}}" method="post">
            @csrf
            <div>
                <label for="">Room Name</label>
                <select class="block w-[100%] h-[33px] rounded-lg" name="roomName" id="">
                    <option value=""></option>
                    @if(count($rooms) !== 0)
                        @foreach($rooms as $room)
                            <option value="{{$room->id}}" @if ($seatPrices[0]->room_id === $room->id)
                                selected
                            @endif>{{$room->room_name}} {{$room->room_number}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div>
                <label for="">Row Name</label>
                <select class="block w-[100%] h-[33px] rounded-lg" name="rowName" id="">
                    <option value=""></option>
                    @if(count($row_names) !== 0)
                        @foreach($row_names as $row)
                            <option value="{{$row->id}}" @if ($seatPrices[0]->row_name === $row->id)
                                selected
                            @endif>{{$room->row_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div>
                <label for="">Seat Price</label>
                <input type="hidden" name="roomseatPriceId" value="{{$seatPrices[0]->id}}" >
                <input class="block w-[100%] h-[33px] rounded-lg" type="text" name="roomSeatPrice" value="{{old('roomSeatPrice',$seatPrices[0]->seat_price)}}">
            </div>
            <div class="my-2">
                <button class="border text-sm px-2 py-1 dropshadow-lg rounded-lg" type="submit">submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
