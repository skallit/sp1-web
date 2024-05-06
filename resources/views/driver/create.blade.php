@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Nouveau Conducteur')}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="createConfirmation" method="post">
            @csrf
            <div class="input-group mb-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="form-group row">
                            <label>{{__('Nom')}}</label>
                            <input type="text" class="form-control" placeholder="Nom ..." name="name">
                        </div>
                        <div class="form-group row">
                            <label>{{__('Prénom')}}</label>
                            <input type="text" class="form-control" placeholder="Prénom ..." name="firstName">
                        </div>
                        <div class="form-group row">
                            <label>{{__('Rue')}}</label>
                            <input type="text" class="form-control" placeholder="rue ..." name="street">
                        </div>
                        <div class="form-group row">
                            <label>{{__('Code Postal')}}</label>
                            <input type="text" class="form-control" placeholder="Code postal ..." name="postalCode">
                        </div>
                        <div class="form-group row">
                            <label>{{__('Ville')}}</label>
                            <input type="text" class="form-control" placeholder="Ville ..." name="city">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{__('Email')}}</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                                       name="proEmail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>{{__('Téléphone')}}</label>
                            <input type="text" class="form-control" placeholder="Numéro de téléphone ..."
                                   name="phoneNumber">
                        </div>
                        <div class="form-group row">
                            <label>{{__('Permis de conduire')}}</label>
                            <input type="text" class="form-control" placeholder="Numéro du permis de conduire ..."
                                   name="driverLicenseNumber">
                        </div>
                        @error('formulaire')
                        <div><strong>{{ $message }}</strong></div>
                        @enderror


                        <div class="card-footer">
                            <input type="submit" value="{{__('Confirmer la création')}}"
                                   class="btn btn-primary float-right">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
