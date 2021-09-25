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
                <a class="nav-link" aria-current="page" href="#">Users</a>
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
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
          <div class="col-3 h-100 profilebg">
              <div class="profile_text_up">
                <p>YOUR PROFILE</p>
              </div>
              <div class="profile_account">
                <ul>
                    <div class="test1">
                      <a href="#" class="">
                        <img class="photo-profile link-change-image" src="{{asset('images/events') . '/' . Auth::user()->image}}" alt="Card image cap">
                        <div class="test2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-camera-fill sbp" viewBox="0 0 16 16"><path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/></svg>
                        </div>
                      </a>
                    </div>
                  <li>
                    <a href="#" class="">
                    </a>
                  </li>
                  <li>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill svgpswitch" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                      <span class="p_name">Your Name: <span class="changeinfo">{{Auth::user()->name}}</span></span></span>
                    </p>
                  </li>
                  <li>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill svgpswitch" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/></svg>
                      <span class="p_name">Your Email: <span class="changeinfo">{{Auth::user()->email}}</span></span>
                    </p>
                  </li>
                  <li>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-phone-fill svgpswitch" viewBox="0 0 16 16"><path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/></svg>
                      <span class="p_name">Your Phone: <span class="changeinfo">{{Auth::user()->phone}}</span></span></span>
                    </p>
                  </li>
                </ul>
              </div>
              <div class="change-profile-data">
                <span>
                  <a href="{{ route('app') }}">Main Page</a>
                </span>
              </div>
          </div>
          <div class="col-9 bgeditprofile">
              <form action="{{route('edit-form', Auth::user()->id)}}" method="post">
              @csrf
              <ul>
                <li>
                    <input id="profile-name" type="text" class="inchangei" name="profile-name" value="{{ Auth::user()->name }}" required>
                </li>
                <li>
                    <input id="profile-email" type="email" class="inchangei" name="profile-email" value="{{ Auth::user()->email }}" required>
                </li>
                <li>
                    <input id="profile-email" type="phone" class="inchangei" name="profile-phone" value="{{ Auth::user()->phone }}" required>
                </li>
              </ul>
              <button type="submit" class="btn third" name="submit_password">
                  {{ __('Change Data Profile') }}
              </button>
              </form>
            </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
