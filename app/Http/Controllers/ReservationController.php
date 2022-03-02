<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(){
        $drivers = ApiModel::get('getDriverReservation')->success;
        return view('reservation.index',['drivers'=>$drivers]);
    }

    public function show($id){
        $reservation = ApiModel::get('getReservation/'.$id)->success;
        return view('reservation.show',['reservation'=>$reservation]);
    }

    public function delete($id){
        $reservation = ApiModel::get('getReservation/'.$id)->success;
        return view('reservation.delete',['reservation'=>$reservation]);
    }

    public function destroy($id){
        $reservation = ApiModel::delet('delReservation/'.$id);
        return redirect(route('reservation.index'));
    }
}
