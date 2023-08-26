<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('app.index')}}">{{config('app.name')}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
              </li>
              @if(auth()->user())
                @if(auth()->user()->is_admin)              
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Консоль администратора
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('admin.index')}}">Контент</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.design')}}">Дизайн</a></li>
                  </ul>
                </li>
                @endif
              @endif             
            </ul>
            <div class="d-flex mx-4">
              @if(auth()->user())
              <div class="nav-item">
                {{auth()->user()->name}}
              </div>
              <form class="nav-item" action="{{route('user.logout')}}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm mx-4">Выйти</button>
              </form>           
                  
              @else
                <div class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{route('user.page-registration')}}">Регистрация</a>
                </div>
                <div class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{route('user.page-login')}}">Войти</a>
                </div>  
              
              @endif

              
            </div>
          </div>
        </div>
      </nav>
</header>