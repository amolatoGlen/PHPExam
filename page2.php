<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Function to extract city name from the address
    function getCityFromAddress($address) {
        $addressParts = explode(',', $address);
        return trim(end($addressParts));
    }

    // Validate and sanitize the form data
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $address = $_POST["address"];
    $number1 = filter_var($_POST["number1"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 999)));
    $number2 = filter_var($_POST["number2"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 999)));
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];

    // Get city name from the address
    $city = getCityFromAddress($address);

    // Calculate the difference in days and months between dates
    $date1Obj = new DateTime($date1);
    $date2Obj = new DateTime($date2);
    $dateDiff = $date1Obj->diff($date2Obj);
    $daysDiff = $dateDiff->days;
    $monthsDiff = $dateDiff->y * 12 + $dateDiff->m;

    // Store data in session variables
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["address"] = $address;
    $_SESSION["city"] = $city;
    $_SESSION["number1"] = $number1;
    $_SESSION["number2"] = $number2;
    $_SESSION["date1"] = $date1;
    $_SESSION["date2"] = $date2;
    $_SESSION["daysDiff"] = $daysDiff;
    $_SESSION["monthsDiff"] = $monthsDiff;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page 2 - Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .result {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Page 2 - Results</h1>
    <div class="result">
        <strong>Email:</strong> <?php echo $_SESSION["email"]; ?>
    </div>
    <div class="result">
        <strong>Password:</strong> <?php echo $_SESSION["password"]; ?>
    </div>
    <div class="result">
        <strong>Address (City only):</strong> <?php echo $_SESSION["city"]; ?>
    </div>
    <div class="result">
        <strong>First digits of Input Numbers:</strong> <?php echo substr($_SESSION["number1"], 0, 1) . ', ' . substr($_SESSION["number2"], 0, 1); ?>
    </div>
    <div class="result">
        <strong>Difference in Days:</strong> <?php echo $_SESSION["daysDiff"]; ?>
    </div>
    <div class="result">
        <strong>Difference in Months:</strong> <?php echo $_SESSION["monthsDiff"]; ?>
    </div>
</body>
</html>
