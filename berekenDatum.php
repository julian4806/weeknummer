<?php
if ($_GET['user_weeknumber'] == '' || $_GET['user_weeknumber_year'] == '') {
    header('Location: index.php');
    exit();
}
$user_weeknumber = $_GET['user_weeknumber'];
$user_weeknumber_year = $_GET['user_weeknumber_year'];

$current_week = date($user_weeknumber, time());

function dutch_format($month)
{
    $months = array(
        "January"   => "januari",
        "February"  => "februari",
        "March" => "maart",
        "April"     => "april",
        "May"       => "mei",
        "June"      => "juni",
        "July"      => "Juli",
        "August"    => "augustus",
        "September" => "september",
        "October"   => "oktober",
        "November"  => "november",
        "December"  => "december"
    );
    return $months[$month];
}

function getStartAndEndDate($y, $w)
{
    return [
        (new DateTime())->setISODate($y, $w)->format('d ') . dutch_format((new DateTime())->setISODate($y, $w)->format('F')), //start date
        (new DateTime())->setISODate($y, $w, 7)->format('d ') . dutch_format((new DateTime())->setISODate($y, $w, 7)->format('F')) //end date
    ];
}
$user_weeknumber_dates = getStartAndEndDate($user_weeknumber_year, $user_weeknumber); // year and weeknumber
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week <?= $user_weeknumber ?>, <?= $user_weeknumber_year ?></title>
</head>

<body>
    <h1>Week <?= $user_weeknumber ?> van het jaar <?= $user_weeknumber_year ?></h1>
    <p>Loopt van maandag <?= $user_weeknumber_dates[0] ?> tot zondag <?= $user_weeknumber_dates[1] ?>.</p>
    <br><br>
    <a href="index.php">ga terug</a>
</body>

</html>