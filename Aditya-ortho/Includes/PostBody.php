<?php
// Include the database connection
include("Includes/Connection.php");
date_default_timezone_set("Asia/Karachi");

// Check if the slug exists in the URL
if (isset($_GET['slug'])) {
    $PostSlug = ValidateFormData($_GET['slug']);
    // Fetch the Post ID using the slug
    $Query = "SELECT Post_ID FROM blog_post WHERE Post_Slug = '$PostSlug' LIMIT 1";
    $Result = $Connection->query($Query);

    if ($Result && $Result->num_rows > 0) {
        $Row = $Result->fetch_assoc();
        $PostID = $Row['Post_ID'];
    } else {
        echo "<p>Post not found for slug: $PostSlug</p>";
        header("Location: index.php");
        exit();
    }
} else {
    echo "<p>No slug provided.</p>";
    header("Location: index.php");
    exit();
}


// Update Post Stats
$Query = "SELECT * FROM post_visits WHERE Post_ID = '$PostID'";
$Result = $Connection->query($Query);

$Query = "SELECT * FROM blog_post WHERE Post_ID = '$PostID'";
$Result = $Connection->query($Query);

if ($Result->num_rows > 0) {
    while($row = $Result->fetch_assoc()) {
      // Meta
        $MetaTitle=$row['MetaTitle'];
      
        $MetaDesc = $row['MetaDesc'];
        $MetaKey = $row['MetaKey'];
      //   Meta
    }
} 
//meta Information
// if ($Result && $Result->num_rows > 0) {
//    $Row = $Result->fetch_assoc();
//    $MetaTitle = $Row['MetaTitle'];
//    $MetaDesc = $Row['MetaDesc'];
//    $MetaKey = $Row['MetaKey'];
// }
// Meta Information

