@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Reservations')}}
    <a href="{{route('reservation.create')}}" class="btn btn-primary float-right">
        <i class="fa fa-plus"></i>
        {{__('Nouvelle reservation')}}
    </a>
</h1>
<p>{{ $message ?? '' }}</p>
@stop


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="reservation" class="table table-bordered table-striped datatable">
                    <thead>
                    <tr>
                        <th>{{__('Nombre de la reservation')}}</th>
                        <th>{{__('Nom du conducteur')}}</th>
                        <th>{{__('Statut')}}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($drivers as $driver)
                    @foreach($driver->reservations as $reservation)
                    <tr>
                        <td>{{$reservation->numberOfReservation}}</td>
                        <td>{{$driver->name}}</td>
                        <td>{{$reservation->status->status}}</td>
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

@section('js')
@parent
<script>
    $('.datatable').DataTable({
        language: {
            url: 'https://cdn.datables.net/plug_ins/1.11.3/118n/fr_fr.json'
        }
    });
</script>
@endsection



