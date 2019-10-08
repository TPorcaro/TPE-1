<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="{$basehref}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css\css-boostrap-4.3.1\bootstrap.min.css">
            <link rel="stylesheet" href="css\style.css">
            <title>{$titulo}</title>
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
  <a class="navbar-brand" href="">Qevana</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active ">
        <a class="nav-link" href="peliculas">Peliculas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="generos" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Generos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          {foreach $generos as $genero}
            <a class="dropdown-item" href="generos/{$genero->id_genero}"><img class="img-genero" src="{$genero->img}" alt=" "> {$genero->nombre}</a>
          {/foreach}
        </div>
      </li>
    </ul>

     {if $userName} 
        <div class="navbar-nav ml-auto">
            <span class="navbar-text">{$userName}</span>
            <a class="nav-item nav-link" href="logout">LOGOUT</a>
        </div> 
        {else}
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="login">LOGIN</a>
        </div>
        <div class="navbar-nav ">
            <a class="nav-item nav-link" href="register">REGISTRARSE</a>
        </div>
      {/if}
  </div>
</nav>