@extends('template.app')
@section('content')
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card  card-plain">
              <div class="card-header">
                <h4 class="card-title">Etat de stock de matière première</h4>
                <p class="category"> Voici la liste des matière en stock à la date d'aujourd'hui :</p>
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
                          seuil
                        </th>
                        <th class="text-left">
                          restant
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
                          {{$stock->seuil ." ". $stock->unite}}
                        </td>
                        <td class="text-left">
                          {{$stock->restant." ". $stock->unite}}
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
