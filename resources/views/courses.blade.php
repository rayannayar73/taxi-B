@extends('template.app')
@section('content')
    <div class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-header">
            <h4 class="card-title">Liste des matières premières en rupture de stock</h4>
            <p class="category"> Voici la liste des ingrédients qu'il faut acheter :</p>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter ">
                <thead class=" text-primary">
                    <tr>
                    <th>
                        nom
                    </th>
                    <th class="text-left">
                        Quantité à acheter
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liste as $stock)
                    <tr>
                    <td>
                        {{$stock->nom}}
                    </td>
                    <td class="text-left">
                        {{$stock->reste." ". $stock->unite}}
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
