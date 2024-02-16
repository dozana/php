<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>createFromFormat()</h1>

<?php

$format = "d/m/Y H:i:s";
$strDateTime = date($format);
$dateTimeObj = DateTime::createFromFormat($format, $strDateTime);

if ($dateTimeObj !== false) {
    $result = [
        'tm_sec' => $dateTimeObj->format('s'),
        'tm_min' => $dateTimeObj->format('i'),
        'tm_hour' => $dateTimeObj->format('H'),
        'tm_mday' => $dateTimeObj->format('d'),
        'tm_mon' => $dateTimeObj->format('n') - 1, // Month in strptime is 0-indexed
        'tm_year' => $dateTimeObj->format('Y') - 1900, // Year in strptime is relative to 1900
        'tm_wday' => $dateTimeObj->format('w'),
        'tm_yday' => $dateTimeObj->format('z'),
        'unparsed' => '',
    ];

    print_r($result);
} else {
    echo "Failed to parse date.";
}
?>


</body>
</html>