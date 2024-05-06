@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Conducteur')}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>{{__('Le conducteur a bien été ajouter')}}</h1>
                <a href="{{route('reservation.create')}}" class="btn btn-primary float-right">
                    <i class="fa fa-plus"></i>
                    {{__('Retourner à la création de réservation')}}
                </a>
            </div>
        </div>
    </div>
</div>
@stop
