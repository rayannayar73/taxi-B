@extends('template.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire d'insertion d'échéance</h5>
                    <p><?php if(isset($error)) echo $error ?></h4></p>
                </div>
                <form action="{{ route('echeance.valider') }}" method="GET">
                    <div class="card-body">
                        <!-- vehicule -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Numero de vehicule :</label>
                                    <select name="vehicule" class="bg-secondary">
                                        @foreach($vehicule as $oneType)
                                            <option value="{{ $oneType->id }}" >{{ $oneType->numero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin vehicule -->
                        <!-- type -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Type de l'échéance :</label>
                                    <select name="type" class="bg-secondary">
                                        @foreach($liste as $oneType)
                                            <option value="{{ $oneType->id }}" >{{ $oneType->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin type -->
                        <!-- payement -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Montant de payement : </label>
                                    <input type="number" name="montant" class="form-control" placeholder="0 Ar">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>date de payement : </label>
                                    <input type="datetime-local" name="payement" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>date d'expiration : </label>
                                    <input type="datetime-local" name="expiration" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- fin payement -->
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