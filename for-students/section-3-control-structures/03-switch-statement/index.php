<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "It's the start of the week.";
        break;

    case "Tuesday":
    case "Wednesday":
    case "Thursday":
        echo "It's a weekday.";
        break;

    case "Friday":
        echo "It's finally Friday!";
        break;

    case "Saturday":
    case "Sunday":
        echo "It's the weekend.";
        break;

    default:
        echo "Invalid day.";
}
?>

</body>
</html>