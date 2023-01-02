<?php
include('weeknummer.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Weeknummer</title>
</head>

<body>
    <h1>Het is nu week <span><?= $current_week ?></h1>
    <p>Deze loopt van maandag <?= $dates[0] ?> tot zondag <?= $dates[1] ?>.</p>
    <hr>
    <form action="berekenWeeknummer.php">
        <span>Vul hier een <b>datum</b> in en wij geven het weeknummer terug!</span><br>
        <input type="date" name="user_date"><br>
        <button>geef terug!</button><br>
    </form>
    <hr>
    <form action="berekenDatum.php">
        <span>Vul hier een <b>weeknummer</b> in en wij geven de datum terug!</span><br>
        <input type="number" name="user_weeknumber" placeholder="weeknummer"><br>
        <input type="number" name="user_weeknumber_year" placeholder="jaar" value="<?= date("Y", time()) ?>"><br>
        <button>geef terug!</button><br>
    </form>
</body>

</html>