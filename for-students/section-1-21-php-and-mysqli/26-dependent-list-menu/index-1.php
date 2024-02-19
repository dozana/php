<?php
// Database connection
$mysqli = mysqli_connect("localhost", "root", "", "test");

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch countries
$countries_query = "SELECT id, name FROM countries";
$countries_result = mysqli_query($mysqli, $countries_query);

// Fetch cities (empty by default)
$cities = array();

// Handle city selection
if (isset($_GET['country_id'])) {
    $country_id = mysqli_real_escape_string($mysqli, $_GET['country_id']);
    $cities_query = "SELECT id, name FROM cities WHERE country_id = $country_id";
    $cities_result = mysqli_query($mysqli, $cities_query);
    while ($row = mysqli_fetch_assoc($cities_result)) {
        $cities[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dependent Dropdown</title>
</head>
<body>
    <form action="" method="GET">
        <select name="country_id" id="country" onchange="this.form.submit()">
            <option value="">Select Country</option>
            <?php while ($row = mysqli_fetch_assoc($countries_result)): ?>
                <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['country_id']) && $_GET['country_id'] == $row['id']) echo "selected"; ?>><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
        <select name="city_id" id="city">
            <option value="">Select City</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <noscript><input type="submit" value="Submit"></noscript>
    </form>
</body>
</html>

<?php
// Close connection
mysqli_close($mysqli);
?>
