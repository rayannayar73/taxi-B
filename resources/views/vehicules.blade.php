@extends('template.app')
@section('content')
    <div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-header">
            <h4 class="card-title">Liste des vehicules dans le concessionnaire actuellement : </h4>
            <p class="category"> 
                <?php  if(session('admin')->admin==true) {?></br>
                <a class="text-secondary" href="{{ route('vehicule.form') }}"><i class="tim-icons icon-simple-add"></i> ajouter des véhicules</a>
                </br>
                <?php } ?>
                </br>
                <a class="text-secondary" href="{{ route('vehicule.disponibles') }}"><i class="tim-icons icon-bullet-list-67"></i> Liste des voitures disponibles</a>
            </p>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter ">
                <thead class=" text-primary">
                    <tr>
                    <th>
                        numero
                    </th>
                    <th class="text-left">
                        modèle
                    </th>
                    <th>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicule as $one)
                    <tr>
                    <td>
                        <a class="text-secondary" href="{{ 'vehicule/fiche/'.$one->numero }}">{{$one->numero}}</a>
                    </td>
                    <td class="text-left">
                        {{$one->type." | ".$one->marque." ". $one->modele}}
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
