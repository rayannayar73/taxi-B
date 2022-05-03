@extends('template.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire pour la transformation des matières premières en produit fini</h5>
                </div>
                <form action="{{ route('fabrication.valider') }}" method="GET">
                    <div class="card-body">
                        <!-- nom -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Nom du produit :</label>
                                    <select name="id" class="bg-secondary">
                                        @foreach($liste as $produit)
                                            <option value="{{ $produit->id }}" >{{ $produit->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin nom -->
                        <!-- Quantité -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Quantité (g-mL) : </label>
                                    <input type="number" name="quantite" class="form-control" placeholder="10">
                                </div>
                            </div>
                        </div>
                        <!-- fin Quantité -->
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