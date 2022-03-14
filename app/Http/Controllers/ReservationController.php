<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function delete($id)
    {
        $reservation = ApiModel::get('getReservation/' . $id)->success;
        return view('reservation.delete', ['reservation' => $reservation]);
    }

    public function destroy($id)
    {
        $reservation = ApiModel::delet('delReservation/' . $id);
        return redirect(route('reservation.index'));
    }

    public function create()
    {
        $city = ApiModel::get('getAgencySeven')->success;
        $typeDay = ApiModel::get('getTypeDay')->success;
        $typeRoute = ApiModel::get('getTypeRoute')->success;
        $vehicles = ApiModel::get('getVehicle');
        $driver = ApiModel::get('getDriver')->success;
        return view('reservation.create', ['cities' => $city, 'typeDays' => $typeDay,
            'typeRoutes' => $typeRoute, 'vehicles' => $vehicles, 'drivers' => $driver]);
    }

    public function createConfirmation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'departureAgency_id' => 'required',
            'date' => 'required',
            'typeDay_id' => 'required',
            'typeRoute_id' => 'required',
            'vehicle_id' => 'required',
            'driver_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors([
                'formulaire' => 'Erreur: Veuillez remplir tout les champs requis',
            ]);
        }
        if ($request->typeRoute_id == 2 && $request->returnAgency_id == null) {
            return back()->withErrors([
                'returnCity' => 'Erreur: Choisissez une ville de retour si c\'est un aller retour',
            ]);
        } elseif ($request->typeRoute_id == 1 && $request->returnAgency_id != null) {
            return back()->withErrors([
                'returnCity' => 'Erreur: Ne choisissez pas de ville retour si c\'est un aller simple',
            ]);
        } else {
            $apiResponse = ApiModel::post('createReservation', [
                'departureAgency_id' => $request->departureAgency_id,
                'date' => $request->date,
                'typeDay_id' => $request->typeDay_id,
                'typeRoute_id' => $request->typeRoute_id,
                'vehicle_id' => $request->vehicle_id,
                'driver_id' => $request->driver_id,
                'returnAgency_id' => $request->returnAgency_id,

            ]);
            if (isset($apiResponse->success)) {
                $reservation = ApiModel::get('getReservation/' . $apiResponse->success->id)->success;
                return view('reservation.show', ['reservation' => $reservation]);
            } else {
                return back()->withErrors([
                    'formulaire' => 'La reservation ne peux étre accepter.',
                ]);
            }
        }
    }
}
