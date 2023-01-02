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