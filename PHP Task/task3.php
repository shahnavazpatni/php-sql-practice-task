<?php
function valueExistsInArray($array, $value, $key) {

    $column = array_column($array, $key);

    return in_array($value, $column);
}

$array = [
    ['id' => 5, 'language' => 'PHP'],
    ['id' => 6, 'language' => 'JAVA'],
    ['id' => 7, 'language' => 'PYTHON']
];

$value1 = 'JAVA';
$key1 = 'language';

$value2 = 'DELPHY';
$key2 = 'language';

$result1 = valueExistsInArray($array, $value1, $key1); // true
$result2 = valueExistsInArray($array, $value2, $key2); // false

echo "If '$value1' exists for key '$key1': " . ($result1 ? 'true' : 'false') . "\n";
echo "If '$value2' exists for key '$key2': " . ($result2 ? 'true' : 'false') . "\n";
?>
