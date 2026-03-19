<?php
function nextInSequence1($sequence) {
    $n = count($sequence);
    $last_number = $sequence[$n - 1];
    $second_last_number = $sequence[$n - 2];
    $difference = $last_number - $second_last_number;
    $next_difference = $difference * 2;
    $next_number = $last_number + $next_difference;
    return $next_number;
}

function nextInSequence2($sequence) {
    $n = count($sequence);
    $last_number = $sequence[$n - 1];
    $second_last_number = $sequence[$n - 2];
    $third_last_number = $sequence[$n - 3];
    
    $diff1 = $last_number - $second_last_number;
    $diff2 = $second_last_number - $third_last_number;
    
    $diff_of_diff1 = $diff1 - $diff2;
    
    $next_diff_of_diff1 = $diff_of_diff1 + 6;
    $next_diff = $diff1 + $next_diff_of_diff1;
    
    $next_number = $last_number + $next_diff;
    return $next_number;
}

$sequence1 = [25, 49, 97];
$sequence2 = [45, 97, 177, 291];

$next_number1 = nextInSequence1($sequence1);
$next_number2 = nextInSequence2($sequence2);

echo "The next number in Sequence 1 is: $next_number1\n"; // 193
echo "The next number in Sequence 2 is: $next_number2\n"; // 445
?>
