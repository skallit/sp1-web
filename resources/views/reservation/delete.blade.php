@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Reservations ')}}{{$reservation->numberOfReservation}}</h1>
@error('reservation')
<div><strong>{{ $message }}</strong></div>
@enderror
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{route('reservation.destroy',['reservation'=>$reservation->id])}}">
            @csrf
            @method("DELETE")
            <!-- Profile Image -->
            <div class="card card-danger card-outline">
                <div class="card-body">
                    {{__('Confirmer la suppression de la reservation ')}} {{$reservation->numberOfReservation}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('reservation.index') }}" class="btn btn-default float-left">{{__('Cancel')}}</a>
                    <input type="submit" class="btn btn-danger float-right" value="{{__('Delete')}}">
                </div>
            </div>
            <!-- /.card -->
        </form>
    </div>
</div>
@stop