if ($Result && $Result->num_rows > 0) {
    $Query = "UPDATE post_visits SET Post_Visits = Post_Visits + 1 WHERE Post_ID = '$PostID'";
    $Connection->query($Query);
} else {
    $Query = "INSERT INTO post_visits(Post_ID, Post_Visits) VALUES($PostID, 1)";
    $Connection->query($Query);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- meta -->
    <meta name="keywords" content="<?php echo $MetaKey?>">
    <meta name="description" content="<?php echo $MetaDesc?>">
    <meta name="title" content="<?php echo $MetaTitle?>">
    <!-- meta -->


    <title>Aditya Orthopaedic and Trauma Centre</title>

    <!-- Fav Icon -->
     <link rel="icon" href="../assets/images/aditya.png" type="image/png" sizes="512x512"

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- Stylesheets -->
    <link href="../assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="../assets/css/flaticon.css" rel="stylesheet">
    <link href="../assets/css/owl.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/nice-select.css" rel="stylesheet">
    <link href="../assets/css/elpath.css" rel="stylesheet">
    <link href="../assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="../assets/css/switcher-style.css" rel="stylesheet">
    <link href="../assets/css/rtl.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets_blog/style.css" rel="stylesheet">
    <link href="../assets/css/module-css/page-title.css" rel="stylesheet">
    <link href="../assets/css/module-css/service.css" rel="stylesheet">
    <link href="../assets/css/module-css/subscribe.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    

    
</head>



<body>
<div class="boxed_wrapper ltr">


<!-- preloader -->
<!-- <div class="loader-wrap">
    <div class="preloader">
        <div class="preloader-close">close</div>
        <div id="handle-preloader" class="handle-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>

            </div>
        </div>
    </div>
</div> -->
<!-- preloader end -->


<!-- page-direction -->
<div class="page_direction">
    <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
    <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
</div>
<!-- page-direction end -->


<!-- switcher menu -->
<div class="switcher">
    <div class="switch_btn">
        <button><i class="fas fa-palette"></i></button>
    </div>
    <div class="switch_menu">
        <!-- color changer -->
        <div class="switcher_container">
            <ul id="styleOptions" title="switch styling">
                <li>
                    <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                </li>
                <li>
                    <a href="javascript: void(0)" data-theme="theme-color" class="theme-color"></a>
                </li>

                <li>
                    <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                </li>
                <li>
                    <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                </li>

                <li>
                    <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                </li>
                <!-- <li>
                    <a href="javascript: void(0)" data-theme="green" class="green-color" style="background-color: #20d34a;"></a>
                </li> -->

            </ul>
        </div>
    </div>
</div>
<!-- end switcher menu -->


<!--Search Popup-->


<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-overlay xs-overlay-2 xs-bg-black"></div>
    <div class="xs-overlay xs-overlay-3 xs-bg-black"></div>
    <div class="xs-overlay xs-overlay-4 xs-bg-black"></div>
    <div class="xs-overlay xs-overlay-5 xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget"><i class="fa fa-times"></i></a>
            </div>
            <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="../index.html"><img src="../assets/images/aditya_logo.png" alt=""></a>
                        </div>
                        <!-- <div class="content-box">
                            <h4>About Us</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi</p>
                            <p>Research oriented solutions for Data Science and Machine Learning business needs.
                            </p>
                            <a href="about.html" class="theme-btn btn-one"><span>About Us</span></a>
                        </div> -->
                        <!-- <div class="contact-info">
                            <h4>Contact Info</h4>
                            <ul>
                                <li>Chicago 12, Melborne City, USA</li>
                                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                                <li><a href="mailto:info@example.com">info@example.com</a></li>
                            </ul>
                        </div> -->
                        <!-- <ul class="social-box">
                            <li><a href="index-2.html"><i class="icon-4"></i></a></li>
                            <li><a href="index-2.html"><i class="icon-5"></i></a></li>
                            <li><a href="index-2.html"><i class="icon-6"></i></a></li>
                            <li><a href="index-2.html"><i class="icon-7"></i></a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END sidebar widget item -->


<!-- main header -->
<header class="main-header header-style-two">
    <!-- header-top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner">
                <ul class="info-list clearfix">

                    <li><i class="fa fa-envelope"></i><a
                            href="mailto:adityaortho@gmail.com">adityaortho@gmail.com</a>
                    </li>
                    <li><i class="icon-2"></i>Phone: <a href="tel:8861424111">8861424111</a></li>

                </ul>
                <ul class="social-links clearfix">
                    <li><a href="https://www.instagram.com/aditya_ortho_and_trauma_centre"><i
                                class="icon-4"></i></a></li>
                    <!-- <li><a href="www.youtube.com/@AdityaOrthoandTraumacentre"><i class="icon-5"></i></a></li> -->
                    <li>
                        <a href="https://www.youtube.com/@AdityaOrthoandTraumacentre" target="_blank">
                            <i class="fab fa-youtube" style="color: white; font-size: 17px;"></i>
                        </a>
                    </li>

                    <!-- Add this in your HTML <head> section if not already included -->
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

                    <li><a href="https://www.linkedin.com/company/aditya-orthopaedic-and-trauma%C2%A0centre/"><i
                                class="icon-6"></i></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=61571089453498"><i
                                class="icon-7"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-container">
            <div class="auto-container">
                <div class="outer-box">
                    <!-- <div class="logo-box"> -->
                    <figure class="logo"><a href="../index.html"><img src="../assets/images/aditya_logo.png"
                                alt=""></a></figure>
                    <!-- </div> -->
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light clearfix">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown"><a href="../index.html">Home</a>

                                    </li>
                                    <li><a href="../about.html">About Us</a></li>
                                    <li class="dropdown"><a href="../service.html">Services</a>

                                    </li>
                                    <li class="current dropdown"><a href="../blog.php">Blog</a>

                                    </li>
                                    <!-- <li class="dropdown"><a href="gallery.html">Gallery</a>

                                    </li> -->
                                    <li><a href="../contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="../index.html"><img src="../assets/images/aditya_logo.png"
                                alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <ul class="menu-right-content">
                    <ul class="menu-right-content">

                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn btn-one"><span>Get in touch</span></a>
                        </div>

                    </ul>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="../index.html"><img src="../assets/images/aditya.png" alt="" title=""></a>
        </div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>

        <div class="social-links">
            <ul class="clearfix">
                <li><a href="https://www.instagram.com/aditya_ortho_and_trauma_centre"><i
                            class="icon-4"></i></a></li>
                <!-- <li><a href="www.youtube.com/@AdityaOrthoandTraumacentre"><i class="icon-5"></i></a></li> -->
                <li>
                    <a href="https://www.youtube.com/@AdityaOrthoandTraumacentre" target="_blank">
                        <i class="fab fa-youtube" style=" font-size: 17px;"></i>
                    </a>
                </li>

                <!-- Add this in your HTML <head> section if not already included -->
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

                <li><a href="https://www.linkedin.com/company/aditya-orthopaedic-and-trauma%C2%A0centre/"><i
                            class="icon-6"></i></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=61571089453498"><i class="icon-7"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->
  <!-- page-title -->
  <section class="page-title p_relative centred">
            <div class="bg-layer" style="background-image: url(../assets/images/background/Service1.png);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Blog</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="../index.html">Home</a></li>
                        <li>blog</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->
        <!-- start post-body -->
        <div class="w3-row">
            <div class="w3-container"><?php echo isset($CommentMessage) ? $CommentMessage : ""; ?></div>
            <div class="w3-col l8 s12">
                <!-- Display the post content -->
                <?php DisplayPost($PostID); ?>

                <!-- COMMENTS -->
                <div class="w3-margin">
                    <div class="w3-container">
                        <h4><b style="color:black; text-transform:none;">Comments</b></h4>
                        <hr>
                    </div>
                    <form method="post" action="" class="w3-container"
                        style="background-color:aliceblue;padding:30px 10px">
                        <div class="w3-row-padding">
                            <p class="w3-text-red"> <?php echo isset($NameError) ? $NameError : ""; ?></p>
                            <p class="w3-text-red"> <?php echo isset($CommentError) ? $CommentError : ""; ?></p>
                            <div class="w3-quarter">
                                <input name="Name" class="w3-input w3-round" type="text" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="w3-rest">
                                <textarea name="Comment" style="resize: none;" rows="1" class="w3-input w3-round"
                                    placeholder="Your Comment" required></textarea>
                            </div>
                            <input name="PostId" value="<?php echo $PostID ?>" type="hidden">
                            <div style="margin-left:10px;margin-top:20px">
                                <button style="background-color:#FF7C5B;color:white;padding:15px 40px" name="AddComment"
                                    type="submit" class="w3-button w3-white w3-border"><b>Comment</b></button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <?php DisplayComments($PostID); ?>
                </div>
                <!-- END COMMENTS -->
            </div>

            <!-- Sidebar -->
            <div class="w3-col l4">
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4 style="color:black;text-transform: none;">Popular Posts</h4>
                    </div>
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php PopularPosts(); ?>
                    </ul>
                </div>
                <hr>
                <div class="w3-card w3-margin">
                    <div class="w3-container w3-padding">
                        <h4 style="color:black;text-transform: none;">Tags</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p><?php Tags(); ?></p>
                    </div>
                </div>
            </div>
            <!-- END Sidebar -->
        </div>
        <!-- end post-body -->


    </div><!-- /.page-wrapper -->
</body>
 <!-- Footer area start -->
 <footer class="main-footer">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-23.png);"></div>
                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-24.png);"></div>
                <div class="pattern-3" style="background-image: url(assets/images/shape/shape-25.png);"></div>
                <!-- <div class="pattern-4"></div> -->
            </div>
            <div class="widget-section pt_120 pb_100">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="../index.html"><img src="../assets/images/aditya.png"
                                            alt=""></a></figure>
                                <!-- <p>Lorem ipsum dolor sit amet constetur adipiscing elit. Etiam eu turpis mostie dictum
                                    est a, mattis tellus.</p> -->
                                <ul class="social-links clearfix">
                                    <li><a href="https://www.instagram.com/aditya_ortho_and_trauma_centre"><i
                                                class="icon-4"></i></a></li>
                                    <!-- <li><a href="www.youtube.com/@AdityaOrthoandTraumacentre"><i class="icon-5"></i></a></li> -->
                                    <li>
                                        <a href="https://www.youtube.com/@AdityaOrthoandTraumacentre" target="_blank">
                                            <i class="fab fa-youtube" style="color: white; font-size: 17px;"></i>
                                        </a>
                                    </li>

                                    <!-- Add this in your HTML <head> section if not already included -->
                                    <link rel="stylesheet"
                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

                                    <li><a
                                            href="https://www.linkedin.com/company/aditya-orthopaedic-and-trauma%C2%A0centre/"><i
                                                class="icon-6"></i></a></li>
                                    <li><a href="https://www.facebook.com/profile.php?id=61571089453498"><i
                                                class="icon-7"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_110">
                                <div class="widget-title">
                                    <h3>Quick Link</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="../index.html">Home</a></li>
                                        <li><a href="../about.html">About Us</a></li>
                                        <li><a href="../service.html">Services</a></li>
                                        <!-- <li><a href="doctor.html">Doctor</a></li>
                                        <li><a href="gallery.html">Gallery</a></li> -->
                                        <li><a href="../contact.html">Contacts Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_55">
                                <div class="widget-title">
                                    <h3>Location Pin</h3>
                                </div>
                                <div class="widget-content">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.222593125544!2d77.1169031!3d13.3377587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bb02c3af560c45d%3A0xe2547a0343500087!2sAditya%20Orthopaedic%20And%20Trauma%20Centre!5e1!3m2!1sen!2sin!4v1738151887294!5m2!1sen!2sin"
                                        width="230" height="230" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Connect with us</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list">
                                        <li><img src="../assets/images/icons/icon-1.png" alt="">SRI SHIVAKUMARA SWAMY
                                            CIRCLE,
                                            B.H ROAD, TUMKUR - 572102</li>
                                        <li><i class="icon-2"></i><a href="tel:8861424111">8861424111, 0816-2260023</a>
                                        </li>
                                        <li><i class="icon-26"></i><a
                                                href="mailto:adityaortho@gmail.com">adityaortho@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner">
                        <!-- <ul class="footer-nav clearfix">
                            <li><a href="index.html">Privacy Policy</a></li>
                            <li><a href="index.html">Terms of Use</a></li>
                            <li><a href="index.html">Sales and Refunds</a></li>
                            <li><a href="index.html">Legal</a></li>
                            <li><a href="index.html">Site Map</a></li>
                        </ul> -->
                        <div class="copyright">
                            <p>&copy;Copy Right Aditya Orthopaedic and Trauma Centre </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->

    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/nav-tool.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>