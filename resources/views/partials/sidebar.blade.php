<div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
        -->
      <div class="sidebar-wrapper" >
        <div class="logo">
          <a href="#" class="simple-text logo-normal">
            Evaluation Stage
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="{{ route('vehicules') }}">
              <i class="tim-icons icon-bus-front-12"></i>
              <p>Vehicule</p>
            </a>
          </li>
          <li>
            <a href="{{ route('trajet.form') }}">
              <i class="tim-icons icon-map-big"></i>
              <p>Trajet</p>
            </a>
          </li>
          <li>
            <a href="{{ route('echeance.form') }}">
              <i class="tim-icons icon-settings"></i>
              <p>Echeances</p>
            </a>
          </li>
        </ul>
      </div>
    </div>