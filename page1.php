<!DOCTYPE html>
<html>
<head>
    <title>Page 1 - Form</title>
    <!-- Add the Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
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

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Page 1 - Form</h1>
    <form method="POST" action="page2.php">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>
        </div>

        <!-- Add Google Maps API here for address validation (optional) -->

        <div class="form-group">
            <label for="number1">Input Number 1 (max 3 digits):</label>
            <input type="number" name="number1" id="number1" max="999" required>
        </div>

        <div class="form-group">
            <label for="number2">Input Number 2 (max 3 digits):</label>
            <input type="number" name="number2" id="number2" max="999" required>
        </div>

        <div class="form-group">
            <label for="date1">Input Date 1:</label>
            <input type="date" name="date1" id="date1" required>
        </div>

        <div class="form-group">
            <label for="date2">Input Date 2:</label>
            <input type="date" name="date2" id="date2" required>
        </div>

        <input type="submit" value="Submit">
        <script>
        // Initialize Google Maps Places Autocomplete for the address input field
        function initAutocomplete() {
            var input = document.getElementById('address');
            var options = {
                types: ['geocode'] // Restrict results to geocoding (addresses)
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }
    </script>

    <!-- Load the Places Autocomplete script and call initAutocomplete() -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcFpJrW-FbTca6SSEUjr8o8ZoBFXHpUTM&libraries=places&callback=initAutocomplete" async defer></script>
    </form>
</body>
</html>
