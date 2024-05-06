<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ApiModel extends Model
{

    private static function call($route,$method,$params){
        $response = json_decode(Http::withToken(Session::get('api_token'))
            ->$method(config('api.url')  .$route,$params)
        ->body());
        return $response;
    }

    public static function get($route,$params=[]){
        return self::call($route,'get',$params);
    }

    public static function post($route,$params=[]){
        return self::call($route,'post',$params);
    }

    public static function delet($route,$params=[]){
        return self::call($route,'delete',$params);
    }

}
