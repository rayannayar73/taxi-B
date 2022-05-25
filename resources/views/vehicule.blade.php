@extends('template.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire d'ajout de vehicules</h5>
                </div>
                <form action="{{ route('vehicule.valider') }}" method="GET">
                    <div class="card-body">
                        <!-- numero -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Numero : </label>
                                    <input type="text" name="numero" class="form-control" placeholder="XXXX WWT">
                                </div>
                            </div>
                        </div>
                        <!-- fin numero -->
                        <!-- type -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Type de vehicule :</label>
                                    <select name="type" class="bg-secondary">
                                        @foreach($type as $oneType)
                                            <option value="{{ $oneType->id }}" >{{ $oneType->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin type -->
                        <!-- marque -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Marque de vehicule :</label>
                                    <select name="marque" class="bg-secondary">
                                        @foreach($marque as $onemarque)
                                            <option value="{{ $onemarque->id }}" >{{ $onemarque->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin marque -->
                        <!-- Modèle -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Modèle du vehicule : </label>
                                    <input type="text" name="modele" class="form-control" placeholder="x6">
                                </div>
                            </div>
                        </div>
                        <!-- fin Modèle -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-secondary">valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection