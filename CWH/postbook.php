<?php
    include_once 'credits.php';
?>    

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>

  <section class="header">
    <a href="index.php" class="logo">Fly</a>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="book.php">Book</a>
    </nav>
  </section>
  <br>
  <br>
  <br>
  <selection class="booking">
    <h1 class="booking-title">complete your booking</h1>
    <form action="postbook.php" method="post" class="booking-form">
        <div class="flex">
            <div class="inputBox">
                <span>Name :</span>
                <input type="text" placeholder="enter your name" name="name">
            </div>
            <div class="inputBox">
                <span>Email :</span>
                <input type="text" placeholder="enter your email_id" name="email">
            </div>
            <div class="inputBox">
                <span>Mobile number :</span>
                <input type="number" placeholder="enter your mobile number" name="phone">
            </div>
            <div class="inputBox">
                <span>Pin code :</span>
                <input type="number" placeholder="enter your pin code" name="pin">
            </div>
            <div class="inputBox">
                <span>state :</span>
                <input type="text" placeholder="enter your state" name="state">
            </div>
            <div class="inputBox">
                <span>Address :</span>
                <input type="text" placeholder="enter your address" name="address">
            </div>
        </div>
    <input type="submit" value="CONTINUE" class="btn" name="send">
    </form>
  </selection>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "fly";
    $conn = new mysqli($servername, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pin = $_POST["pin"];
    $state = $_POST["state"];
    $address = $_POST["address"];
    $sql = "INSERT INTO passengers (name, email, phone, pin, state, address) VALUES ('$name', '$email', '$phone', '$pin', '$state', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
            <a href="book.php"><i class="angle-right"></i>enquries</a><br>
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
            <a href="#"><i class="mot"></i>Ministry Of Torism</a><br>
            <a href="#"><i class="tot"></i>Travel and Tourism</a><br>
            <a href="#"><i class="doe"></i>Department of expenditure</a><br>      
            <a href="#"><i class="em"></i>Esampada Mohua</a><br>
        </div>
    </div>
    </section>
</body>
</html>