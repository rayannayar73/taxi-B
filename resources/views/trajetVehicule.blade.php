@extends('template.app')
@section('content')
    <div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-header">
            <h4 class="card-title">Liste des trajets effectués par la voiture numero : {{ $vehicule[0]->numero}} </h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter ">
                <thead class=" text-primary">
                    <tr>
                    <th>
                        utilisateur
                    </th>
                    <th >
                        vehicule
                    </th>
                    <th>
                        motif
                    </th>
                    <th>
                        lieu
                    </th>
                    <th>
                        date
                    </th>
                    <th>
                        distance
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicule as $one)
                    <tr>
                    <td>
                        {{$one->nom}}
                    </td>
                    <td >
                        {{$one->numero." ".$one->type." | ".$one->marque." ". $one->modele}}
                    </td>
                    <td>
                        {{$one->motif}}
                    </td>
                    <td>
                        {{$one->lieudepart." - ".$one->lieuarrive}}
                    </td>
                    <td>
                        {{$one->datedepart." - ".$one->datearrive}}
                    </td>
                    <td>
                        {{$one->distance." Km "}}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
