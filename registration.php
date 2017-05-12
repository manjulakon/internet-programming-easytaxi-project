<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
    header("Location: taxi.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
    
    $uname = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);
    
    $uname = $DBcon->real_escape_string($uname);
    $email = $DBcon->real_escape_string($email);
    $upass = $DBcon->real_escape_string($upass);
    
    $hashed_password = password_hash($upass, PASSWORD_DEFAULT); 
    
    $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
    $count=$check_email->num_rows;
    
    if ($count==0) {
        
        $query = "INSERT INTO tbl_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

        if ($DBcon->query($query)) {
            $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
                    </div>";
        }else {
            $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
                    </div>";
        }
        
    } else {
        
        
        $msg = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
                </div>";
            
    }
    
    $DBcon->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="css/taxi.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name = "format-detection" content = "telephone=no">
</head>
<body>
<nav>
    <a href="taxi.html"><img src="img/logoImage.jpg" class="logo"></a>
    <ul class="menu">
        <li class="menuList active" ><a class="menuLink " href="taxi.php">Home</a></li>
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
<div class="registration">
    <h1>Registration</h1>

    <form method="post">
    <table>
         <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <tr class="tableRow">
            <td class="tableColumn"><input class="tableCol regName" type="text" placeholder="Name" name="username"></td>
        </tr>
       
        <tr class="tableRow">
            <td class="tableColumn"><input class="tableCol regEmail" type="email" placeholder="Example@example.com" name="email"></td>
        </tr>
        <tr class="tableRow">
            <td class="tableColumn"><input class="tableCol regPass" type="password" placeholder="Password" name ="password"></td>
        </tr>
        <tr class="tableRow">
            <td class="tableColumn"><input class="tableCol regConPass" type="password" placeholder="Confirm password"></td>
        </tr>
        <tr class="tableRow">
            <td class="tableColumn">
                <input class="tabCol regBirthDate" type="number" placeholder="Day Of Birth">
                <select class="tabCol regBirthMonth">
                    <option selected>Month</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
                <input class="tabCol regBirthYear" type="number" placeholder="Year">
            </td>


        </tr>
        <tr class="tableRow">
            <td class="tableColumn">
                <select class="tableCol regGender">
                    <option selected>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </td>
        </tr>
        <tr class="tableRow">
            <td class="tableColumn">
                <input class="tableCol regPhone" type="tel" placeholder="Phone number">
            </td>
        </tr>
        <tr class="tableRow">
            <td class="tableColumn">
                <input class="tableCol regCountry" type="text" placeholder="Country">
            </td>
        </tr>
        <tr class="tableRow">
            <td class="tableColumnol">
                <input class="tabCol agreement" type="checkbox"><a class="regAgreeLink" href="#Agree">Agree</a>
                <button class="tabCol regSubmit" type="submit" name="btn-signup"> SIGN UP</button>
            </td>
        </tr>
    </table>

    </form>
</div>
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
</body>
</html>