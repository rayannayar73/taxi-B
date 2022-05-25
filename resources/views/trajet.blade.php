@extends('template.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <h4><?php if(isset($error)) echo $error ?></h4>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire au départ :</h5>
                </div>
                <form action="{{ route('trajet.depart') }}" method="GET">
                    <div class="card-body">
                        <!-- vehicule -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Numero du vehicule :</label>
                                    <select name="idVehicule" class="bg-secondary">
                                    <?php if(session('numero')!=null) { ?>
                                        <option value="<?php echo session('idVehicule') ?>" default ><?php echo session('numero') ?></option>
                                    <?php }?>
                                        @foreach($vehicule as $onevehicule)
                                            <option value="{{ $onevehicule->id }}" >{{ $onevehicule->numero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin vehicule -->
                        <!-- motif -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Motif : </label>
                                    <input type="text" name="motif" <?php if(session('motif')!=null) echo "value=".session('motif');  ?> class="form-control" placeholder="livraison">
                                </div>
                            </div>
                        </div>
                        <!-- fin motif -->
                        <!-- Depart -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Date et heure de depart : </label>
                                    <input type="datetime-local" <?php if(session('date')!=null) echo "value=".session('date');  ?> name="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Lieu : </label>
                                    <input type="text" name="lieu" <?php if(session('lieu')!=null) echo "value=".session('lieu');  ?> class="form-control" placeholder="Antanimena">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Kilometrage du véhicule : </label>
                                    <input type="number" name="kilometrage" <?php if(session('kilometrage')!=null) echo "value=".session('kilometrage');  ?> class="form-control" placeholder="xxx.xxx.xxx">
                                </div>
                            </div>
                        </div>
                        <!-- fin Depart -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-secondary">valider</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire à l'arrivé : </h5>
                </div>
                <form action="{{ route('trajet.arriver') }}" method="GET">
                    <div class="card-body">
                        <!-- vehicule -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Numero du vehicule :</label>
                                    <select name="idVehicule" class="bg-secondary">
                                        @foreach($vehicule as $onevehicule)
                                            <option value="{{ $onevehicule->id }}" >{{ $onevehicule->numero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin vehicule -->
                        <!-- arrivé -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Date et heure de d'arrivé : </label>
                                    <input type="datetime-local" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Lieu : </label>
                                    <input type="text" name="lieu" class="form-control" placeholder="Antanimena">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Kilometrage du véhicule : </label>
                                    <input type="number" name="kilometrage" class="form-control" placeholder="xxx.xxx.xxx">
                                </div>
                            </div>
                        </div>
                        <!-- fin arrive -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-secondary">valider</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Formulaire d'insertion de carburant pendant le trajet : </h5>
                </div>
                <form action="{{ route('trajet.carburant') }}" method="GET">
                    <div class="card-body">
                        <!-- vehicule -->
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group">
                                    <label>Numero du vehicule :</label>
                                    <select name="idVehicule" class="bg-secondary">
                                        @foreach($vehicule as $onevehicule)
                                            <option value="{{ $onevehicule->id }}" >{{ $onevehicule->numero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- fin vehicule -->
                        <!-- Carburant -->
                        <div class="row">
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Quantité du Carburant : </label>
                                    <input type="number" name="quantite" class="form-control" placeholder="0 litre">
                                </div>
                            </div>
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label>Prix du Carburant : </label>
                                    <input type="nnumber" name="montant" class="form-control" placeholder="0 Ar">
                                </div>
                            </div>
                        </div>
                        <!-- fin Carburant -->
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