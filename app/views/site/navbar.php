
<div?php 
  if(session_status() == PHP_SESSION_NONE){
    session_start();
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>V8 - Navbar</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/public/css/navbar.css" />
  </head>
  <body>
    <nav id="NAV">
      <div class="logo">
        <a href="/"> <img src="/public/assets/logo1.png" alt="" /></a>
        <ul class="ul-nav">
          <li>
            <a href="/" class="footer-link"> <i class="fa-solid fa-house"></i></a>
          </li>
          <li>
            <a href="/posts" class="footer-link"> <i class="fa-solid fa-list"></i></a>
          </li>
          <li>
            <form    class="footer-link" id="form-nav" action="/posts/search" method="get"> 
              <input type="text" placeholder="Digite sua Pesquisa" name="busca" autocomplete="off">
            <i class="fa-solid fa-magnifying-glass" onclick="pesquisa()"></i>
          
            </form>
          </li>
        </ul>
        
      </div>
      <div class="logo">
        <a class="a-nav" id="login" href="/login">
          <?php

              if(isset($_SESSION['logado'])){
                echo "Dashboard";
              } else {
                echo "Log-in";
              }
          ?>

        </a>
      </div>
     
    </nav>
  </body>

  <script src="/public/js/navbar.js"></script>
</html>
