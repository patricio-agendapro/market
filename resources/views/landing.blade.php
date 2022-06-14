@include('header', ['status' => 'complete'])

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
        
        <div class="row mb-3">
          <h1>{{$meta['title']}}</h1>
          <span class="search_subtitle">{{ $results['total'] }} profesionales encontrados</span>
          <div class="col-items">
            
          {!! $results['results'] !!}
           
          {!! $results['pagination'] !!}

          </div>
          <!---<div class="col-map"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>--->
        </div>
        <!---<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Market</a></li>
            <li class="breadcrumb-item"><a href="#">Barberías</a></li>
            <li class="breadcrumb-item"><a href="#">Corte degradado</a></li>
            <li class="breadcrumb-item active" aria-current="page">Santiago</li>
          </ol>
        </nav>--->
      </div>
      <!--<div class="links_content">
        <div class="container">
          <ul>
            <li><a href="#">Corte de Cabello & Barba</a></li>
            <li><a href="#">Corte de Cabello Varón</a></li>
            <li><a href="#">Corte de cabello para niños</a></li>
            <li><a href="#">Corte de cabello Skin Fade</a></li>
            <li><a href="#">Lavado y Peinado</a></li>
            <li><a href="#">Corte de cabello Razor</a></li>
            <li><a href="#">Afeitado de Barba al Raz</a></li>
            <li><a href="#">Afeitado de Barba al Raz con Vapor</a></li>
            <li><a href="#">Perfilado y arreglo de Barba</a></li>
            <li><a href="#">Tratamiento Black Mask</a></li>
            <li><a href="#">Perfilado de Cejas</a></li>
          </ul>
        </div>
      </div>-->
    </main>
    
    @include('footer', ['status' => 'complete'])