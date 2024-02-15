<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h1>Jump Menu</h1>

<form id="jumpForm">
    <label for="jumpMenu">Select a destination:</label>
    <select id="jumpMenu" name="jumpMenu">
        <?php
        // Define the options for the jump menu
        $destinations = array(
            "Google" => "https://www.google.com",
            "Yahoo" => "https://www.yahoo.com",
            "Bing" => "https://www.bing.com"
        );

        // Generate options for the jump menu dynamically
        foreach ($destinations as $name => $url) {
            echo "<option value=\"$url\">$name</option>";
        }
        ?>
    </select>
    <button type="button" onclick="jumpToSelected()">Go</button>
</form>

<script>
function jumpToSelected() {
    // Get the selected URL from the jump menu
    var jumpMenu = document.getElementById("jumpMenu");
    var selectedUrl = jumpMenu.options[jumpMenu.selectedIndex].value;

    // Redirect to the selected URL
    window.location.href = selectedUrl;
}
</script>

</body>
</html>