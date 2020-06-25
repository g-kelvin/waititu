<?php
session_start();
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'customer') {
    $userID = $_SESSION['user_id'];
    $conn = mysqli_connect("localhost", "root", "", "profwaititu");
    $qry = "select tid, name, price from service order by name asc";
    $res = mysqli_query($conn, $qry);
    $services = array();
    while($row = mysqli_fetch_assoc($res)) {
        array_push($services, $row);
    }
} else {
    header("Location:./welcome.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Prof Waititu</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 d-flex justify-content-between">
                    <!-- Logo Area -->
                    <div class="logo">
                        <!-- <a href="index.html" style="color: #0000A0" >  <STRONG >Njeru Nyaga & Company</STRONG>  <BR><SMALL  >&nbsp;&nbsp;&nbsp;Certified Public Accountants</SMALL>  </a> -->
                        <a href="index.html"><img src="img/core-img/p-01.png" alt=""></a>
                    </div>

                    <!-- Top Contact Info -->
                    <div class="top-contact-info d-flex align-items-center">
                        <a href="#" data-toggle="tooltip" data-placement="bottom"
                           title="P.O Box 1234, Block H, Waititu Plaza, 2nd Flr, Mombasa Road ,Nairobi - Kenya"><img
                                    src="img/core-img/placeholder.png" alt=""> <span>P.O Box 1234, Block H, Waititu Plaza, 2nd Flr, Mombasa Road ,Nairobi - Kenya</span></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@njerunyaga.co.ke"><img
                                    src="img/core-img/message.png" alt=""> <span>info@njerunyaga.co.ke</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="credit-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="creditNav">

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="post.html">Post</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="#">Portfolio</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Portfolio 1</a></li>
                                            <li><a href="#">Portfolio 2</a></li>
                                            <li><a href="#">Portfolio 3</a></li>
                                            <li><a href="#">Portfolio 4</a></li>
                                            <li><a href="#">Portfolio 5</a></li>
                                            <li><a href="#">Portfolio 6</a></li>
                                            <li><a href="#">Portfolio 7</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Portfolio 8</a></li>
                                            <li><a href="#">Portfolio 9</a></li>
                                            <li><a href="#">Portfolio 10</a></li>
                                            <li><a href="#">Portfolio 11</a></li>
                                            <li><a href="#">Portfolio 12</a></li>
                                            <li><a href="#">Portfolio 13</a></li>
                                            <li><a href="#">Portfolio 14</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Portfolio 15</a></li>
                                            <li><a href="#">Portfolio 16</a></li>
                                            <li><a href="#">Portfolio 17</a></li>
                                            <li><a href="#">Portfolio 18</a></li>
                                            <li><a href="#">Portfolio 19</a></li>
                                            <li><a href="#">Portfolio 20</a></li>
                                            <li><a href="#">Portfolio 21</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Portfolio 22</a></li>
                                            <li><a href="#">Portfolio 23</a></li>
                                            <li><a href="#">Portfolio 24</a></li>
                                            <li><a href="#">Portfolio 25</a></li>
                                            <li><a href="#">Portfolio 26</a></li>
                                            <li><a href="#">Portfolio 27</a></li>
                                            <li><a href="#">Portfolio 28</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="post.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>

                    <!-- Contact -->
                    <div class="contact">
                        <a href="#"><img src="img/core-img/call2.png" alt="">+254 704 447 775</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/13.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Client Portal</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Request Service Portal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br><br><br><br>
<!-- ##### Breadcrumb Area End ##### -->


<!-- ##### Google Maps ##### -->
<div class="map-area">

    <!-- Contact Area -->
    <div class="contact---area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10">
                    <!-- Contact Area -->
                    <div class="contact-form-area contact-page">
                        <h4 class="mb-50">Request a Service</h4>
                        <div style="color: white">
                            <li>Kindly select the Service before you start filling in the details!!</li>
                            <br>
                            <li>All fields are mandatory *</li>
                            <br>
                            <li>Once you are satisfied with your Service application go to submit application tab and
                                submit your application
                            </li>
                        </div>
                        <br>

                        <form action="paybill.php" method="post">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="service" style="color: white">Choose a Service:</label>
                                        <select name="service" type="text" class="form-control" data-live-search="true">
                                            <option>---Select a Service---</option>
                                            <?php
                                            foreach ($services as $s) {
                                                echo "<option value='". $s['tid'] ."'>". $s['name'] ." (KES ". $s['price'] .")</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <input type="hidden" name="userID" value="<?php echo $userID; ?>" />
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="massage" cols="30" rows="10"
                                                  placeholder="Your Request Indicating when you need the Service"
                                                  required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn credit-btn mt-30" type="submit" name="submit">Send Application
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
</section>
<!-- ##### Contact Area End ##### -->


<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0">
    <div class="container">
        <div class="row">

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">About Us</h5>
                    <!-- Nav -->
                    <nav>

                        <p style="color: white"> Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer
                            ut ultricies orci, lobortis egestas sem.Morbi ut dapibus dui. Sed ut iaculis elit, quis
                            varius mauris. Integer ut ultricies orci, lobortis egestas sem.Morbi ut dapibus dui. </p>


                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">Quick Links</h5>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="post.html">Blog</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">Our Loans</h5>
                    <!-- Nav -->
                    <nav>
                        <ul style="color: white">
                            <li><i class="flaticon-032-placeholder"></i>P.O Box 1234, Block H, Waititu Plaza, 2nd Flr,
                                Mombasa Road ,Nairobi - Kenya
                            </li>
                            <li><i class="flaticon-025-arroba"></i>info@profwaititu.com</li>
                            <p style="color: white">+254 704 447 775</p>
                            <li><i class="flaticon-038-wall-clock"></i>Everyday: 08:00 -18:00 pm</li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-footer-widget mb-100">
                    <h5 class="widget-title">Latest News</h5>

                    <!-- Single News Area -->
                    <div class="single-latest-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="img/bg-img/7.jpg" alt="">
                        </div>
                        <div class="news-content">
                            <a href="#">How to get the best loan?</a>
                            <div class="news-meta">
                                <a href="#" class="post-author"><img src="img/core-img/pencil.png" alt=""> Jane
                                    Smith</a>
                                <a href="#" class="post-date"><img src="img/core-img/calendar.png" alt=""> April 26</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-latest-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="img/bg-img/8.jpg" alt="">
                        </div>
                        <div class="news-content">
                            <a href="#">A new way to get a loan</a>
                            <div class="news-meta">
                                <a href="#" class="post-author"><img src="img/core-img/pencil.png" alt=""> Jane
                                    Smith</a>
                                <a href="#" class="post-date"><img src="img/core-img/calendar.png" alt=""> April 26</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-latest-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="img/bg-img/9.jpg" alt="">
                        </div>
                        <div class="news-content">
                            <a href="#">Finance you home</a>
                            <div class="news-meta">
                                <a href="#" class="post-author"><img src="img/core-img/pencil.png" alt=""> Jane
                                    Smith</a>
                                <a href="#" class="post-date"><img src="img/core-img/calendar.png" alt=""> April 26</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copywrite-content d-flex flex-wrap justify-content-between align-items-center">
                        <!-- Footer Logo -->
                        <div class="logo">
                            <a href="index.html"><h4 style="color: white"><STRONG>&nbsp;&nbsp;Prof Waititu</STRONG> <BR><SMALL>Company
                                        Limited</SMALL></h4></a>
                        </div>

                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                All rights reserved |Developed </i> By <a href="https://softwaretechn.co.ke"
                                                                          target="_blank">Software Technology Kenya</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
</body>

</html>