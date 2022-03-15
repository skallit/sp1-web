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
        return view('reservation.show', ['reservation' => $reservation]);
    }

    public function delete($id)
    {
        $reservation = ApiModel::get('getReservation/' . $id)->success;
        return view('reservation.delete', ['reservation' => $reservation]);
    }

    public function destroy($id)
    {
        $delete = ApiModel::delet('delReservation/' . $id);
        if ($delete == null) {
            return back()->withErrors([
                'reservation' => 'La reservation ne peux étre supprimer',
            ]);
        } else {
            $drivers = ApiModel::get('getReservations')->success;
            $message = "La reservation a bien été supprimer";
            return view('reservation.index', ['message' => $message, 'drivers' => $drivers]);
        }
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
                $message = "La réservation a bien été effectuer";
                return view('reservation.show', ['reservation' => $reservation, 'message' => $message]);
            } else {
                return back()->withErrors([
                    'formulaire' => 'La réservation ne peut être acceptée.',
                ]);
            }
        }
    }
}
