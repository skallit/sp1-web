<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(){
        $drivers = ApiModel::get('getReservations')->success;
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

    public function create(){
        $city = ApiModel::get('getAgencySeven')->success;
        $typeDay = ApiModel::get('getTypeDay')->success;
        $typeRoute = ApiModel::get('getTypeRoute')->success;
        return view('reservation.create',['cities'=>$city,'typeDays'=>$typeDay,'typeRoutes'=>$typeRoute]);
    }

    public function vehicleChoice(Request $request){
        $vehicles = ApiModel::get('getVehicle');

        if ($request->typeRoute_id==2 && $request->returnCity_id=="null") {
            return back()->withErrors([
                'returnCity' => 'Choisissez une ville si c\'est un aller retour',
            ]);
        } elseif($request->typeRoute_id==1 && $request->returnCity_id!="null") {
            return back()->withErrors([
                'returnCity' => 'Ne choisissez pas de ville retour si c\'est un aller simple',
            ]);
        }else{
            return view('reservation.vehicleChoice',['vehicles'=>$vehicles]);
        }
    }
}
