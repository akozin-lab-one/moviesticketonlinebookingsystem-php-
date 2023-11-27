<?php

namespace App\Http\Controllers;

use App\Models\Cinemas;
use App\Models\CinemaRooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CinemasController extends Controller
{
    //mainlist
    public function mainCinemaListPage(){
        $cinemas = Cinemas::select('id','name', 'location')->orderBy('id','desc')->get();
        // dd($cinemas->toArray());
        return view('Admin.cinemas.cinemaList',compact('cinemas'));
    }

    //createcinemasPage
    public function createCinemasPage(){
        return view('Admin.cinemas.createCinema');
    }

    //cinemacreation
    public function Cinemacreation(Request $request){

        $this->cinemaValidateData($request);
        $data = $this->requestValidateCinema($request);

        Cinemas::create($data);

        return redirect()->route('Admin#cinemacreatePage')->with(['successCinemacreation'=>'cinema is successfully created']);
    }

    //cinemaDelete
    public function CinmeaDeleteData($id){
        // dd($id);
        Cinemas::where('id',$id)->delete();

        return redirect()->route('Admin#cinemalist')->with(['deleteCinema'=>'cinema is successfully deleted']);
    }

    //cinemaEditPage
    public function CinmeaEditDataPage($id){
        // dd($id);
        $cinemas = Cinemas::select('id','name','location')->where('id', $id)->first();
        // dd($cinemas->toArray());
        return view('Admin.cinemas.editCinema', compact('cinemas'));
    }

    //editCinema
    public function editCinema(Request $request){
        // dd($request->toArray());
        $this->cinemaValidateData($request);
        $data = $this->requestValidateCinema($request);

        Cinemas::where('id',$request->cinemaId)->update($data);
        return redirect()->route('Admin#cinemalist')->with(['successEdit'=> 'cinema data is successfully edited']);
    }

    //mainlist
    public function CinemasRoomListPage(){
        $cinemas = CinemaRooms::select('cinema_rooms.id','cinemas.name as cinemaName','room_number','room_name','seating_capacity')
                    ->join('cinemas', 'cinemas.id' , 'cinema_rooms.cinema_id')
                    ->get();
        // dd($cinemas->toArray());
        return view('Admin.cinemasRoom.cinemasRoomList',compact('cinemas'));
    }

    //createPage
    public function createCinemasRoomPage(){
        $CinemaId = Cinemas::select('id as CinemaId','name')->get();
        // dd($CinemaId->toArray());
        return view('Admin.cinemasRoom.createCinemasRooms',compact('CinemaId'));
    }

    //createCinemasRooms
    public function createCinemasRoom(Request $request){
        // dd($request->toArray());
        $this->cinemaRoomsValidate($request);
        $data = $this->requestcinemaRoomsData($request);
        // dd($data);

        CinemaRooms::create($data);

        return redirect()->back()->with(['successCreateRooms' => 'cinema Room is successfully created.']);
    }

    //editCInemasPage
    public function EditCinemasPage($id){
        $cinemaRoom = CinemaRooms::select('id','cinema_id','room_number','room_name', 'seating_capacity')->where('id', $id)->first();
        // dd($cinema->toArray());
        $CinemaId = Cinemas::select('id as CinemaId','name')->get();
        // dd($CinemaId->toArray());
        return view('Admin.cinemasRoom.editCinemasRoom', compact('cinemaRoom','CinemaId'));
    }

    //editcinemasRoomsData
    public function EditCinemasRooms(Request $request){
        // dd($request->toArray());
        $this->cinemaRoomsValidate($request);
        $data = $this->requestcinemaRoomsData($request);

        CinemaRooms::where('id', $request->cinemaRoomId)->update($data);

        return redirect()->route('Admin#cinemasRoomList')->with(['editDatasuccess'=> 'cinema room data is successfully edited']);
    }

    //deletecinemaRooms
    public function deleteCinemasRooms($id){
        // dd($id);
        CinemaRooms::where('id',$id)->delete($id);
        return redirect()->back()->with(['deleteCinemasRooms'=>'cinemas Room is successfully deleted']);
    }

    //validateCinemaRooms
    private function cinemaRoomsValidate($request){
        // dd($request->toArray());
        // dd($status);
        Validator::make($request->all(),[
            'cinemaName' => 'required',
            'cinemaRoomNumber' => 'required',
            'cinemaRoomName' => 'required|min:3',
            'cinemaSeatingCapacity' => 'required'
        ])->validate();
    }

    //requestCinemaRoom
    private function requestcinemaRoomsData($request){
        return [
            'cinema_id' => $request->cinemaName,
            'room_number' => $request->cinemaRoomNumber,
            'room_name' => $request->cinemaRoomName,
            'seating_capacity' => $request->cinemaSeatingCapacity
        ];
    }

    //validatecinemadata
    private function cinemaValidateData($request){
        // dd($request->toArray());
        Validator::make($request->all(),[
            'cinemaName' => 'required|min:4',
            'cinemaLocation' => 'required'
        ])->validate();
    }

    //requestCinemaData
    private function requestValidateCinema($request){
        return [
            'name' => $request->cinemaName,
            'location' => $request->cinemaLocation
        ];
    }
}
