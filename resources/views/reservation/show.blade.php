@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('Reservations ')}}{{$reservation->numberOfReservation}}</h1>
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
                        <th>{{__('date')}}</th>
                        <th>{{__('typeDay')}}</th>
                        <th>{{__('typeRoute')}}</th>
                        <th>{{__('status')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$reservation->numberOfReservation}}</td>
                        <td>{{$reservation->date}}</td>
                        <td>{{$reservation->typeDay}}</td>
                        <td>{{$reservation->typeRoute}}</td>
                        <td>{{$reservation->status}}</td>
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
