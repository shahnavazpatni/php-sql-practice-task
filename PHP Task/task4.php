<?php
function getYearCycleDates($inputDate) {

    $date = DateTime::createFromFormat('d-m-Y', $inputDate);


    $year = $date->format('Y');
    $month = $date->format('m');


    if ($month < 10) {
        $startYear = $year - 1;
        $endYear = $year;
    } else {
        $startYear = $year;
        $endYear = $year + 1;
    }

    $startDate = DateTime::createFromFormat('d-m-Y', "01-10-$startYear");
    $endDate = DateTime::createFromFormat('d-m-Y', "30-09-$endYear");

    return [$startDate, $endDate];
}

function getSecondAndFourthSaturdays($startDate, $endDate) {
    $saturdays = [];


    $currentDate = clone $startDate;
    while ($currentDate <= $endDate) {

        $currentMonth = $currentDate->format('m');
        $currentYear = $currentDate->format('Y');

        $firstSaturday = new DateTime("first saturday of $currentYear-$currentMonth");

        $secondSaturday = clone $firstSaturday;
        $secondSaturday->modify('+1 week');
        $fourthSaturday = clone $secondSaturday;
        $fourthSaturday->modify('+2 weeks');

        if ($secondSaturday >= $startDate && $secondSaturday <= $endDate) {
            $saturdays[] = $secondSaturday->format('d-M-Y');
        }
        if ($fourthSaturday >= $startDate && $fourthSaturday <= $endDate) {
            $saturdays[] = $fourthSaturday->format('d-M-Y');
        }

        // Move to the next month
        $currentDate->modify('first day of next month');
    }

    return $saturdays;
}

function getCycleSaturdays($inputDate) {
    list($startDate, $endDate) = getYearCycleDates($inputDate);
    return getSecondAndFourthSaturdays($startDate, $endDate);
}


$inputDate = "10-01-2023";
$saturdays = getCycleSaturdays($inputDate);

list($startDate, $endDate) = getYearCycleDates($inputDate);

echo "Second and fourth Saturdays between 01-October-" . $startDate->format('Y') . " and 30-September-" . $endDate->format('Y') . ":\n";
foreach ($saturdays as $saturday) {
    echo $saturday . "\n";
}
?>
