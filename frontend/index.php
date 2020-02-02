<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap&subset=latin-ext"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave&display=swap&subset=latin-ext" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/base.css" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Moje anime</title>
</head>

<body class="container">
  <?php 
  include 'components/navigation.php';
  ?>
  <!-- header -->
  <header class="header" id="header">
    <div class="header__container">
      <h1 class="header__heading">Znajdz swoje anime</h1>
      <form action="" class="form">
        <input type="text" placeholder="Wyszukaj animu" class="form__input" name="search_text" id="search_text"  autocomplete="off" >
    
       <!--    //TODO POWIADOMIENIE ajax dziła na clicku   -->
    
        <input type="button" value="szukaj" class="btn form__btn" />
        <div class="results" id="result">

        </div>
      </form>
    </div>

  </header>
  <!-- end header -->

  <!-- main  -->
  <main class="main">
  <!-- popular slider -->
    <?php include "home/popular-slider.php" ?>
    <!-- news (banner) -->
    <?php include "home/news-banner.php" ?>

    <?php include "home/new-slider.php" ?>

  </main>
  <!-- reklama-->
  <aside class="advertisement advertisement__left">
      <div class="advertisment__one">
        <img
          class="advertisement__img"
          src="img/example_ad.jpg"
          alt="advertisement"
        />
      </div>
      <div class="advertisment__two">
        <img
          class="advertisement__img"
          src="img/example_ad.jpg"
          alt="advertisement"
        />
      </div>
    </aside> -->
  <!-- koniec reklamy-->

  <!-- reklama-->
<aside class="advertisement advertisement__right">
      <div class="advertisment__one">
        <img
          class="advertisement__img"
          src="img/example_ad.jpg"
          alt="advertisement"
        />
      </div>
      <div class="advertisment__two">
        <img
          class="advertisement__img"
          src="img/example_ad.jpg"
          alt="advertisement"
        />
      </div>
    </aside>
  <!-- koniec reklamy -->
 <?php include "components/footer.php"?>

  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0/dist/smooth-scroll.polyfills.min.js"></script>

  
  <script src="js/main.js"></script>
</body>

</html>