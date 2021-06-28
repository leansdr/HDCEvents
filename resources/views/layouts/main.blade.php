<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonte do Google -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

  <!-- CSS Boostrap    -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <!-- CSS da aplicação -->
  <link rel="stylesheet" href="/css/styles.css">
  <script src="/js/scripts.js"></script>

</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse" id="navbar">
      <a href="/" class="navbar-brand">
        <img src="/img/hdcevents_logo.svg" alt="Logo">
      </a>
      <ul class="navbar-nav text-white">
        <li class="nav-item">
          <a href="/" class="nav-link">Eventos</a>
        </li>
        <li class="nav-item">
          <a href="/events/create" class="nav-link">Criar Eventos</a>
        </li>
        @auth
        <li class="nav-item">
          <a href="/dashboard" class="nav-link">Meus eventos</a>
        </li>
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <a href="/logout" class="nav-link" onclick="event.preventDefault();
            this.closest('form').submit();">Sair</a>
          </form>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a href="/login" class="nav-link">Entrar</a>
        </li>
        <li class="nav-item">
          <a href="/register" class="nav-link">Cadastrar</a>
        </li>
        @endguest
      </ul>
    </div>
  </nav>
</header>

<body>
  <main class="container-fluid">
    <div class="row">
      @if(session('msg'))
      <p class="msg">{{session('msg')}}</p>
      @endif
      @yield('content')
    </div>
  </main>
  <footer>
    <p>HDC Events &copy; 2021</p>
  </footer>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <!--<script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>-->
</body>

</html>