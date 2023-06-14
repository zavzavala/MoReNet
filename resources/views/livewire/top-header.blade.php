<div>
  <header class="navbar navbar-expand-md navbar-light d-print-none fixed-top">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href=".">
          <img src="./back/static/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <!-- Muda cor do tema. -->
        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Escurecer" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
        </a>
        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Luz" data-bs-toggle="tooltip" data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
        </a>
       
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" style="background-image: url({{$autor->picture}})"></span>
            <div class="d-none d-xl-block ps-2">
              <div>{{$autor->name }}</div>
              <div class="mt-1 small text-muted">{{ $autor->username}}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            
            <a href="{{ route('autor.profile') }}" class="dropdown-item">Dados &amp; pessoais</a>
           
            <div class="dropdown-divider"></div>
            @if(auth()->user()->type == 1)
            <a href="{{ route('autor.usuarios') }}" class="dropdown-item">Ver Utilizadores</a>
            @endif
            <a href="{{ route('autor.logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById
            ('logout-form').submit();">Sair</a>
            <form action="{{ route('autor.logout') }}" id="logout-form" method="POST">@csrf</form>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('autor.home') }}">
                <span class="nav-link-title">
                  Página príncipal
                </span>
              </a>
            </li>
            @if(auth()->user()->type == 1)
              <li class="nav-item">
              <a class="nav-link" style="float:right;" href="{{route('autor.commands/db:backup')}}">BackUp Banco</a>
            
              </li>
            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                  <span class="nav-link-title">
                  Utilizadores
                  </span>
                </a>
                <div class="dropdown-menu">
                <a class="nav-link" href="{{ route('autor.usuarios') }}">
                  <span class="nav-link-title">
                  Utilizadores
                  </span>
                </a>
                <a class="nav-link" href="{{ route('autor.Register.offline') }}">
                  <span class="nav-link-title" title="Cadastrar utilizador caso não esteja conectado à internet.">
                    Adiconar utilizador Offline
                  </span>
                </a>
                
                </div>
              </li>
            
            @endif
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                <span class="nav-link-title">
                  Empresas
                </span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('autor.empresa.create')}}">
                  Adicionar
                </a>
                <a class="dropdown-item" href="{{route('autor.empresa.show')}}">
                  Todas Empresas 
                </a>
                <a class="dropdown-item" href="{{route('autor.empresa.TodasEmpresas')}}">
                  CSV & EXCEL
                </a>
                <a class="dropdown-item" href="{{route('autor.services')}}">
                  Servicos
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                <span class="nav-link-title">
                  Facturação
                </span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('autor.facturar')}}">
                Facturar
                </a>  
                <a class="dropdown-item" href="{{route('autor.facturacao.show')}}">
                Ver empresas facturadas
                </a>  
              </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                <span class="nav-link-title">
                  Relatórios
                </span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('autor.pesquisas')}}">
                Facturação
                </a>  
                <a class="dropdown-item" href="{{route('autor.empresas')}}">
                Empresas
                </a> 
                <a class="dropdown-item" href="{{route('autor.geral')}}">
                Geral
                </a> 
              </div>
              
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

   
</div>
