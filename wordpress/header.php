<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php wp_head();?>
  <body class="container">
  <!-- header -->
  <header class="header">
    <div class="header__container">
      <h1 class="header__heading">Znajdz swoje anime</h1>
      <form action="" class="form">
        <input type="text" placeholder="Wyszukaj animu" class="form__input" name="search_text" id="search_text"  autocomplete="off" <!--onclick="runTest()"--> 
    
       <!--    //TODO POWIADOMIENIE ajax dziła na clicku   -->
    
        <input type="button" value="szukaj" class="btn form__btn" />
        <div class="results" id="result">

        </div>
      </form>
    </div>

  </header>
  <!-- end header -->
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Moje anime</title>
</head>
<div class="navigation" id="navbar">
<a href="#home"><img class="navigation__logo" src="<?php bloginfo('template_directory');?>/img/logo.png" alt="Moje-anime-logo" /></a>
<nav class="navigation__nav">
  <ul class="navigation__list">
    <li class="navigation__item">
      <a href="#popular" class="navigation__link">Popularne anime</a>
    </li>
    <li class="navigation__item">
      <a href="#news" class="navigation__link">Newsy</a>
    </li>
    <li class="navigation__item">
      <a href="" class="navigation__link">Kategorie</a>
    </li>
    <li class="navigation__item last">
      <a href="#new" class="navigation__link">Nowości</a>
    </li>
  </ul>
  <!-- <button class="register__btn btn">
      Zarejestruj
    </button>
    <button class="login__btn btn">
      Zaloguj
    </button> -->
</nav>
<button class="menu" aria-label="Menu">
  <span class="menu__span"></span>
</button>
</div>