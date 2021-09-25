<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Мероприятия</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>

      <nav class="navbar navbar-expand-lg navbar-light bgcolor">
        <div class="container-fluid text">
          <a class="navbar-brand" href="{{ route('app') }}">Main Page</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('app') }}">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('users') }}">Users</a>
              </li>
            </ul>
            <div class="d-flex">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                      <img class="_userImage" src="{{asset('images/events') . '/' . Auth::user()->image}}" alt="Card image cap">
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="{{route('profile', Auth::user()->id)}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                    </li>
                @endguest
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <div class="container-fluid _events">
        <div class="row">
          <div class="col-auto">
            <div class="card p-2 mb-4 bgcard" style="width: 18rem;">
                <form class="" action="" method="post">
                  @csrf
                  <?php foreach ($data as $value): ?>
                  <img class="card-img-top img-thumbnail" src="{{asset('images/events') . '/' . $value->image}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{$value->article}}</h5>
                    <p class="card-text">{{ $value->content }}</p>
                    <p><span>Date: </span>{{$value->date}}</p>
                    <p><span>Подписаны: </span>
                      <button type="submit" class="bgcard" name="submit_password">
                          {{ __('Подписаться') }}
                      </button>
                    <?php foreach ($value->events as $test): ?>
                    {{$test->name}}</p>
                    <?php endforeach; ?>
                </form>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
