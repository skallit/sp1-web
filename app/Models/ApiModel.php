<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ApiModel extends Model
{
    protected static function map($array){
        $class=get_called_class();
        if (is_array($array)){
            $array =collect($array);
        }
        if (get_class($array)==\stdClass::class){
            $array=collect([$array]);
        }

        return $array->map(function ($item)use ($class){
            $object = new $class();
            foreach ($object->fillable as $key){
                try {
                    $object->$key = $item->$key;
                }
                catch (\Exception $e){
                    echo $e->getMessage();
                    dd($item);
                }
            }
            return $object;
        });
    }

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
}
