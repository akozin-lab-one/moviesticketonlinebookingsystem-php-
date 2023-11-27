<?php

namespace App\Http\Controllers;

use App\Models\CinemaRooms;
use Illuminate\Http\Request;
use App\Models\CinemaRoomSeats;
use App\Models\CinemaRoomSeatPrices;
use Illuminate\Support\Facades\Validator;

class CinemaRoomSeat extends Controller
{
    //mainlistPage
    public function RoomSeatListPage(){
        $roomseats = CinemaRoomSeats::select('cinema_room_seats.id','cinema_rooms.room_name','cinema_rooms.room_number','seat_no','row_name','seat_type')
                        ->join('cinema_rooms', 'cinema_room_seats.room_id','cinema_rooms.id')
                        ->get();
        // dd($roomseats->toArray());
        return view('Admin.cinemaRoomSeat.main',compact('roomseats'));
    }

    //createseatPage
    public function createRoomSeatPage(){
        $rooms = CinemaRooms::select('id','room_name','room_number')->get();
        // dd($rooms->toArray());
        return view('Admin.cinemaRoomSeat.create',compact('rooms'));
    }

    //createroomseatList
    public function createRoomSeat(Request $request){
        // dd($request->toArray());
        $this->validateCinemaRoomSeats($request);
        $data = $this->requestCinemaRoomSeats($request);
        // dd($data);
        CinemaRoomSeats::create($data);

        return back()->with(['successcreate'=>'cinema room seat is successfully created.']);
    }

    //editroomseatListPage
    public function editRoomSeatPage($id){
        // dd($id);
        $rooms = CinemaRooms::select('id','room_name','room_number')->get();
        $roomseat = CinemaRoomSeats::select('id','room_id','seat_no','row_name','seat_type')->where('id',$id)->get();
        // dd($roomseat[0]->toArray());

        return view('Admin.cinemaRoomSeat.edit',compact('rooms','roomseat'));
    }

    //editroomseat
    public function EditRoomSeats(Request $request){
    // dd($request->toArray());
    $this->validateCinemaRoomSeats($request);
    $data = $this->requestCinemaRoomSeats($request);

    CinemaRoomSeats::where('id', $request->roomseatId)->update($data);
    return redirect()->route('Admin#roomseatpage')->with(['editsuccessSeat'=>'cinema room seat is successfully created']);
    }

    //deletelist
    public function deleteRoomSeat($id){
        // dd($id);
        CinemaRoomSeats::where('id',$id)->delete();
        return back()->with(['deletesuccess'=>'seat is successfully deleted']);
    }

    //mainseatPrielist
    public function SeatPriceList(){
        $seatPrices = CinemaRoomSeatPrices::select('cinema_room_seat_prices.id','cinema_rooms.room_name','cinema_rooms.room_number','cinema_room_seats.row_name','seat_price')
                        ->join('cinema_rooms', 'cinema_room_seat_prices.room_id','cinema_rooms.id')
                        ->join('cinema_room_seats','cinema_room_seat_prices.row_name','cinema_room_seats.id')
                        ->get();
        // dd($seatPrices->toArray());
        return view('Admin.cinemaRoomSeatPrice.main',compact('seatPrices'));
    }

    //createSeatPriceListpage
    public function CreateSeatPricePage(){
        $rooms = CinemaRooms::select('id','room_name','room_number')->get();
        $row_names = CinemaRoomSeats::select('id','row_name')->get();
        // dd($row_names->toArray());
        return view('Admin.cinemaRoomSeatPrice.createseatprices',compact('rooms','row_names'));
    }

    //createseatprice
    public function SeatPriceCreateion(Request $request){
        // dd($request->toArray());

        $this->validateSeatPrice($request);
        $data = $this->requestSeatPrice($request);

        CinemaRoomSeatPrices::create($data);
        return back()->with(['createsuccess'=>'seat price is successfully created']);
    }

    //editseatPricePage
    public function editSeatPricePage($id){
        // dd($id);
        $rooms = CinemaRooms::select('id','room_name','room_number')->get();
        // dd($rooms->toArray());
        $row_names = CinemaRoomSeats::select('id','row_name')->get();
        $seatPrices = CinemaRoomSeatPrices::select('id','room_id','row_name','seat_price')->get();
        // dd($seatPrices->toArray());
        return view('Admin.cinemaRoomSeatPrice.editSeatPrice', compact('rooms', 'row_names','seatPrices'));
    }

    //editSeatPrice
    public function editSeatPrice(Request $request){
        // dd($request->toArray());
        $this->validateSeatPrice($request);
        $data = $this->requestSeatPrice($request);
        // dd($data);

        CinemaRoomSeatPrices::where('id',$request->roomseatPriceId)->update($data);
        // dd(true);
        return redirect()->route('Admin#mainseatPriceList')->with(['updateSuccess'=>'seat price is successfully updated']);
    }

    //deletePrice
    public function DeleteSeatPrice($id){
        // dd($id);
        CinemaRoomSeatPrices::where('id',$id)->delete();
        return back()->with(['deletesuccess'=>'seat price is successfully deleted']);
    }

    //validateseatprice
    private function validateSeatPrice($request){
        Validator::make($request->all(),[
            'roomName' => 'required',
            'rowName' => 'required',
            'roomSeatPrice' =>'required'
        ])->validate();
    }

    //requestSeatPrice
    private function requestSeatPrice($request){
        return [
            'room_id' => $request->roomName,
            'row_name' =>  $request->rowName,
            'seat_price' => $request->roomSeatPrice
        ];
    }

    //validateroomseat
    private function validateCinemaRoomSeats($request){
        // dd($request->toArray());
        Validator::make($request->all(),[
            'roomName' => 'required',
            'roomSeatNo' =>'required',
            'roomRowName' => 'required',
            'roomSeatType' => 'required'
        ])->validate();
    }

    //requestcinemaRoomseat
    private function requestCinemaRoomSeats($request){
        return [
            'room_id' => $request->roomName,
            'seat_no' => $request->roomSeatNo,
            'row_name' => $request->roomRowName,
            'seat_type' => $request->roomSeatType
        ];
    }
}
