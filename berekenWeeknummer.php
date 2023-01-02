<?php
if ($_GET['user_date'] == '') {
    header('Location: index.php');
    exit();
}
$user_date = $_GET['user_date'];

$date = new DateTime($user_date);
$day_number = $date->format("d");
$day_name = $date->format("l");
$week = $date->format("W");
$month = $date->format("F");
$year = $date->format("Y");

function dutch_month_names($month)
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
function dutch_week_day_names($day)
{
    $days = array(
        "Monday" => "Maandag",
        "Tuesday" => "Dinsdag",
        "Wednesday" => "Woensdag",
        "Thursday" => "Donderdag",
        "Friday" => "Vrijdag",
        "Saturday" => "Zaterdag",
        "Sunday" => "Zondag",
    );
    return $days[$day];
}

function getStartAndEndDate($y, $w)
{
    return [
        (new DateTime())->setISODate($y, $w)->format('d ') . dutch_month_names((new DateTime())->setISODate($y, $w)->format('F')), //start date
        (new DateTime())->setISODate($y, $w, 7)->format('d ') . dutch_month_names((new DateTime())->setISODate($y, $w, 7)->format('F')) //end date
    ];
}
$user_date_dates = getStartAndEndDate($year, $week); // year and weeknumber
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week <?= $user_date ?>, <?= $year ?></title>
</head>

<body>
    <h1><?= dutch_week_day_names($day_name) . " " . $day_number . " " . dutch_month_names($month) . " " . $year ?> valt in week <?= $week ?></h1>
    <p>En loopt van maandag <?= $user_date_dates[0] ?> tot zondag <?= $user_date_dates[1] ?>.</p>
    <br><br>
    <a href="index.php">ga terug</a>
</body>

</html>