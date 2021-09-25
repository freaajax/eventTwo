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

      <div class="container-fluid">
        <div class="row">
          <div class="col-12 p-3 bgeditprofile bgswq">
            <form class="" action="{{ route('choose') }}" method="get">
              <span class="custom-dropdown big">
              <select class="turnintodropdown" name="event_admin">
                <?php foreach ($event as $events): ?>
                <option value="{{$events->id}}">{{$events->article}}</option>
                <?php endforeach; ?>
              </select>
            </span>
              <span class="custom-dropdown big">
              <select class="turnintodropdown" name="user_admin">
                <?php foreach ($user as $users): ?>
                <option value="{{$users->id}}">{{$users->name}}</option>
                <?php endforeach; ?>
              </select>
              </span>
              <button type="submit" class="btn third" name="bth_ch">
                  {{ __('Choose') }}
              </button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-12 bgeditprofileos">
              <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
              @csrf
              <ul>
                <li>
                  <label for="title">Title:</label>
                    <input id="title" type="text" class="inchangei" name="title" value="" required>
                </li>
                <li>
                  <label for="content">Content:</label>
                    <input id="content" type="text" class="inchangei" name="content" value="" required>
                </li>
                <li>
                  <label for="date">date:</label>
                    <input id="date" type="date" class="inchangei" name="date" value="" required>
                </li>
                <li>
                  <label for="tags">tags:</label>
                    <input id="tags" type="text" class="inchangei" name="tags" value="" required>
                </li>
                <li>
                  <label for="image">Image:</label>
                    <input id="image" type="file" class="inchangei" name="image" value="" required>
                </li>
              </ul>
              <button type="submit" class="btn third" name="submit_password">
                  {{ __('Add Event') }}
              </button>
              </form>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
