<?php

$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to ". mysqli_connect_error());
}

// echo "Successfully connected to the db";

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5 ($_POST['password']);
$address = $_POST['address'];
$pinCode = $_POST['pinCode'];
$phone = $_POST['phone'];

$sql = "INSERT INTO `form`.`form` (`name`, `email`, `password`, `address`, `pinCode`, `phone`, `dt`) VALUES ('$name', '$email', '$password', '$address', '$pinCode', '$phone', current_timestamp());";

// echo $sql;

if($con->query($sql) == true){
    // echo "Successfully inserted";

    $insert = true;
}
else {
    echo "ERROR: $sql <br> $con->error";
}

$con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100;1,300&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&family=Oleo+Script+Swash+Caps&family=Roboto:ital,wght@0,300;1,100;1,300&display=swap" rel="stylesheet">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img class="bg" src="logo.jpg" />
    <div class="container">
      <h1>Registration Form</h1>
      <p>
        Enter your details and submit this form to register
      </p>
      <?php
      if($insert == true){
      echo "<p class='submitMsg'>
        Thanks for submitting your form.
      </p>";
      }
      ?>
      <form
        action="index.php"
        name="myForm"
        onsubmit="return validateForm()"
        method="post"
      >

        <div id="name">
          <input
            type="text"
            name="name"
            id="name"
            placeholder="Enter your name"
            required
          /><b><span class="formerror"> </span></b>
        </div>
        
        <div id="email">
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your email"
            required
          /><b><span class="formerror"> </span></b>
        </div>
        <div id="password">
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
            required
          /><b><span class="formerror"> </span></b>
        </div>
        <div id="address">
          <input
            type="text"
            name="address"
            id="address"
            placeholder="Enter your address"
            required
          /><b><span class="formerror"> </span></b>
        </div>
        <div id="pinCode">
          <input
            type="number"
            name="pinCode"
            id="pinCode"
            placeholder="Enter your pincode"
            required
          /><b><span class="formerror"> </span></b>
        </div>
        <div id="phone">
          <input
            type="number"
            name="phone"
            id="phone"
            placeholder="Enter your phone"
            required
          />
          <b><span class="formerror"> </span></b>
        </div>
        <button class="btn">Submit</button
          >
      </form>
    </div>
 <script src="index.js"></script>
</body>
</html>