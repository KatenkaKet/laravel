<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"/>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                        href="{{url('room')}}">Комнаты</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href={{url('room')}}>Все комнаты</a></li>
                            <li><a class="dropdown-item" href={{url('room/create')}}>Добавить комнату</a></li>
                            <li><hr class="dropdown-diviner"></li>
                            <li><a class="dropdown-item" href="#"></a>...</li>
                        </ul>
                    </li>
                    @if(Auth::user())<li class="nav-item"><a class="nav-link" href="{{url('guest/'.Auth::user()->id)}}">Бронь</a></li>@endif
                    <li class="nav-item"><a class="nav-link" href="{{url('corpuses')}}">Корпусы</a></li>
                </ul>
                @if(!Auth::user())
                    <form class="d-flex" method="post" action="{{url('auth')}}">
                        @csrf
                        <input class="form-control me-2" placeholder="E-mail"
                               type="text" name="email" aria-label="E-mail" value="{{old('email')}}">
                        <input class="form-control me-2" placeholder="password"
                               type="password" name="password" aria-label="password" value="{{old('password')}}">
                        <button class="btn btn-outline-success" type="submit">Войти</button>
                    </form>
                @else
                    <ul class="navbar-nav">
                        <a class="nav-link active" href="#"><span/>{{Auth::user()->name}}</a>
                        <a class="btn btn-outline-success my-2 my-sm-0" href={{url('logout')}}>Выйти</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
