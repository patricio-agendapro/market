<!doctype html>
  <html lang="es-CL" class="h-100">
  <head>

    <meta charset="utf-8">
    <title>{{$meta['title']}} - Agendapro {{$country->name}}</title>
    <meta http-equiv="content-language" content="es-CL"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$meta['description']}}">
    <meta name="robots" content="{{$meta['robots']}}"/>
    <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}">
    
    <link rel="preload" href="{{asset('/fonts/roboto.woff2')}}" as="font" crossorigin="anonymous" />

    <link rel="canonical" href="">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" rel="preload" as="style">

  </head>

  <body class="d-flex flex-column h-100 {{$meta['bodyclass']}}">
    <div id="mobile_apps">
      <div id="mobile_menu">
        <a href="{{url('/')}}"><img width="160" height="auto" src="{{asset('/images/logo.png')}}" alt="Logo AgendaPro"></a>

        <p class="login_button" style="margin-top: 40px;">
          <a href="https://app.agendapro.com/sign_in">Login</a>
        </p>
        <p>
          <a class="btn btn-primary" href="https://app.agendapro.com/sign_up">Agrega tu empresa</a>
        </p>
 
      </div>
      <div id="mobile_search" class="navbar">
        <form action="{{url('/')}}/{{$country->id}}/market/search" method="GET">
          <input type="text" name="q" class="query" value="{{$search_options['q']}}" placeholder="Servicios o Profesionales">
          <input type="text" name="location" class="location" value="{{$search_options['location']}}" placeholder="Ciudad o Localidad">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
      </div>
      
    </div>
    <header>
      <nav class="navbar navbar-expand-md">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><img width="160" height="auto" src="{{asset('/images/logo.png')}}" alt="Logo AgendaPro"></a>

          <div id="mobile_icons">
            
            <div class="btn-group navflags">
              <button class="btn btn-link btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="country_flag" src="https://agendapro.com/wp-content/uploads/flags/{{$country->id}}-bandera.png" alt="">
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/cl/search"><img class="country_flag" src="https://agendapro.com/wp-content/uploads/flags/cl-bandera.png" alt=""> Chile</a></li>
                <li><a class="dropdown-item" href="/mx/search"><img class="country_flag" src="https://agendapro.com/wp-content/uploads/flags/mx-bandera.png" alt=""> México</a></li>
              </ul>
            </div>


            <button class="navbar-toggler" type="button" onclick="toggle_search()">
              <span>
              <svg  style="margin-top: 5px;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 20 20" fill="currentColor" class="bi bi-search" >
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" fill="rgb(75, 197, 136)">
                </svg>
              </span>
            </button>

            <button class="navbar-toggler" type="button" onclick="toggle_menu()">
              <span>
                <svg width="32" height="32" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M16.159 6.72H3.839c-.64 0-1.12-.52-1.12-1.12 0-.6.52-1.12 1.12-1.12h12.28c.64 0 1.12.52 1.12 1.12 0 .6-.48 1.12-1.08 1.12zM16.159 11.08H3.839c-.64 0-1.12-.52-1.12-1.12 0-.6.52-1.16 1.12-1.16h12.28c.64 0 1.12.52 1.12 1.12 0 .6-.48 1.16-1.08 1.16zM16.161 15.56h-6.76c-.64 0-1.12-.52-1.12-1.12 0-.6.52-1.12 1.12-1.12h6.76c.64 0 1.12.52 1.12 1.12 0 .6-.52 1.12-1.12 1.12z" fill="rgb(75, 197, 136)"></path></svg>
              </span>
            </button>
          </div>
          
          <span class="nav nav-search col-12 col-md-auto mb-2 justify-content-center mb-md-0 d-none d-md-block">
            <form action="{{url('/')}}/{{$country->id}}/market/search" method="GET">
              <div class="wrapper">
                <div class="search-container">
                  <input type="text" name="q" class="query" value="{{$search_options['q']}}" placeholder="Servicios o Profesionales">
                  <input type="text" name="location" class="location" value="{{$search_options['location']}}" placeholder="Ciudad o Localidad">
                  <button type="submit" class="button">
                    <i class="svg-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                    </i>
                  </button>
                </div>
              </div>
            </form>
          </span>
     
          <div id="desktop_menu">


            <ul class="navbar-nav mb-2 mb-md-0 text-end">
              <li>
                <div class="btn-group navflags">
                  <button class="btn btn-link btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="country_flag" src="https://agendapro.com/wp-content/uploads/flags/{{$country->id}}-bandera.png" alt="">
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/cl/market/search"><img class="country_flag" src="https://agendapro.com/wp-content/uploads/flags/cl-bandera.png" alt=""> Chile</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item login_button">
                <a class="nav-link" href="https://app.agendapro.com/sign_in">Login</a>
              </li>
              <li class="nav-item register_button">
                <a class="nav-link" href="https://app.agendapro.com/sign_up">Agrega tu empresa</a>
              </li>
            </ul>
          </div>  

        </div>
      </nav>
    </header>