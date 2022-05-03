<div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
        -->
      <div class="sidebar-wrapper" >
        <div class="logo">
          <a href="#" class="simple-text logo-normal">
            Socolait
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="{{ route('achat.liste') }}">
              <i class="tim-icons icon-bag-16"></i>
              <p>Achat</p>
            </a>
          </li>
          <li>
            <a href="{{ route('matieres') }}">
              <i class="tim-icons icon-coins"></i>
              <p>Stock matières 1ere</p>
            </a>
          </li>
          <li>
            <a href="{{ route('courses') }}">
              <i class="tim-icons icon-cart"></i>
              <p>Courses</p>
            </a>
          </li>
          <li>
            <a href="{{ route('fabrication') }}">
              <i class="tim-icons icon-molecule-40"></i>
              <p>Fabrication</p>
            </a>
          </li>
          
          <li>
            <a href="{{ route('produits') }}">
              <i class="tim-icons icon-coins"></i>
              <p>Stock produits Finis</p>
            </a>
          </li>
        </ul>
      </div>
    </div>