<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Time now</h1>

<?php
  function DateGeorgia($strDate) {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth = date("n",strtotime($strDate));
    $strDay = date("j",strtotime($strDate));
    $strHour = date("H",strtotime($strDate));
    $strMinute = date("i",strtotime($strDate));
    $strSeconds = date("s",strtotime($strDate));

    $strMonthCut = [
      "","Jan.","Feb.","Mar","Apr.","May","June", "July","Aug.","September","Oct.","Nov.","Dec."
    ];

    $strMonthGeorgia = $strMonthCut[$strMonth];

    return "$strDay $strMonthGeorgia $strYear, $strHour:$strMinute";
  }

  $strDate = "2024-02-10 13:42:44";
  echo "Georgia Time now : " . DateGeorgia($strDate);
?>

</body>
</html>