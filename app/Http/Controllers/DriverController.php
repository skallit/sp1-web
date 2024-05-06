<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function create()
    {
        return view('driver.create');
    }

    public function createConfirmation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'firstName' => 'required',
            'street' => 'required',
            'postalCode' => 'required',
            'city' => 'required',
            'proEmail' => 'required',
            'phoneNumber' => 'required',
            'driverLicenseNumber' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors([
                'formulaire' => 'Erreur: Veuillez remplir tout les champs requis',
            ]);
        } else {
            $apiResponse = ApiModel::post('createDriver', [
                'name' => $request->name,
                'firstName' => $request->firstName,
                'street' => $request->street,
                'postalCode' => $request->postalCode,
                'city' => $request->city,
                'proEmail' => $request->proEmail,
                'phoneNumber' => $request->phoneNumber,
                'driverLicenseNumber' => $request->driverLicenseNumber,
            ]);
            if (isset($apiResponse)) {
                return view('driver.updateMessage');
            } else {
                return back()->withErrors([
                    'formulaire' => 'Le conducteur ne peut être acceptée.',
                ]);
            }
        }
    }
}
