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
                <h1>{{__('Voici votre profil')}}</h1>
                <p>{{__('Nom: ')}}{{$user->name}}</p>
                <p>{{__('Prénom: ')}}{{$user->firstName}}</p>
                <p>{{__('Email: ')}}{{$user->email}}</p>
                <p>{{__('Habilitation: ')}}{{$user->empowerment}}</p>
                <p>{{__('Raison social: ')}}{{$user->companyName}}</p>
                <form action="updatePassword" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="{{ __('mot de passe') }}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                    <div class="col-5">
                        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                            <span class="fas fa-sign-in-alt"></span>
                            {{ __('Changer le mot de passe') }}
                        </button>
                    </div>

            </div>
        </div>
    </div>
</div>
@stop
