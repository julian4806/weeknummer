<?php
// $current_week = date("W", 1672044004); // week 52
$current_week = (int)date("W", time());

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
        (int)(new DateTime())->setISODate($y, $w)->format('d') . " " . dutch_format((new DateTime())->setISODate($y, $w)->format('F')), //start date
        (int)(new DateTime())->setISODate($y, $w, 7)->format('d') . " " . dutch_format((new DateTime())->setISODate($y, $w, 7)->format('F')) //end date
    ];
}
$dates = getStartAndEndDate(date("Y"), $current_week); // year and weeknumber
