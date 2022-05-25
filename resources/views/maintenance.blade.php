@extends('template.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire d'insertion de maintenance</h5>
                </div>
                <form action="{{ route('maintenance.valider') }}" method="GET">
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
                                    <label>Type de maintenance :</label>
                                    <select name="type" class="bg-secondary">
                                        @foreach($liste as $oneType)
                                            <option value="{{ $oneType->id }}" >{{ $oneType->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin type -->
                        <!-- usage -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>usage : </label>
                                    <input type="number" name="expiration" placeholder="x.xxx Km" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- fin usage -->
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