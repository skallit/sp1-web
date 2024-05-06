@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Reservations n°')}}{{$reservation->numberOfReservation}}</h1>
<p>{{ $message ?? '' }}</p>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                    <tr>
                        <th>{{__('Nombre de la reservation')}}</th>
                        <th>{{__('Date')}}</th>
                        <th>{{__('Type Journée')}}</th>
                        <th>{{__('Type Route')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Agence de départ / Department')}}</th>
                        <th>{{__('Agence de retour / Department')}}</th>
                        <th>{{__('Vehicule / Plaque d\'immatriculation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$reservation->numberOfReservation}}</td>
                        <td>{{$reservation->date}}</td>
                        <td>{{$reservation->type_day->type}}</td>
                        <td>{{$reservation->type_route->type}}</td>
                        <td>{{$reservation->status->status}}</td>
                        <td>{{$reservation->departure_agency->city}} / {{$reservation->departure_agency->department}}
                        </td>
                        <td>{{$reservation->return_agency->city ?? 'Il n\'y a pas de vile de retour'}} /
                            {{$reservation->return_agency->department ?? ''}}
                        </td>
                        <td>{{$reservation->vehicle->nameModel}} / {{$reservation->vehicle->licensePlate}}</td>
                        <td><a class="btn btn-danger btn-xs" href="{{$reservation->id}}/delete">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json"></script>
<script>
    $('.datatable').DataTable({
    });
</script>
@endsection
