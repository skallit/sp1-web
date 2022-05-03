@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Nouvelle reservation')}}</h1>
@stop


@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="createConfirmation" method="post">
            @csrf
            <div class="input-group mb-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="form-group">
                            <label for="city">{{__('Choisissez une ville')}}</label>
                            <select class="custom-select form-control-border border-width-2" id="city"
                                    name="departureAgency_id">
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->city}} / {{$city->department}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">{{__('Date')}}</label>
                            <input type="date" class="form-control" id="date" name="date" value="date('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label for="typeDay">{{__('Choisissez un type de journer')}}</label>
                            <select class="custom-select form-control-border border-width-2" id="typeDay"
                                    name="typeDay_id">
                                @foreach($typeDays as $typeDay)
                                <option value="{{$typeDay->id}}">{{$typeDay->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" value="{{$typeRoutes[0]->id}}" type="radio"
                                       name="typeRoute_id">
                                <label class="form-check-label">{{$typeRoutes[0]->type}}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="{{$typeRoutes[1]->id}}" type="radio"
                                       name="typeRoute_id">
                                <label class="form-check-label">{{$typeRoutes[1]->type}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city">{{__('Choisissez une ville de retour (seulement pour les aller
                                retour)')}}</label>
                            <select class="custom-select form-control-border border-width-2" id="city"
                                    name="returnAgency_id">
                                <option value="">{{__('Ne pas changer si aller simple')}}</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->city}} / {{$city->department}}</option>
                                @endforeach
                            </select>
                            @error('returnCity')
                            <div><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">{{__('Choisissez un vehicule (model / nombre de place)')}}</label>
                            <select class="custom-select form-control-border border-width-2" id="vehicle"
                                    name="vehicle_id">
                                @foreach($vehicles as $vehicle)
                                <option value="{{$vehicle->id}}">{{$vehicle->nameModel}} / {{$vehicle->numberOfSeats}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">{{__('Choisissez un conducteur (nom / ville)')}}</label>
                            <a href="{{route('driver.create')}}" class="btn btn-primary float-right">
                                <i class="fa fa-plus"></i>
                                {{__('Nouveau conducteur')}}
                            </a>
                            <p>{{ $message ?? '' }}</p>
                            <select class="custom-select form-control-border border-width-2" id="driver"
                                    name="driver_id">
                                @foreach($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->name}} {{$driver->firstName}} /
                                    {{$driver->city}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('formulaire')
                        <div><strong>{{ $message }}</strong></div>
                        @enderror

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" value="{{__('Confirmer la réservation')}}"
                                   class="btn btn-primary float-right">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
