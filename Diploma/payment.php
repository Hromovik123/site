<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" sizes="32x32" rel="icon" href="icon2.png">
    <title>Payment</title>
    <href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="trystyle.css">
    <?php
        require_once  "functions.php";
        $film_info = getFilmInfo (1);
        
        if (isset($_GET["film"]))
        {
          $film_info = getFilmInfo ($_GET["film"]);
        }
    ?>
</head>
<body>
<form class="credit-card">
<div class="form-header">
    <h4 class="title">Credit card detail</h4>
</div>
<div class="form-body">
<!-- Card Number -->
<input  type="text"class="card-number"placeholder="Card Number">
<!-- Date Field -->
<div class="date-field">
<div class="month">
    <select name="Month">
        <option value="january">January</option>
        <option value="february">February</option>
        <option value="march">March</option>
        <option value="april">April</option>
        <option value="may">May</option>
        <option value="june">June</option>
        <option value="july">July</option>
        <option value="august">August</option>
        <option value="september">September</option>
        <option value="october">October</option>
        <option value="november">November</option>
        <option value="december">December</option>
</select>
</div>
<div class="year">
    <select name="Year">  
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
</select>
</div>
</div>
<!-- Card Verification Field -->
<div class="card-verification">
<div class="cvv-input">
<input type="text"placeholder="CVV">
</div>
<div class="cvv-details">
<p>3 or 4 digits usually found <br> on the signature strip</p>
</div>
</div>
<!-- Button -->
<?php
    echo '<a class="proceed-btn1" href="https://rezka.ag/films/'.$film_info['filmlink'].'">Proceed</a>';
?>
<div class="text-1"><b>Фільм: <?= $film_info['name'] ?> </b></div>
<div class="text-1">Ціна: 100₴</b></div>
</div>
</form>
</body>
</html>