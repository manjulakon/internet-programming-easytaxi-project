<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
    header("Location: taxi.php");
    exit;
}

if (isset($_POST['btn-login'])) {
    
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    
    $email = $DBcon->real_escape_string($email);
    $password = $DBcon->real_escape_string($password);
    
    $query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
    $row=$query->fetch_array();
    
    $count = $query->num_rows; // if email/password are correct returns must be 1 row
    
    if (password_verify($password, $row['password']) && $count==1) {
        $_SESSION['userSession'] = $row['user_id'];
        header("Location: taxi.php");
    } else {
        $msg = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
                </div>";
    }
    $DBcon->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link href="css/taxi.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name = "format-detection" content = "telephone=no">
</head>
<body>
<div class="loginBody">

    <nav>
        <a href="taxi.html"><img src="img/logoImage.jpg" class="logo"></a>
        <ul class="menu">
            <li class="menuList active" ><a class="menuLink" href="taxi.php">Home</a></li>
            <li class="menuList"><a class="menuLink" href="aboutUs.html">About Us</a></li>
            <li class="menuList"><a class="menuLink" href="booking.html">Booking</a></li>
            <li class="menuList"><a class="menuLink" href="vacancy.html">Vacancies</a></li>
            <li class="menuList"><a class="menuLink" href="contactUs.html">Contacts</a></li>

        </ul>
        <div>
            <p class="menuPhone" id="phoneNumber"> &#128222 <a class="menuPhoneLink" href="tel:+99871-150-77-66"> 150 77 66 </a></p>
            <ul class="logAndSign">
                <li id="borderLi"><a class="regA" href="registration.php">Sign up</a></li>
                <li><a class="logA" href="logIn.php">Log in</a></li>
            </ul>
        </div>

    </nav>
    <div class="logIn">
        <h1>Login to your account</h1>
        <div>
            <form method="post">
            <input class="loginEmail" type="email" placeholder="Enter you email" name="email">
            <br>
            <input class="loginPassword" type="password" placeholder="Password" name="password">
            <br>
            <button class="loginSubmit" type="submit" name="btn-login" id="btn-login">LOGIN</button>
            <br>
            <div class="loginCheckbox"> <input type="checkbox" >Remember me</div>
            <p class="forgotPass" style=""><a>Forgot Password?</a></p>
            </form>
        </div>
    </div>
    <div style="clear: both"></div>

    <div class="footer">
        <div class="aboutUs">
            <h2 class="aboutUsHeader">about easy taxi</h2>
            <img src="img/taxi2.png" class="TaxiEmblem">
            <p class="aboutUsText">Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
        </div>
        <div class="quickLink">
            <h2 class="quickLinkHeader">quick links</h2>
            <img src="img/taxi2.png" class="TaxiEmblem">
            <ul class="quickLinkList">
                <li class="quickLinkListItem"><a class="qLinkA" href="taxi.html">Home</a></li>
                <li class="quickLinkListItem"><a class="qLinkA" href="aboutUs.html">About Us</a></li>
                <li class="quickLinkListItem"><a class="qLinkA" href="booking.html">Booking</a></li>
                <li class="quickLinkListItem"><a class="qLinkA" href="vacancy.html">Vacancies</a></li>
                <li class="quickLinkListItem"><a class="qLinkA" href="contactUs.html">Contacts</a></li>

            </ul>
        </div>
        <div class="contacts">
            <h2 class="contactUsHeader">contact us</h2>
            <img src="img/taxi2.png" class="TaxiEmblem">
            <p class="quickLinkList">
                <i class="fa fa-envelope "></i>&nbsp; etaxiuz@gmail.com<br>
                <i class="fa fa-phone "></i>&nbsp; +99871 150 77 66<br>
                <i class="fa fa-print "></i>&nbsp; +99871 150 77 66<br>
                <i class="fa fa-building "></i>&nbsp; Tashkent city, Istikbol, 8
            </p>
        </div>
        <div class="followUs">
            <h2 class="followUsHeader">follow us</h2>
            <img src="img/taxi2.png" class="TaxiEmblem">
            <p class="quickLinkList">
                <a class="facebook" href="http://facebook.com"><i class="fa fa-facebook"></i></a>
                <a class="twitter"><i class="fa fa-twitter"></i></a>
                <a class="googlePlus"><i class="fa fa-google-plus"></i></a>
            </p>
        </div>

    </div>
</div>
</body>
</html>