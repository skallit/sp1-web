@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Reservations')}}</h1>
@stop


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

                    @foreach($drivers as $driver)
                    <br>

                        @foreach($driver->reservations as $reservation)
                        <tr>
                            <td>{{$reservation->numberOfReservation}}</td>
                            <td>{{$driver->name}}</td>
                            <td>{{$reservation->status}}</td>
                            <td><a class="btn btn-default btn-xs" href="reservation/{{$reservation->id}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-danger btn-xs" href="reservation/{{$reservation->id}}/delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop



