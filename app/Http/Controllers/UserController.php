<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = ApiModel::get('getRegisteredUser');
        return view('user.index',['user'=>$user]);
    }

    public function updatePassword(Request $request)
    {

        $apiResponse = ApiModel::post('updatePassword', [
            'password' => $request->password
        ]);
        if (isset($apiResponse)) {
            return view('user.updateMessage');
        } else {
            return back()->withErrors([
                'password' => 'Le mot de passe ne peux étre accepter.',
            ]);
        }
    }
}
