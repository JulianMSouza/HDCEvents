<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!--Fonte do Google  -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!--CSS do Bootstrap  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--CSS da aplicacao -->
       <link rel="stylesheet" href="/css/styles.css">
       <script src="/js/scripts.js"></script>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                <img src="/img/logotipo.jpg" alt="HDC Events">
                </a>
                <ul class="navbar nav">
                    <li class="navitem">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="navitem">
                        <a href="/events/create" class="nav-link">Criar eventos</a>
                    </li>
                    <li class="navitem">
                        <a href="/" class="nav-link">Entrar</a>
                    </li>
                    <li class="navitem">
                        <a href="/" class="nav- link">Cadastrar</a>
                    </li>
                </ul>
                


            </div>
        </nav>
    </header>
    @yield('content')
       <footer>
           <p>HDC Events &copy; 2020</p>
       </footer>
       <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
