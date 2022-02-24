@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Reservations')}}

</h1>
@stop

@dd($reservation)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                    <tr>
                        <th>{{__('numberOfReservation')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('State')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$reservation->numberOfReservation}}</td>
                        <td>{{$reservation->name}}</td>
                        <td>{{$reservation->status}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@stop