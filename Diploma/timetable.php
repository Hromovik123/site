<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">  
<meta name="description" content="text/html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="image/png" sizes="32x32" rel="icon" href="icon1.png">
    <title>Timetable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&display=swap" rel="stylesheet">
</head>
<body link="#00008b"; scroll="no"; vlink="#dc143c">
<?php
  require_once  "functions.php";
  $films_info = getAllFilms();
  if (isset($_GET)){
    $genre = $_GET["genre"];
    $year = $_GET["year"];
    $country = $_GET["country"];
    $films_info = getAllFilms($genre, $year, $country);
  }
  $years = ["усі", "2022", "2021", "2019", "2018", "2016", "2014"];
?>
<header>
<nav>
<ul class="topmenu">
        <li><a href="index.php">Головна</a></li>
        <li><a href="timetable.php">Каталог</a></li>
        <li><a href="films.php">Скоро</a></li>
        <li><a href="about.php">Про нас</a></li>
        <?php
            if($_COOKIE['user'] == ''):
        ?>
        <li><a href="login.php">Вхід</a>
        <?php else:?>
        <li><a href="index.php"><?=$_COOKIE['user']?></a>
        <li><a href="exit.php">Вихід</a>
        <?php endif;?>
        <li id="BT">
<!--Search-->
    <div class="container-out">
      <div class="container-in">
        <div class="search-container">
          <div class="search-engine">
            <input
              type="input"
              id="search-input"
              autocomplete="off"
              placeholder="Пошук"
            />
          </div>
          <div id="search-results"></div>
          <div id="search-data"></div>
        </div>
      </div>
    </div>  
          
            </li>
        
    </ul>
</nav>
</header>
<hr>
<div class="soon"><b>Каталог фільмів</b></div>
<hr>
<form method="get">
<div class="checkboxdiv">
<div class="filter-title">
<img class="settings-img" src="settings.png" height="18px" widht="18px" alt="settings img">фільтри
</div><hr>
<div class="filter-section">

<span class="j_title">жанри:</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="екшн" <?=($genre != null && in_array("екшн", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    екшн
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="наукова фантастика" <?=($genre != null && in_array("наукова фантастика", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    наукова фантанстика
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="українське" <?=($genre != null && in_array("українське", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    українське
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="пригоди" <?=($genre != null && in_array("пригоди", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    пригоди
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="бойовик" <?=($genre != null && in_array("бойовик", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    бойовик
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="драма" <?=($genre != null && in_array("драма", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    драма
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="genre[]" value="кримінал" <?=($genre != null && in_array("кримінал", $genre)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    кримінал
  </label>
</span><br>

<span class="bigcheck">
    <label class="bigcheck-label">
      <input type="checkbox" class="bigcheck" name="genre[]" value="фантастика" <?=($genre != null && in_array("фантастика", $genre)) ? "checked" : "" ?>/>
      <span class="bigcheck-target"></span>
      фантастика
    </label>
  </span><br>

  <span class="bigcheck">
    <label class="bigcheck-label">
      <input type="checkbox" class="bigcheck" name="genre[]" value="комедія" <?=($genre != null && in_array("комедія", $genre)) ? "checked" : "" ?>/>
      <span class="bigcheck-target"></span>
      комедія
    </label>
  </span><br>

  <span class="bigcheck">
    <label class="bigcheck-label">
      <input type="checkbox" class="bigcheck" name="genre[]" value="трилер" <?=($genre != null && in_array("трилер", $genre)) ? "checked" : "" ?>/>
      <span class="bigcheck-target"></span>
      трилер
    </label>
  </span><br>
</div><hr>

<div class="filter-section">
  <span class="j_title">рік:</span><br>
  <select class="src" name="year">
<?php
  foreach ($years as $option_year){
    $option_status = $year == $option_year ? "selected" : "";
    echo "<option ".$option_status.">".$option_year."</option>";
  }
?>
</select><br>
</div><hr>

<div class="filter-section">
<span class="j_title">країна:</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="country[]" value="США" <?=($country != null && in_array("США", $country)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    США
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="country[]" value="Канада" <?=($country != null && in_array("Канада", $country)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    Канада
  </label>
</span><br>

<span class="bigcheck">
  <label class="bigcheck-label">
    <input type="checkbox" class="bigcheck" name="country[]" value="Україна" <?=($country != null && in_array("Україна", $country)) ? "checked" : "" ?>/>
    <span class="bigcheck-target"></span>
    Україна
  </label>
</span><br>
</div><hr>
<button class="src-button">пошук</button>
</div>

<div class="post-wrap">
    <?php
    foreach($films_info as $film_info){
        echo '
        <div class="post-item">
            <div class="post-item-wrap">
                <a href="http://diploma/film.php?film='.$film_info['id'].'" class="post-link">
                    <div class="image-wrapper">
                        <img src="images/'.$film_info['main_img'].'" alt="first film img">
                    </div>
                    <div class="text-wrapper">
                        <div class="trailer"><b>Дивитись трейлер</b></div><br><br><br>
                        <div class="post-cat"><b>'.$film_info['name'].'</b></div>
                        <h3 class="post-title">
                            <b>Жанр:</b> '.$film_info['genre'].'<br><br>
                            <b>Режисер:</b> '.$film_info['director'].'<br><br>
                            <b>Тривалість:</b> '.$film_info['duration'].'<br><br><br></h3>
                    </div>
                    <div class="overlay"></div>
                </a>
            </div>
        </div>';
    }
?>
</div>
</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script type="text/javascript" src="database.js"></script>
<script type="text/javascript" src="search.js"></script> 
   
</body> 
</html>