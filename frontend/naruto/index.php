<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap&subset=latin-ext"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave&display=swap&subset=latin-ext" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css" />
  
  <link rel="stylesheet" href="../css/base.css" />
  <title>Document</title>
</head>

<body class="container--anime">
  <?php 
  include '../components/navigation.php';
  ?>
  <header class="header--anime">
    <h1 class="header--anime__heading">
      Naruto
    </h1>
  </header>
  <main class="anime">
    <section class="anime__season">
      <h2 class="anime__heading">Sezon 1</h2>
      <div class="anime__container">
<?php
include "../components/slider.php"
?>
      </div>

    </section>
    <section class="anime__season">
      <h2 class="anime__heading">Sezon 2</h2>
      <div class="anime__container">
      <?php
include "../components/slider.php"
?>
      </div>
    </section>
    <section class="anime__season">
      <h2 class="anime__heading">Sezon 3</h2>
      <div class="anime__container">
      <?php
include "../components/slider.php"
?>
      </div>
    </section>
    <section class="anime__season">
      <h2 class="anime__heading">Sezon 4</h2>
      <div class="anime__container">
      <?php
include "../components/slider.php"
?>
      </div>
    </section>

  </main>

   <?php 
include "../components/footer.php"
?> 
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0/dist/smooth-scroll.polyfills.min.js"></script>

  <!-- <script src="../js/main.js"></script> -->
  <script src="../js/nav.js"></script>
</body>

</html>