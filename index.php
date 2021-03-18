<?php
session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    $is_logged = False;
} else {
    $is_logged = True;
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    $is_logged = False;
    header("location: index.php");
}

$db = mysqli_connect('192.168.0.60', 'root', 'ghjujyland', 'kurs_project');

$user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$cur_user = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Job Board</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/gijgo.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/slicknav.css">

        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    </head>

    <body>
        <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- header-start -->
        <header>
            <div class="header-area ">
                <div id="sticky-header" class="main-header-area">
                    <div class="container-fluid ">
                        <div class="header_bottom_border">
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-lg-2">
                                    <div class="logo">
                                        <a href="/">
                                            <img src="img/logo.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="/">Главная</a></li>
                                                <li><a href="/?page=shop">Подобрать тариф</a></li>
                                                <li><a href="/?page=news">Новости</a></li>
                                                <li><a href="/?page=contacts">Связаться с нами</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                    <div class="Appointment">
                                        <div class="d-none d-lg-block">
                                            <?php
                                            if($is_logged == False) {
                                                echo '<a class="boxed-btn3" href="/?page=auth">Войти или зарегистрироваться</a>';
                                            } else {
                                                echo '<a class="boxed-btn3" href="/?page=profile">';
                                                echo $username;
                                                echo '</a>';
                                                echo ' ';

                                                if ($cur_user['is_admin'] === '1'){
                                                    echo '<a class="boxed-btn3" href="/admin/">Админ панель</a>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-lg-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
        $page = $_GET['page'];
        if (!isset($page)) {
            require('templates/main.php');
        }
        elseif ($page == 'shop') {
            require('templates/shop.php');
        }
        elseif ($page == 'shop-unit') {
            $id = $_GET['id'];
            require('templates/shop_item.php');
        }
        elseif ($page == 'news') {
            require('templates/news.php');
        }
        elseif ($page == 'post') {
            $id = $_GET['id'];
            require('templates/post.php');
        }
        elseif ($page == 'auth') {
            header('HTTP/1.1 200 OK');
            header('Location: http://'.$_SERVER['HTTP_HOST']."/auth.php");
        }
        elseif ($page == 'contacts') {
            require('templates/contacts.php');
        } else {
            header('HTTP/1.1 404 NOT_FOUND');
            header('Location: http://'.$_SERVER['HTTP_HOST']."/404.php");
        }
        ?>

        <!-- footer start -->
        <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="footer_logo">
                                    <a href="#">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                                <p>
                                    lfybssd@gmail.com <br>
                                    +7 910 999 99 99 <br>
                                    г. Нижний новгород, ул. Баранова, д. 3А
                                </p>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-2">
                            <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                                <h3 class="footer_title">
                                    Сайт
                                </h3>
                                <ul>
                                    <li><a href="/">Главная </a></li>
                                    <li><a href="/tarify"> Тарифы</a></li>
                                    <li><a href="/news">Новости</a></li>
                                    <li><a href="/contact">Связь</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                                <h3 class="footer_title">
                                    Подписаться на рассылку
                                </h3>
                                <form action="#" class="newsletter_form">
                                    <input type="text" placeholder="Введите email адрес">
                                    <button type="submit">Подписаться</button>
                                </form>
                                <p class="newsletter_text">Никакого спама, только самое важное</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--/ footer end  -->

        <!-- link that opens popup -->
        <!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>



        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>


        <script src="js/main.js"></script>
    </body>

</html>
