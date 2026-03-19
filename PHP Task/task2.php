<?php
function isExcludedDay($date) {
    $dayOfWeek = date('N', strtotime($date));
    $dayOfMonth = date('j', strtotime($date));

    if ($dayOfWeek == 7) {
        return true;
    }

    if ($dayOfWeek == 6 && (ceil($dayOfMonth / 7) == 1 || ceil($dayOfMonth / 7) == 3)) {
        return true;
    }

    return false;
}

function calculateDeliveryDate($startDate, $effortDays) {
    $currentDate = strtotime($startDate);
    $daysCounted = 0;

    while ($daysCounted < $effortDays) {
        $currentDate = strtotime("+1 day", $currentDate);

        if (!isExcludedDay(date('Y-m-d', $currentDate))) {
            $daysCounted++;
        }
    }

    return date('d-M-Y', $currentDate);
}

$startDate1 = "29-NOV-2022";
$effortDays1 = 3;
$startDate2 = "01-DEC-2022";
$effortDays2 = 3;

$expectedDeliveryDate1 = calculateDeliveryDate($startDate1, $effortDays1);
$expectedDeliveryDate2 = calculateDeliveryDate($startDate2, $effortDays2);

echo "The expected delivery date for start date $startDate1 is: $expectedDeliveryDate1\n"; // 02-DEC-2022
echo "The expected delivery date for start date $startDate2 is: $expectedDeliveryDate2\n"; // 06-DEC-2022
?>
