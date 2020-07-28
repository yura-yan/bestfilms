<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" >

    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

    <link href="<?php echo base_url(); ?>assets/img/movie.png" rel="shortcut icon" type="image/x-icon" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    

    <div class="container-fluid">
      <div class="row">
       
       <nav role="navigation" class="navbar navbar-inverse">
          <div class="container">

          <div class="navbar-header header">

            <div class="container">
              
              <div class="row">
                
                <div class="col-lg-12">
                  <h1><a href="/">ЛучшиеФильмы</a></h1> 
                  <p>Кино - наша страсть!</p>
                </div>

              </div>

            </div>

            
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
              
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>

            </button>
          

          </div>

          <?php 

          $filmsActive = '';
          $serialsActive = '';

          if ($categoryId == 1) {
            $filmsActive = 'isActive';
            $serialsActive = '';
          } elseif ($categoryId == 2) {
            $filmsActive = '';
            $serialsActive = 'isActive';
          }

           ?>
            
            <div id="navbarCollapse" class="collapse navbar-collapse navbar-right">
              
              <ul class="nav nav-pills">
                <li <?php echo show_active_menu(0); ?>> <a href="/">Главная</a> </li>
                <li <?php echo show_active_menu('films'); echo show_active_meny_byFilmId($filmsActive); ?>> <a href="/movies/type/films/">Фильмы</a> </li>
                <li <?php echo show_active_menu('serials'); echo show_active_meny_byFilmId($serialsActive); ?>> <a href="/movies/type/serials/">Сериалы</a> </li>
                <li <?php echo show_active_menu('ratings'); ?>> <a href="/ratings/view/">Рейтинг фильмов</a> </li>
                <li <?php echo show_active_menu('contacts'); ?>> <a href="/contacts/">Контакты</a> </li>

              </ul>


            </div>

          </div>
       </nav> 

      </div>
    </div>


    <div class="wrapper">
      
      <div class="container">
        
        <div class="row">
          
        <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3"> <!-- Меняем блоки местами col-lg-push-3 -->

          <?php if ($this->uri->segment(1, 0) === 0 || $this->uri->segment(1, 0) === 'search' || $this->uri->segment(1, 0) === 'movies' && $this->uri->segment(2, 0) === 'type'): ?> 

            <form role="search" action="/search/" method="post" class="visible-xs visible-sm">
              <div class="form-group">
                <div class="input-group">
                  <input type="search" name="q_search" class="form-control input-lg" value="<?php echo($value) ?>" placeholder="Ваш запрос">
                  <div class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
                </div>
              </div>
            </form>

          <?php endif ?> 