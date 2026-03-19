<?php

$row1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
$row2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
$row3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];


$randomNumbers = [];
for ($i = 0; $i < 20; $i++) {
    $randomNumbers[] = rand(0, 36);
}

function countNumbersInRow($randomNumbers, $row) {
    return count(array_intersect($randomNumbers, $row));
}

// Task 1: Identify how many numbers from $randomNumbers are available in $row1, $row2, and $row3
$row1Count = countNumbersInRow($randomNumbers, $row1);
$row2Count = countNumbersInRow($randomNumbers, $row2);
$row3Count = countNumbersInRow($randomNumbers, $row3);

echo "Row 1 has $row1Count numbers.\n";
echo "Row 2 has $row2Count numbers.\n";
echo "Row 3 has $row3Count numbers.\n";

// Task 2: Identify which row has the maximum numbers from $randomNumbers
$maxRow = max($row1Count, $row2Count, $row3Count);
$maxRows = [];

if ($row1Count == $maxRow) {
    $maxRows[] = 1;
}
if ($row2Count == $maxRow) {
    $maxRows[] = 2;
}
if ($row3Count == $maxRow) {
    $maxRows[] = 3;
}

if (count($maxRows) == 1) {
    echo "Row " . $maxRows[0] . " has the maximum numbers.\n";
} else {
    // Task 3: If two rows have the same count, use the last element of $randomNumbers to decide
    $lastElement = end($randomNumbers);
    echo "Multiple rows have the same count. Last element of random numbers is $lastElement.\n";
    
    if (in_array($lastElement, $row1) && in_array(1, $maxRows)) {
        echo "Row 1 is selected.\n";
    } elseif (in_array($lastElement, $row2) && in_array(2, $maxRows)) {
        echo "Row 2 is selected.\n";
    } elseif (in_array($lastElement, $row3) && in_array(3, $maxRows)) {
        echo "Row 3 is selected.\n";
    } else {
        echo "Row " . $maxRows[0] . " is selected.\n";
    }
}

// Task 4: Calculate the weightage of one row (let's assume we are calculating for $row1)
function calculateWeightage($randomNumbers, $row) {
    $numbersInRow = array_intersect($randomNumbers, $row);
    $countValues = array_count_values($numbersInRow);
    $weightage = 0;
    
    foreach ($countValues as $number => $count) {
        if ($count == 1) {
            $weightage += 1;
        } elseif ($count == 2) {
            $weightage += 1.75;
        } elseif ($count == 3) {
            $weightage += 2.25;
        } elseif ($count == 4) {
            $weightage += 2.50;
        } else {
            $weightage += 2.50 + 0.25 * ($count - 4);
        }
    }
    
    return $weightage;
}

$row1Weightage = calculateWeightage($randomNumbers, $row1);
echo "Weightage of Row 1 is $row1Weightage.\n";

?>
