<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="header">
        <a href="index.php" class="logo">Fly</a>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="book.php">Book</a>
        </nav>
    </section>
    <selection class="enquire">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <div class="form-container">
        <form method="post">
            <div class="signup">
                <div class="sign-head">
                    <h1 class="ask">Enquiries</h1>
                </div>
                <div class="signup-content">
                    <input type="text" name="from" placeholder="From" class="input">
                    <input type="text" name="to" placeholder="To" class="input">
                    <input type="date" name="date" placeholder="Date" class="input" value="<?php echo date('Y-m-d'); ?>">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</selection>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "fly";

    // Create connection
    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve source, destination, and date from the form
    $source = $_POST['from'];
    $destination = $_POST['to'];
    $date = $_POST['date'];

    // Prepare and execute SQL query with a JOIN
    $sql = "SELECT flights.*, date.actual_date
            FROM flights
            INNER JOIN date ON flights.id = date.id
            WHERE flights.source = '$source'
            AND flights.destination = '$destination'
            AND date.actual_date = '$date'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            echo '<div class="flight-cards-row">';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="flight-card">';
                $companyLogoPath = $row['airline'].'.png';
                echo '<img src="' . $companyLogoPath . '" alt="' . $row['airline'] . ' Logo" class="company-logo">';
                echo '<h1 class="company">' . $row['airline'] . '</h1>';                
                echo '<p><strong>Departure Date:</strong> ' . $row['departure_date'] . '</p>';
                echo '<p><strong>Source:</strong> ' . $row['source'] . '</p>';
                echo '<p><strong>Destination:</strong> ' . $row['destination'] . '</p>';
                echo '<p><strong>Route:</strong> ' . $row['route'] . '</p>';
                echo '<p><strong>Departure Time:</strong> ' . $row['departure_time'] . '</p>';
                echo '<p><strong>Arrival Time:</strong> ' . $row['arrival_time'] . '</p>';
                echo '<p><strong>Duration:</strong> ' . $row['duration'] . '</p>';
                echo '<p><strong>Stops:</strong> ' . $row['stops'] . '</p>';
                echo '<p><strong>Additional Info:</strong> ' . $row['additional_info'] . '</p>';
                echo '<p><strong>Price:</strong> ' . $row['price'] . '</p>';
                echo '<p><strong>Actual Date:</strong> ' . $row['actual_date'] . '</p>';
                echo '<a href="postbook.php" class="book-now-button">Book Now</a>';
                echo '</div>';
            }

            echo '</div>';
        } else {
            echo "No flights found for the specified route and date.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    $conn->close();
}
?>
 <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick</h3>
                <a href="book.php"><i class= "fas fa-angle-right"></i>book now</a><br>
                <a href="#"><i class="fas fa-angle-right"></i>enquire</a><br>
                <a href="#"><i class="fas fa-angle-right"></i>contact us</a><br>
                <a href="#"><i class="fas fa-angle-right"></i>privacy policy</a><br>
            </div>
            <div class="box">
                <h3>queries</h3>
                <a href="#"><i class= "angle-right"></i>Trains</a><br>
                <a href="#"><i class="angle-right"></i>FAQ</a><br>
                <a href="about.php"><i class="angle-right"></i>About us</a><br>
                <a href="book.php"><i class="angle-right"></i>enquiries</a><br>
            </div>
            <div class="box">
                <h3>Rules</h3>
                <a href="#"><i class= "how"></i>how to</a><br>
                <a href="#"><i class="rule"></i>refund rules</a><br>
                <a href="#"><i class="disability"></i>"disability facilities</a><br>
                <a href="#"><i class="advertising"></i>advertising rules</a><br>
            </div>
            <div class="box">
                <h3>links</h3>
                <a href="https://tourism.gov.in/"><i class="mot"></i>Ministry Of Tourism</a><br>
                <a href=""><i class="tot"></i>Travel and Tourism</a><br>
                <a href="#"><i class="doe"></i>Department of expenditure</a><br>      
                <a href="#"><i class="em"></i>Esampada Mohua</a><br>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>