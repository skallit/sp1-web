@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Profil')}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>{{__('Le mot de passe à été modifier')}}</h1>
            </div>
        </div>
    </div>
</div>
@stop
