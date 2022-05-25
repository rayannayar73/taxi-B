@extends('template.app')
@section('content')
    <div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-header">
            <h4 class="card-title">Liste des vehicules disponibles dans le concessionnaire actuellement : </h4>
            <?php  if(session('admin')->admin==true) {?></br>
                <p class="category"> <a href="{{ route('vehicule.form') }}">Ajouter une voiture </a></p>
            <?php } ?>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicule as $one)
                    <tr>
                    <td>
                        {{$one->numero}}
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
