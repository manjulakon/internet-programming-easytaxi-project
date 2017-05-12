<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
    header("Location: login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Easy Taxi</title>
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link href="css/taxi.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500,600,700" rel="stylesheet">
    <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name = "format-detection" content = "telephone=no">

    <!--<link href="js/taxi.js" rel="script" type="javascript">-->
    <style>
        .material-icons{
            font-size: 16px;
            color:white;
            margin-right: 18px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="taxi.html"><img src="img/logoImage.jpg" class="logo"></a>
        <ul class="menu">
            <li class="menuList active" ><a class="menuLink" href="taxi.html">Home</a></li>
            <li class="menuList"><a class="menuLink" href="aboutUs.html">About Us</a></li>
            <li class="menuList"><a class="menuLink" href="booking.html">Booking</a></li>
            <li class="menuList"><a class="menuLink" href="vacancy.html">Vacancies</a></li>
            <li class="menuList"><a class="menuLink" href="contactUs.html">Contacts</a></li>

        </ul>
        <div>
            <p class="menuPhone" id="phoneNumber"> &#128222 <a class="menuPhoneLink" href="tel:+99871-150-77-66"> 150 77 66 </a></p>
            <ul class="logAndSign">
                
                
                 <li id="borderLi"> <?php echo $userRow['username']; ?></li>
                
                            
                            <?php if(isset($_SESSION['id'])): ?>
                          <a class="link"  href="login.php"style="text-decoration:none">login</a>
                        <?php else: ?>
                          <li id="borderLi"><a class="regA"  href="logout.php?logout" >logout</a></li>
                        <?php endif; ?>
               
            </ul>
        </div>

    </nav>
    <div id="home">
        <div class="slideshowContainer">
            <div class="mySlides fade">
                <div class="slideImage">
                    <img src="img/slide1.jpg" style="width:100%">
                    <div class="text"><span style="color: #000000">we are</span>
                        <br>the best <br><span style="color: #000000;">in the town </span><br>
                        <input type="button" onclick="location.href='booking.html'" class="orderButton" value="order cab now">
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <div class="slideImage">
                    <div class="slide2text">save time with<br>
                        <span style="color:#F7B926;">easy taxi cab</span><br>
                        <input type="button" onclick="location.href='http://telegram.me/EasyTaxiUz_bot';" value="join us" class="downloadAppButton">
                    </div>
                    <div class="slide2image">
                        <img src="img/phone.png" >
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="img/slider2.jpg" style="width:100%">
                <div class="text">rush our <br>
                    <span style="color:#F7B926; font-size: 40px;">who you gonna call?</span> <br> easy taxi</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div style="text-align:center; margin: -30px; position: absolute; left: 50%">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </div>

        <div>
            <p class="choosePar">choose your car</p>
            <div style="text-align: center">
                <img src="img/taxi.png" class="whiteEmblem">
            </div>
            <br>
            <div class="chooseCar">
                <input type="button" class="chooseTaxi" value="Lacetti" onclick="chooseLacetti()">
                <input type="button" class="chooseTaxi" value="Cobalt" onclick="chooseCobalt()">
            </div>
            <div class="taxiCost">
                <div class="carImage">
                    <img src="img/lacetti2.png" id="lacetti">
                </div>
                <div>
                    <div class="costAndClass">
                        <p class="costAndClassText">Base Rate:<br><span class="costAndClassSpan">6000 sum</span></p>
                    </div>
                    <div class="costAndClass">
                        <p class="costAndClassText">Per Mile/KM:<br><span class="costAndClassSpan">1200 sum</span></p>
                    </div>
                    <div class="costAndClass">
                        <p class="costAndClassText">Class:<br><span class="costAndClassSpan">town car</span></p>
                    </div>
                    <div style="clear: both;"></div>
                    <br><br>
                </div>
            </div>
        </div>



        <div class="parallax">
            <div class="testimonialsText" >
                <p>testimonials</p>
                <img src="img/taxi2.png" class="testTaxiEmblem" >
            </div>
            <div class="testimonialDiv1">

               <div class="testBlock1 left">
                   <img src="img/quote-taxi.png" class="quoteTaxiImage">
                   <p class="testComment">Easy Taxi is my favorite taxi company ever! Cool drivers,
                       amazing cars, top notch services!:)</p>
                   <img id="testCommentImage1" src="img/1.png" class="testImage">
                   <p id="testCommentImageName1" class="testName">Michael Buffalo</p>
               </div>
               <div class="testBlock1 right">
                   <img src="img/quote-taxi.png" class="quoteTaxiImage">
                   <p class="testComment">Easy Taxi is my favorite taxi company ever! Cool drivers,
                       amazing cars, top notch services!:)</p>
                   <img id="testCommentImage2" src="img/2.png" class="testImage">
                   <p id="testCommentImageName2" class="testName">Nora Martinez</p>
               </div>
            </div>

            <!--<div class="testimonialDiv2">-->

                <!--<div class="testBlock1 left">-->
                    <!--<img src="img/quote-taxi.png" class="quoteTaxiImage">-->
                    <!--<p class="testComment">Easy Taxi is my favorite taxi company ever! Cool drivers,-->
                        <!--amazing cars, top notch services!:)</p>-->
                    <!--<img src="img/3.png" class="testImage">-->
                    <!--<p class="testName">Diego Furlan</p>-->
                <!--</div>-->
                <!--<div class="testBlock1 right">-->
                    <!--<img src="img/quote-taxi.png" class="quoteTaxiImage">-->
                    <!--<p class="testComment">Easy Taxi is my favorite taxi company ever! Cool drivers,-->
                        <!--amazing cars, top notch services!:)</p>-->
                    <!--<img src="img/4.png" class="testImage">-->
                    <!--<p class="testName">Samantha Jones</p>-->
                <!--</div>-->
            <!--</div>-->
            <div class="testChooseButton">
                <input class="testButton" type="button"  value="1" onclick="chooseTestBlock1()">
                <input class="testButton" type="button" value="2" onclick="chooseTestBlock2()">
            </div>
        </div>

    <div style="clear:both;"></div>

    <div class="lost" id="lostProperty">
        <div class="lostPropertyText">
            <p>lost property</p>
            <img src="img/taxi.png" class="whiteEmblem">
            <p class="lostPropText1">did you lost something in one of our taxis?</p>
            <p class="lostPropText2">no need to panic! we`re keeping all lost & found items in our storage. just follow these 3 easy steps:</p>
        </div>
        <div>
            <div>
                <img class="lostStep1" src="img/step1.jpg">
                <p class="arrow">&#8250</p>
            </div>
            <div>
                <img class="lostStep2" src="img/step2.jpg" >
                <p class="arrow">&#8250</p>
            </div>
            <div>
                <img class="lostStep3" src="img/step3.jpg" >
            </div>
        </div>
        <div style="text-align: center; clear: both;">
            <p class="lostPropText1">we value our clients deeply and we want you to be happy :)</p>
            <a href="tel:+99871-150-77-66"><input class="contactButton" type="submit" value="contact us"></a>
        </div>

    </div>



    <div class="advertising">
        <div class="advertText">
            <p>taxi advertising</p>
            <img class="advertisingTaxiEmblem" src="img/taxi2.png">
        </div>
        <div class="adText">
            <h1 class="adHeader1">advertise on our taxis now!</h1>
            <p class="adPar">Grab people's attention with awesome advertising campaigns on our taxi cars.
                Reach thousands of people with your creative ad.</p>
            <h1 id="adHeader2">3easy steps:</h1>
            <ul class="adSteps">
                <li class="adStepList"><span class="material-icons" >thumb_up</span>Choose a taxi model</li>
                <li class="adStepList"><span class="material-icons" >thumb_up</span>Choose advertising position</li>
                <li class="adStepList"><span class="material-icons" >thumb_up</span>Select time period</li>
            </ul>
            <h1 class="adHeader1">contact us and get started!</h1>
            <input type="button" class="adContact" value="contact us for pricing" onclick="location.href='tel:+99871-150-77-66'">
        </div>
        <div class="adImage">
            <img src="img/adImage.jpg">
        </div>
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
                <i class="fa fa-building "></i>&nbsp; Tashkent city,Istikbol,8
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


    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }

        //        choose car

        function chooseCobalt() {
            document.getElementById("lacetti").src="img/cobalt3.png";
        }
        function chooseLacetti() {
            document.getElementById("lacetti").src="img/lacetti2.png"
        }
        //testimonial
        function chooseTestBlock1(){
            document.getElementById("testCommentImage1").src="img/1.png";
            document.getElementById("testCommentImageName1").textContent="Michael Buffalo";
            document.getElementById("testCommentImage2").src="img/2.png";
            document.getElementById("testCommentImageName2").textContent="Nora Martinez";
        }

        function chooseTestBlock2(){
            document.getElementById("testCommentImage1").src="img/3.png";
            document.getElementById("testCommentImageName1").textContent="Diego Furlan";
            document.getElementById("testCommentImage2").src="img/4.png";
            document.getElementById("testCommentImageName2").textContent="Samantha Jones";
        }
    </script>
</body>
</html>