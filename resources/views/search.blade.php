@include('header')

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
        
        <div class="row mb-3">
          <h1>Búsqueda: {{ $search_options['q'] }} {{ $search_options['category'] }} {{ $search_options['location'] }}</h1>
          <span class="search_subtitle">{{ $results['total'] }} profesionales encontrados</span>
          <div class="col-items">
            
          {!! $results['results'] !!}
           
          {!! $results['pagination'] !!}

          </div>
        </div>
      </div>
    </main>
    
    @include('footer')